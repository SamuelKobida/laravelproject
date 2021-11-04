<?php


namespace App\Subjects;


class HowManyProducts extends Subject
{
    public function setValue($order){
        $array=json_decode($order,true);
        $this->value=($array['products']);

    }
}
// bude sa ukladat pocet produktov a v isequal mesto
