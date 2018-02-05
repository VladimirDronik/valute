<?php

namespace App\Http\Controllers;
//namespace library;


class Valute extends Controller
{

    public function index(){



    $val = new \ValuteClass();
    $val->valute='EUR';

    $data ['resultvalute'] = $val->get_res();
    return view('welcome',$data);

    }
}


