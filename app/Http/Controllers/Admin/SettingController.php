<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends AdminController
{
    public function __construct(Setting $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->image_width = 400;
        $this->image_height = 100;
        $this->image_ratio = '4/1';

        view()->share([

            'uploads_folder' => $this->uploads_folder,
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'image_ratio' => $this->image_ratio,

        ]);
    }

    public function index()
    {
        $id =1;
        $item = $this->model->findOrFail($id);

        return view($this->method_view, compact('item'));
    }


    public function update(SettingRequest $request, Setting $setting)
    {
        $data = $request->all();

        $img_name = $this->upload_crop_image($setting);
        if ($img_name) {
            $data['image'] = $img_name;
        }
        $data['updated_by'] = 1;
        $update = $setting->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }

}
