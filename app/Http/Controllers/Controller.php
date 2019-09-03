<?php

namespace App\Http\Controllers;

use App\Model\Order\Orders;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // after process message=============
    protected function after_process_message($res = null, $type = null)
    {
        if ($res) :
            $data['success'] = $type . " successfully!!";
            echo json_encode($data);
        else :
            $data['error'] = $type . " unsuccessfully!!";
            echo json_encode($data);
        endif;
    }


    public function generateCode($text)
    {
        $num = Orders::orderBy('id', 'desc')->first();

        if (!empty($num)) :
            $num = $num->id;
            if ($num < 9) :
                $num += 1;
                $code = $text . '0000' . $num;
            elseif ($num < 99) :
                $num += 1;
                $code = $text . '100' . $num;
            elseif ($num < 999) :
                $num += 1;
                $code = $text . '10' . $num;
            else :
                $num += 1;
                $code = $text . '1' . $num;
            endif;
        else :
            $code = $text . '00001';
        endif;
        return $code;
    }


    // Validation Check========
    public function validationCheck($request = null)
    {
        $rules = $this->rules();
        $messages = $this->messages();
        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails()) {
            $data['validation'] = $v->errors();
            echo json_encode($data);
        } else {
            return true;
        }
    }
}
