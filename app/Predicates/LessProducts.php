<?php


namespace App\Predicates;


class LessProducts
{
    public function compare($value,$ruleValue){
        if ($value <= $ruleValue){
            return true;
        }
        return false;
    }
}

