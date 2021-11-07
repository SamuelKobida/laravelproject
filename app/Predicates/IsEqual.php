<?php


namespace App\Predicates;


class IsEqual
{
public function compare($value,$ruleValue){
    if ($value === $ruleValue){
        return true;
    }
    return false;
}
}

