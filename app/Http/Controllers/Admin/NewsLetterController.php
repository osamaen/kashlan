<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsLetter;
use App\Http\Requests\StoreNewsLetterRequest;
use App\Http\Requests\UpdateNewsLetterRequest;

class NewsLetterController extends AdminController
{
  
    public function __construct(NewsLetter $model)
    {
        parent::__construct();
        $this->model = $model;
        view()->share([

            'uploads_folder' => $this->uploads_folder, 

        ]);

        $this->module_actions = ['delete'];
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

                ->addColumn('actions', function ($data) {
                    return view($this->components_view . '.actions', compact('data'))
                        ->with('module_actions', $this->module_actions);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }


}
