<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialMedia;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;

class SocialMediaController extends AdminController
{


    public function __construct(SocialMedia $model)
    {
        parent::__construct($model);

        $this->image_width = 1200;
        $this->image_height = 600;
        $this->image_ratio = '4/2';

        view()->share([
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_ratio' => $this->image_ratio,
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
            ->get();
        $all_items = $this->model->orderByRaw('-item_order DESC')
            ->with('createdBy')
            ->get();

        $items = request()->has('trashed') ? $deleted_items : $all_items;

        if (request()->ajax()) {
            return datatables()->of($items)
                ->addColumn('icon', function ($data) {
                    return $data->icon ? $data->icon : '<i class="fa fa-image"></i>';
                    // return $data->type ? '<i class="fab fa-' . $data->type . '"></i>' : '<i class="fa fa-image"></i>';
                })
                ->addColumn('title_link', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
                ->addColumn('order_form', $this->components_view . '.order_form')
                ->addColumn('actions', function ($data) {
                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['icon', 'title_link', 'order_form', 'actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }


    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        $data = $request->all();

        $data['updated_by'] = 1;
        $update = $socialMedia->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }
}
