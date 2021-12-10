<?php


namespace App\Subjects;


class orderProducts extends Subject
{
    public function setValue($order){
        $array=json_decode($order,true);
        $this->value=($array['products']);

    }
}

