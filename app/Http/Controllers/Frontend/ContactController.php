<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Contact;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Http\Request;


class ContactController extends FrontEndController
{
  
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
   return view($this->frontend_pages_folder . '.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function send(Request $request)
    {
        $contact = Contact::find(1);
        $to_email = $contact['email'];
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'captcha' => 'required',
        ]);

      

        // تحقق مما إذا كانت المدخلة تطابق الرمز المخزن في الجلسة
        if ($request->input('captcha') !== session('captcha')) {
            return back()->withErrors(['captcha' => 'Invalid captcha'])->withInput();
        }



        $message  = request('message');
        $name  = request('first_name').' '.request('last_name');
        $email  = request('email');

        $subject = request('subject');
        $message_body = "<html><body><table border='0' dir='rtl' width='100%' cellpadding='5' cellspacing='0'><tr><td align='right'>
					<h2> اتصال عن طريق  الموقع  " . $_SERVER['HTTP_HOST'] . " - بتاريخ : " . date('d-m-Y') . " </h2><br /><br />
					<h2>وفيما يلي تفاصيل الاتصال : <br /><br />
					الاسم : " . $name . "<br />
					البريد الإلكتروني: " . $email . "<br />
					<h2>	الرسالة : </h2><h2>" . $message . "</h2>
					</td></tr></table></body></html>";

        //Set up the email headers
        $headers  = "From: $name <$email>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        //$headers   .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n";
        $headers .= "Message-ID: <$to_email/>" . "\r\n";


        if (@mail($to_email, $subject, $message_body, $headers)) {
            return response()->json(
                [
                    'status' => 'success',
                    'message' =>  trans('frontend.send_successfully'),
                ]
            );
        } else {
            return response()->json(['status' => 'error', 'message' => trans('frontend.fail_send')]);
        }
    }
}
