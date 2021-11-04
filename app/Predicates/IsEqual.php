<?php


namespace App\Predicates;


class IsEqual extends Predicate
{
public function compare($value,$ruleValue){
    if ($value === $ruleValue){
        return true;
    }
    return false;
}
}
// co by malo byt v predicate? funkcia dostava len 2 udaje ktore pridu zo subjectu a rulu a vypluva true/false
