<?php


namespace App\Predicates;


class Equal
{
public function compare($value,$ruleValue){
    if ($value === $ruleValue){
        return true;
    }
    return false;
}
}

