<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Response;

class CaptchaController extends Controller
{
    public function generate()
    {
        $builder = new CaptchaBuilder;
        $builder->setPhrase($this->generateNumericPhrase());
        $builder->build();

        // تخصيص الشكل لإزالة الخطوط العرضية وجعل الأرقام واضحة
        $builder->setDistortion(false);
        $builder->setInterpolation(false);
        $builder->setBackgroundColor(255, 255, 255); // خلفية بيضاء

        // إزالة الخطوط العرضية
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);

        session(['captcha' => $builder->getPhrase()]);

        $response = new Response($builder->output());
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
    private function generateNumericPhrase($length = 5)
    {
        $phrase = '';
        for ($i = 0; $i < $length; $i++) {
            $phrase .= rand(0, 9);
        }
        return $phrase;
    }
}