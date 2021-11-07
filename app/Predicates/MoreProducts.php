<?php


namespace App\Predicates;


class MoreProducts
{
    public function compare($value,$ruleValue){
        if ($value > $ruleValue){
            return true;
        }
        return false;
    }
}
