<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculator;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

class CalcController extends Controller
{
    public function home()
    {
        return $this->render();
    }
    public function calc(Request $request)
    {
        return $this->render($request->all());
    }

    private function render($items = null)
    {
        Bugsnag::notifyError('SubError', 'Something bad happened');
        $c = new Calculator();
        if (is_array($items) && isset($items['a']) && isset($items['b']) && isset($items['action'])){
            $action = $items['action'];
            $a = floatval($items['a']);
            $b = floatval($items['b']);
            if ($action == '+'){
                $result = $c->logmsg($a, $b);
            }else if ($action == '-'){
                $result = $c->diff($a, $b);
            }else if ($action == '*') {
                $result = $c->multiplication($a, $b);
            }else{
                $result = $c->div($a, $b);
            }
            $items['result'] = $result;
        }else{
            $items = array(
                'a' => '',
                'b' => '',
                'action' => '+',
            );
        }
        return view('calc', $items);
    }

}
