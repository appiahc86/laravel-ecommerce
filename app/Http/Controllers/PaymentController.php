<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Overtrue\LaravelShoppingCart\Facade as Cart;

class PaymentController extends Controller
{

    public function success(){




      $invoice = session('invoice');

        $client = new Client();

        $params = [
            'query' => [
                'merchant_key' => 'tk_18e967da-8ba8-11ea-ae23-f23c9170642f',
               

            ]
        ];

        $response = $client->request('GET','https://manage.ipaygh.com/gateway/json_status_chk',$params);


        $contents = $response->getBody()->getContents();
//        $contents = $response->getBody();

//          return $contents;



        return view('payment.payment_success', compact('contents'));

    }


}
