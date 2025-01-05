<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends AdminController
{
    public function __construct(Menu $model)
    {
        parent::__construct(); 
        $this->model = $model;
        $this->image_width = 1200;
        $this->image_height = 400;
        $this->image_ratio = '6/2';
        $this->module_actions= ['edit','active','in_nav'];

        
        $this->not_in_nav_successfully = trans('admin.not_in_nav_successfully');
        $this->in_nav_successfully = trans('admin.in_nav_successfully');
        $this->fail_not_in_nav = trans('admin.fail_not_in_nav');
        $this->fail_in_nav = trans('admin.fail_in_nav');
        
        view()->share([

            'uploads_folder' => $this->uploads_folder,
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
                ->addColumn('icon', function ($data) {
                    return $data->image ? '<img src="' . $data->image_thumb_path . '" class="img-thumbnail" style="width: 50px">' : '<i class="fa fa-image no-img" >';
                })
                ->addColumn('title_link', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
                ->addColumn('order_form', $this->components_view . '.order_form')
                ->addColumn('actions', function ($data) {
                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['title_link','icon','order_form', 'actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }


    public function update(MenuRequest $request, Menu $menu)
    {
        $data = $request->all();

        $img_name = $this->upload_crop_image($menu);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['updated_by'] = 1;
        $update = $menu->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }

    
    public function inNav(Request $request, $id)
    {
        if ($request->ajax()) {
            $save = false;
            $item = $this->model->withTrashed()->findOrFail($id);
            $item->in_nav = !$item->in_nav;

            $save = $item->save();
            if ($save) {
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => $item->status == 0 ? $this->not_in_nav_successfully : $this->in_nav_successfully,
                        'item' => $item,
                    ]);
            } else {
                return response()->json(['status' => 'error', 'message' => $item->status == 0 ? $this->fail_not_in_nav : $this->fail_in_nav]);
            }
        }
        return redirect($this->index_route);
    }
    

}
