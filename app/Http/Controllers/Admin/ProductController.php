<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends AdminController
{

    public function __construct(Product $model)
    {
        parent::__construct($model);

        $this->model = $model;
        $this->image_width = 400;
        $this->image_height = 300;
        $this->image_ratio = '4/3';




        view()->share([
            'uploads_folder' => $this->uploads_folder,
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_ratio' => $this->image_ratio,
            'categories' => ProductCategory::where('parent_id','!=',null)->get(),
            'brands' => Brand::all(),
        
  
        ]);

  
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deleted_items = $this->model->onlyTrashed()
            ->with(['deletedBy' => function ($query) {
                $query->select('id', 'name');
            }])
            ->withCount('imageable')
            ->get();
        $all_items = $this->model->orderByRaw('-item_order DESC')
            ->with('createdBy')
            ->withCount('imageable')
            ->get();

        $items = request()->has('trashed') ? $deleted_items : $all_items;

        if (request()->ajax()) {
            return datatables()->of($items)
                ->addColumn('title_link', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
                ->addColumn('category', function ($data) {
                    return $data->category ? '<a href="' . route('product_categories.show', $data->category->id) . '">' . $data->category->title . '</a>' : '';
                })
                ->addColumn('brand', function ($data) {
                    return $data->brand ? '<a href="' . route('brands.show', $data->brand->id) . '">' . $data->brand->title . '</a>' : '';
                })
                ->addColumn('count_group', function ($data) {
                    return view($this->components_view . '.count_group_addons', compact('data'))
                        ->with('create_child_route', route($this->module_name . '.create_other_image', [$data->id]))
                        ->with('show_child_route', route($this->module_name . '.show_other_images', [$data->id]))
                        ->with('item_count', $data->imageable_count);
                })
                ->addColumn('image', function ($data) {
                    return $data->image ? '<img src="' . $data->image_thumb_path . '" class="img-thumbnail" style="width: 50px">' : '<i class="fa fa-image no-img" >';
                })
                ->addColumn('order_form', $this->components_view . '.order_form')
                ->addColumn('actions', function ($data) {
                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);

             
                })
                ->rawColumns(['title_link', 'image', 'brand','category',  'order_form', 'actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }
    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
      
        $image = $request['image'] ?? null;

        $data = $request->all();
        // return $data;
        $img_name = $this->upload_crop_image(null, $request->image);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['created_by'] = auth()->user()->id;
        $item = $this->model::create($data);
        session()->flash('success', $this->created_successfully);
        return redirect($this->index_route);
    }

    /**
     * Display the specified resource.
     */
 
    /**
     * Show the form for editing the specified resource.
     */
 

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();

        $img_name = $this->upload_crop_image($product);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['updated_by'] = 1;
        $update = $product->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }
    /**
     * Remove the specified resource from storage.
     */
   
}
