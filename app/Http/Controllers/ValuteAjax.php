<?php
/**
 * Контроллер реализует отправку данных странице, с которой сработал JS
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValuteAjax extends Controller
{
    public function index(){

        $val = new \ValuteClass();
        $val->valute='EUR';

        $resultvalute = $val->get_res();

        return response()->json(array('message'=> (string)$resultvalute), 200);

    }
}
