<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

class ProductCategoryController extends AdminController
{    
    
    protected $eng_specification_cat;
    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);

        $this->image_width = 50;
        $this->image_height = 50;
        $this->image_ratio = '1/1';
      
        $this->eng_specification_cat = $this->model::find(request('category_id'));

        
        view()->share([
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_ratio' => $this->image_ratio,
            'main_products_cats' => ProductCategory::where('parent_id', null)->get()
        ]);

  
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $deleted_items = $this->model->onlyTrashed()
            ->withCount('sub_cats')
            // ->withCount('eng_specifications as item_count')
            ->with(['deletedBy' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
        $all_items = $this->model->orderByRaw('-item_order DESC')
            ->withCount('sub_cats')
            ->with('createdBy')
            // ->withCount('eng_specifications as item_count')
            ->get();

        $items = request()->has('trashed') ? $deleted_items : $all_items;
        if($this->eng_specification_cat){
            $items = $items->where('parent_id',$this->eng_specification_cat->id);
            $this->method_title = ' التصنيفات الفرعية للتصنيف: '.$this->eng_specification_cat->title;
        }else{
            $items = $items->where('parent_id',0);
        }

        if (request()->ajax()) {
            return datatables()->of($items)
                ->addColumn('title_link', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
                ->addColumn('image', function ($data) {
                    return $data->image ? '<img src="' . $data->image_thumb_path . '" class="img-thumbnail" style="width: 50px">' : '<i class="fa fa-image no-img" >';
                })
                ->addColumn('count_group', function ($data) {
                    if($data->parent) {
                    return view($this->components_view . '.count_group_addons', compact('data'))
                        ->with('create_child_route', route($this->module_name . '.create_product_categories', [$data->id]))
                        ->with('show_child_route', route($this->module_name . '.show_product_categories', [$data->id]))
                        ->with('item_count', $data->item_count);

                 
                    }else{
                        return '-';
                    }
                })
                ->addColumn('sub_cats_count', function ($data) {
                    if(!$data->parent) {
                        return view($this->components_view . '.count_group_addons', compact('data'))
                            ->with('create_child_route', route($this->module_name . '.create', 'category_id=' . $data->id))
                            ->with('show_child_route', route($this->module_name . '.index', 'category_id=' . $data->id))
                            ->with('item_count', $data->sub_cats_count);
                    }else{
                        return '-';
                    }
            
                })
                ->addColumn('order_form', $this->components_view . '.order_form')
                ->addColumn('actions', function ($data) {

                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['title_link', 'image', 'order_form', 'actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items)
            ->with('method_title',$this->method_title);
    }

    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
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
  

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $data = $request->all();

        $img_name = $this->upload_crop_image($productCategory);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['updated_by'] = 1;
        $update = $productCategory->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }

    /**
     * Remove the specified resource from storage.
     */
  
}
