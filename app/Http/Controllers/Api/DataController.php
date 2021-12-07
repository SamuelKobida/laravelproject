<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrier_service;
use App\Models\Eshop;
use App\Models\Predicate;
use App\Models\Subject;
use App\Models\Carrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function subjects()
    {
        $subjects = Subject::all();

        return $subjects;
    }
    public function predicates(){
        $predicates= Predicate::all();

        return $predicates;
    }
    public function carrier_services(){
        $carrier_services= Carrier_service::all();

        return $carrier_services;
    }
    public function eshops(){
        $eshops= Eshop::all();

        return $eshops;
    }

    public function carriers(){
        $carriers = Carrier::all();

        return $carriers;
    }

    public function specificCarriers($id){
        $carriersunfiltered = Carrier::all();
        return $carriersunfiltered->whereIn('eshop_id', [$id]);
    }

    public function specificCarrierServices($id){
        $carrier_services_unfiltered = Carrier_service::all();
        return $carrier_services_unfiltered->whereIn('carrier_id', [$id]);
    }

    public function specificRules($id){
        $rules = DB::select("SELECT rules.id as id, rules.name as name, rules.value as name_value, rules.priority as priority, rules.isActive as isActive, carrier_services.name as service, eshops.name as eshop, subjects.name as subject, predicates.name as predicate FROM rules INNER JOIN carrier_services ON rules.carrier_service_id=carrier_services.id INNER JOIN eshops ON rules.eshop_id=eshops.id INNER JOIN subjects ON rules.subject_id=subjects.id INNER JOIN predicates ON rules.predicate_id=predicates.id WHERE eshop_id = ? ORDER BY id", [$id]);
        return $rules;
    }

    public function getRules(){
        $rules = DB::select("SELECT rules.id as id, rules.name as name, rules.value as name_value, rules.priority as priority, rules.isActive as isActive, carrier_services.name as service, eshops.name as eshop, subjects.name as subject, predicates.name as predicate FROM rules INNER JOIN carrier_services ON rules.carrier_service_id=carrier_services.id INNER JOIN eshops ON rules.eshop_id=eshops.id INNER JOIN subjects ON rules.subject_id=subjects.id INNER JOIN predicates ON rules.predicate_id=predicates.id ORDER BY id");
        return $rules;
    }

    public function countRules(){
        $rules = DB::select("SELECT COUNT(*) as pocetRules FROM `rules`");
        return $rules;
    }

    public function countEshops(){
        $eshops = DB::select("SELECT COUNT(*) as pocetEshops FROM `eshops`");
        return $eshops;
    }

    public function countCouriers(){
        $carriers = DB::select("SELECT COUNT(DISTINCT name) as pocetCouriers FROM `carriers`");
        return $carriers;
    }

}
