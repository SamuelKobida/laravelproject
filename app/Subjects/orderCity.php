<?php


namespace App\Subjects;


class orderCity extends Subject
{
    public function setValue($order){
        $array=json_decode($order,true);
        $this->value=($array['city']);

    }
}


