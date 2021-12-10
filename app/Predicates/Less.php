<?php


namespace App\Predicates;


class Less
{
    public function compare($value,$ruleValue){
        if ($value <= $ruleValue){
            return true;
        }
        return false;
    }
}

