<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Contact;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends FrontEndController
{
    public function __construct(NewsLetter $model)
    {
        parent::__construct($model);
    }

    public function send(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $data = $request->all();
        $create = $this->model::create($data);

        if ($create) {
            return response()->json(
                [
                    'status' => 'success',
                    'message' =>  trans('frontend.send_successfully'),
                ]
            );
        } else {
            return response()->json(['status' => 'error', 'message' =>  trans('frontend.fail_send') ]);
        }
    }
}
