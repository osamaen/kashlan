<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;

class ContactsController extends AdminController
{
  
    public function __construct(Contact $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->image_width = 400;
        $this->image_height = 300;
        $this->image_ratio = '4/3';
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
     
        // return view($this->method_view, compact('items'))->with('deleted_items', $deleted_items);
    }

 

  
 
  


    public function update(UpdateContactsRequest $request, Contact $contact)
    {
        $data = $request->all();

        $data['updated_by'] = 1;
        $update = $contact->update($data);
        session()->flash('success', $this->updated_successfully);
        return redirect($this->index_route);
    }


}
