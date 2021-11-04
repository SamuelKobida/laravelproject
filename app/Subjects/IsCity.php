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
//nemam predstavu ako bude ten user posielat json
//2.pre uistenie toho vyhodnocovanie prebieha v kontroleri naraz? niekto stlaci odoslat form z jsonom v userovi "imitacia eshopu" nahra sa json do subjectu
// cez setValue a cyklom sa prechadzaju ruli kde vyhodi true? a vsetko sa deje v metodach controleru ?
// mozme si skusit spravit ten controler ktory bude aktivovat cely system? nahravanie do subjectu prechadzanie rulov z nasavanim udajov do predicatu subjectu?

