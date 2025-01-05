<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;

class PortfolioController extends AdminController
{
    public function __construct(Portfolio $model)
    {
        parent::__construct(); 
        $this->model = $model;
        $this->image_width1 = 600;
        $this->image_height1 = 900;
        $this->image_width2 = 300;
        $this->image_height2 = 600;
        $this->image_width3 = 300;
        $this->image_height3 = 300;
        $this->image_width4 = 300;
        $this->image_height4 = 300;
        $this->image_width5 = 650;
        $this->image_height5 = 300;


        $this->image_ratio1 = '2/3';
        $this->image_ratio2 = '6/2';
        $this->image_ratio3 = '3/3';
        $this->image_ratio4 = '3/3';
        $this->image_ratio5 = '4/2';
        
        view()->share([

            'uploads_folder' => $this->uploads_folder,
            'image_width1' => $this->image_width1,
            'image_height1' => $this->image_height1,
            'image_width2' => $this->image_width2,
            'image_height2' => $this->image_height2,
            'image_width3' => $this->image_width3,
            'image_height3' => $this->image_height3,
            'image_width4' => $this->image_width4,
            'image_height4' => $this->image_height4,
            'image_width5' => $this->image_width5,
            'image_height5' => $this->image_height5,
            'image_ratio1' => $this->image_ratio1,
            'image_ratio2' => $this->image_ratio2,
            'image_ratio3' => $this->image_ratio3,
            'image_ratio4' => $this->image_ratio4,
            'image_ratio5' => $this->image_ratio5,

        ]);
    }


    public function index()
    {
        $deleted_items = $this->model->onlyTrashed()
            ->with(['deletedBy' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
        $all_items = $this->model->orderByRaw('-item_order DESC')
            ->with('createdBy')
            ->get();

        $items = request()->has('trashed') ? $deleted_items : $all_items;

        if (request()->ajax()) {
            return datatables()->of($items)
                ->addColumn('title', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
    
                ->addColumn('actions', function ($data) {
                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['title','actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }

   
    public function store(StorePortfolioRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
    
        // Process each image
        for ($i = 1; $i <= 5; $i++) {
            $imageKey = "image{$i}";
            if ($request->hasFile($imageKey)) {
                $widthKey = "image_width{$i}";
                $heightKey = "image_height{$i}";
                $img_name = $this->upload_crop_image1(
                    $request->file($imageKey), // Use file method to get the uploaded file instance
                    $request->input("w{$i}"),
                    $request->input("h{$i}"),
                    $request->input("x1_{$i}"),
                    $request->input("y1_{$i}"),
                    $request->input($widthKey),
                    $request->input($heightKey)
                );
                if ($img_name) {
                    $data[$imageKey] = $img_name;
                } else {
                    Log::error("Image $imageKey failed to upload.");
                }
            }
        }
       
        // Create the model instance with the processed data
        $this->model::create($data);
    
        // Set the success message and redirect
        session()->flash('success', $this->created_successfully);
        return redirect($this->index_route);
    }
    
    protected function upload_crop_image1($image, $width, $height, $x1, $y1, $resizeWidth, $resizeHeight)
    {
        if ($image) {
            // Get file extension
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $filenametostore = $this->module_name . '_' . time() . '_' . uniqid() . '.' . $extension;
    
            // Create necessary directories if they do not exist
            if (!file_exists(public_path($this->uploads_folder))) {
                mkdir(public_path($this->uploads_folder), 0755, true);
            }
    
            if (!file_exists(public_path($this->uploads_folder . '/' . $this->module_name))) {
                mkdir(public_path($this->uploads_folder . '/' . $this->module_name), 0755, true);
            }
    
            // Save the original image
            $img = Image::make($image)->save(public_path($this->uploads_folder . '/' . $this->module_name . '/' . $filenametostore));
            $crop_path = public_path($this->uploads_folder . '/' . $this->module_name . '/' . $filenametostore);
            
            // Crop the image
            $img->crop(intval($width), intval($height), intval($x1), intval($y1));
            $img->save($crop_path);
    
            if ($img) {
                if (!file_exists(public_path($this->uploads_folder . '/' . $this->module_name . '/thumbs'))) {
                    mkdir(public_path($this->uploads_folder . '/' . $this->module_name . '/thumbs'), 0755, true);
                }
    
                // Resize and save the thumbnail
                $thumb_path = public_path($this->uploads_folder . '/' . $this->module_name . '/thumbs/' . $filenametostore);
                Image::make($crop_path)->resize($resizeWidth, $resizeHeight, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($thumb_path);
    
                return $filenametostore;
            }
        }
        return false;
    }
    
    
    
    
}
