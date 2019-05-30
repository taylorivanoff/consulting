<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyRecaptchaRequest;

class VerifyRecaptchaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(VerifyRecaptchaRequest $request)
    {
        $validated = $request->validated();
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $vars = 'secret=' . env('GOOGLE_RECAPTCHA_SECRET') . '&response=' . $validated['token'];

        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        return $response;
    }
}
