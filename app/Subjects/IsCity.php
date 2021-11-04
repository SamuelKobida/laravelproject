<?php


namespace App\Subjects;


class IsCity extends Subject
{
    public function setValue($order){
        $array=json_decode($order,true);
        $this->value=($array['city']);

    }
}
//1.hodnota z jasonu sa uklada do value "Bardejov=>city" (čož je array) ako vie ze tam ma ulozit nazov mesta z jasonu a nie iny udaj z jasonu? odosielanie jsonu funguje cez nejaky bezny form?
//nemam predstavu ako bude ten user posielat json, mozme prejst toho "usera"
// 2.video 43:00 toto prebieha v controleri v JEDNEJ metode a vsetko sa deje naraz po odoslani formulara?niekto stlaci odoslat form z jsonom v userovi "imitacia eshopu" nahra sa json do subjectu
//// cez setValue a cyklom sa prechadzaju ruli kde vyhodi true? a vsetko sa deje v metodach controleru ?

