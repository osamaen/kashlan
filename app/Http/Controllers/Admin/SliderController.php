<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends AdminController
{
    
    /**
     * Display a listing of the resource.
     */ 
    
     public function __construct(Slider $model)
    {
        parent::__construct($model);

        $this->image_width = 1200;
        $this->image_height = 400;
        $this->image_ratio = '6/2';

        view()->share([
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_ratio' => $this->image_ratio,
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
                ->addColumn('image', function ($data) {
                    return $data->image ? '<img src="'.$data->image_thumb_path.'" class="img-thumbnail" style="width: 50px">' : '<i class="fa fa-image no-img" >';
                })
                ->addColumn('title_link', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
                ->addColumn('actions', function ($data) {
            
                    return  view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['image','title_link', 'actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }


   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {

        $image = $request['image'] ?? null;
        $data = $request->all();
        $img_name = $this->upload_crop_image(null, $request->image);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        
        $data['created_by'] = auth()->user()->id;
        $this->model::create($data);
        session()->flash('success', $this->created_successfully);
        return redirect($this->index_route);

    }

    /**
     * Display the specified resource.
     */
    // public function show(Slider $slider)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Slider $slider)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
  

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data = $request->all();

        $img_name = $this->upload_crop_image($slider);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['updated_by'] = 1;
        $update = $slider->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Slider $slider)
    // {
    //     //
    // }
    
}
