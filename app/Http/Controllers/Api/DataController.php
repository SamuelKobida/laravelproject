<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrier_service;
use App\Models\Eshop;
use App\Models\Predicate;
use App\Models\Rule;
use App\Models\Subject;
use App\Models\Carrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    //FUNKCIE PRE ADD RULES
    public function subjects()
    {
        $subjects = Subject::all();

        return $subjects;
    }

    public function predicates()
    {
        $predicates = Predicate::all();

        return $predicates;
    }


    public function eshops()
    {
        $eshops = Eshop::all();

        return $eshops;
    }

    public function specificCarriers($id)
    {
        $carriersunfiltered = Carrier::all();
        return $carriersunfiltered->whereIn('eshop_id', [$id]);
    }

    public function specificCarrierServices($id)
    {
        $carrier_services_unfiltered = Carrier_service::all();
        return $carrier_services_unfiltered->whereIn('carrier_id', [$id]);
    }

    public function specificParentRules()
    {
        $parent_rules = Rule::all();
        return $parent_rules->whereIn('parentrule_id',"");
    }


    // FUNKCIE PRE INDEXOVANIE (opravit do pretty verzie)
    public function specificRules($id)
    {
        $rules = DB::select("SELECT rules.id as id, rules.name as name, rules.value as name_value, rules.priority as priority, rules.isActive as isActive, carrier_services.name as service, eshops.name as eshop, subjects.name as subject, predicates.name as predicate, carriers.name as courier, rules.parentrule_id as parentrule FROM rules INNER JOIN carrier_services ON rules.carrier_service_id=carrier_services.id INNER JOIN eshops ON rules.eshop_id=eshops.id INNER JOIN subjects ON rules.subject_id=subjects.id INNER JOIN predicates ON rules.predicate_id=predicates.id INNER JOIN carriers ON carrier_services.carrier_id=carriers.id WHERE rules.eshop_id = ? ORDER BY id", [$id]);
        return $rules;
    }

    public function getRules()
    {
        $rules = DB::select("SELECT rules.id as id, rules.name as name, rules.value as name_value, rules.priority as priority, rules.isActive as isActive, carrier_services.name as service, eshops.name as eshop, subjects.name as subject, predicates.name as predicate, carriers.name as courier, rules.parentrule_id as parentrule FROM rules INNER JOIN carrier_services ON rules.carrier_service_id=carrier_services.id INNER JOIN eshops ON rules.eshop_id=eshops.id INNER JOIN subjects ON rules.subject_id=subjects.id INNER JOIN predicates ON rules.predicate_id=predicates.id INNER JOIN carriers ON carrier_services.carrier_id=carriers.id ORDER BY id");
        return $rules;
    }
    public function getParentRules() {
        $rules = DB::select("SELECT rules.id as id, rules.name as name, rules.value as name_value, rules.priority as priority, rules.isActive as isActive, carrier_services.name as service, eshops.name as eshop, subjects.name as subject, predicates.name as predicate, carriers.name as courier, rules.parentrule_id as parentrule FROM rules INNER JOIN carrier_services ON rules.carrier_service_id=carrier_services.id INNER JOIN eshops ON rules.eshop_id=eshops.id INNER JOIN subjects ON rules.subject_id=subjects.id INNER JOIN predicates ON rules.predicate_id=predicates.id INNER JOIN carriers ON carrier_services.carrier_id=carriers.id WHERE rules.parentrule_id IS NULL ORDER BY id");
        return $rules;
    }
    public function getChildRules($id) {
        $rules = DB::select("SELECT rules.id as id, rules.name as name, rules.value as name_value, rules.priority as priority, rules.isActive as isActive, carrier_services.name as service, eshops.name as eshop, subjects.name as subject, predicates.name as predicate, carriers.name as courier, rules.parentrule_id as parentrule FROM rules INNER JOIN carrier_services ON rules.carrier_service_id=carrier_services.id INNER JOIN eshops ON rules.eshop_id=eshops.id INNER JOIN subjects ON rules.subject_id=subjects.id INNER JOIN predicates ON rules.predicate_id=predicates.id INNER JOIN carriers ON carrier_services.carrier_id=carriers.id WHERE rules.parentrule_id = ? ORDER BY id", [$id]);
        return $rules;
    }
//FUNKCIE PRE HOME
    public function countRules()
    {
        $rules = DB::select("SELECT COUNT(*) as pocetRules FROM `rules`");
        return $rules;
    }

    public function countEshops()
    {
        $eshops = DB::select("SELECT COUNT(*) as pocetEshops FROM `eshops`");
        return $eshops;
    }

    public function countCouriers()
    {
        $carriers = DB::select("SELECT COUNT(DISTINCT name) as pocetCouriers FROM `carriers`");
        return $carriers;
    }

}
