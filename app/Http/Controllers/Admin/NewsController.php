<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;


class NewsController extends AdminController
{
    public function __construct(News $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->image_width = 400;
        $this->image_height = 350;
        $this->image_ratio = '4/3';
        $this->module_actions= ['delete','create','active','edit','at_home'];

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
                ->addColumn('title', function ($data) {
                    return $data->title ? '<a href="' . route($this->module_name . '.show', $data->id) . '">' . $data->title . '</a>' : '';
                })
                ->addColumn('image', function ($data) {
                    return $data->image ? '<img src="' . $data->image_thumb_path . '" class="img-thumbnail" style="width: 50px">' : '<i class="fa fa-image no-img" >';
                })
               
                ->addColumn('order_form', $this->components_view . '.order_form')
                ->addColumn('actions', function ($data) {
                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['title','image','order_form', 'actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }

    public function store(StoreNewsRequest $request)
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

    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->all();

        $img_name = $this->upload_crop_image($news);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['updated_by'] = 1;
        $update = $news->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }
}
