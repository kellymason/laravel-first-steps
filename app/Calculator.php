<?php

namespace App;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

class Calculator
{
    public function logmsg($x, $y)
    {
      Bugsnag::notifyError('ERROR_AVALON', 'Something bad happened');
        $z = $x + $y;
        return $z;
    }
    public function sum($x, $y)
    {
      Bugsnag::notifyError('SumError', 'Something bad happened');
        $z = $x + $y;
        return $z;
    }
    public function diff($x, $y)
    {
        Bugsnag::notifyError('SubError', 'Something bad happened');
        $z = $x - $y;
        return $z;
    }
    public function multiplication($x, $y)
    {
        Bugsnag::notifyError('MultError', 'Something bad happened');
        $z = $x * $y;
        return $z;
    }
    public function div($x, $y)
    {
      Bugsnag::notifyError('DivError', 'Something bad happened');
        if($y == 0)
            return "don't divide by zero";
        $z = $x / $y;
        return $z;
    }
}
