<?php


namespace App\Subjects;


class orderWeight extends Subject
{
    public function setValue($order){
        $array=json_decode($order,true);
        $this->value=($array['weight']);

    }
}


