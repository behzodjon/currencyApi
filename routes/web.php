<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
// dd(654);
    return view('welcome');
});

Route::get('/insert', function () {
    $string = simplexml_load_string(file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp"));
    $jsonendata = json_encode($string);
    $data = json_decode($jsonendata);
    foreach ($data->Valute as $curr) {
        \App\Currency::create([
            'name' => $curr->Name,
            'rate' => $curr->Value,
        ]);
    }

    dd('Success');

});

//Route::get('currencies',function (){
//    $currencies=\App\Currency::paginate(5);
//
//    return compact('currencies');
//});

//Route::get('currency/{id}',function ($id){
//    $currency=\App\Currency::findOrFail($id);
//
//
//    return compact('currency');
//});


