<?php


namespace App\Predicates;


class More
{
    public function compare($value,$ruleValue){
        if ($value > $ruleValue){
            return true;
        }
        return false;
    }
}
