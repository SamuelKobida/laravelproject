<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRuleRequest;
use App\Models\Carrier_service;
use App\Models\Eshop;
use App\Models\Predicate;
use App\Models\Rule;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class RulesController extends Controller
{


    public function subjects(){
        $subjects= Subject::all();

        return response()->json($subjects);
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

    public function index(){
        $rules =DB::table('rules')->
        select(DB::raw('rules.id as rule_id, eshops.id as eshop_id,predicates.id as predicate_id, subjects.id as subject_id,carrier_services.id as service_id, rules.rule_name, rules.value, rules.priority, eshops.eshop_name, predicates.predicate_name, subjects.subject_name, carrier_services.service_code'))->
        join('carrier_services','rules.carrier_service_id','=','carrier_services.id')->
        join('subjects','rules.subject_id','=','subjects.id')->
        join('predicates','rules.predicate_id','=','predicates.id')->
        join('eshops','rules.eshop_id','=','eshops.id')->
        get();

        return response()->json($rules);
    }


    //public function create(){
      //  $rules = Rule::all();
        //$carrier_services = Carrier_service::all();
        //$eshops = Eshop::all();
        //$subjects = Subject::all();
        //$predicates = Predicate::all();

        //return view('admin.rules.create', compact('rules', 'carrier_services','eshops','subjects','predicates'));

   // }


    public function store(CreateRuleRequest $request){
        $rule = Rule::create($request->all());
        $rule->save();

        return $rule;
    }


    public function delete($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->delete();

         return $rule;
    }

}
