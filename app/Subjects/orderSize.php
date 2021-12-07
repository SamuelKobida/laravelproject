<?php


namespace App\Subjects;


class orderSize extends Subject
{
    public function setValue($order){
        $array=json_decode($order,true);
        $this->value=($array['size']);

    }
}

