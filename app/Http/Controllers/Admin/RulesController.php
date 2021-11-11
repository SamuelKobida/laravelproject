<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRuleRequest;
use App\Models\Carrier_service;
use App\Models\Eshop;
use App\Models\Predicate;
use App\Models\Rule;
use App\Models\Subject;
use Illuminate\Http\Request;

class RulesController extends Controller
{


    public function index(){
        $rules = Rule::paginate(20);
        $carrier_service = Carrier_service::all();
        $eshop = Eshop::all();
        $subject = Subject::all();
        $predicate = Predicate::all();

        return view('admin.rules.index', compact('rules', 'carrier_service','eshop','subject','predicate'));
    }


    public function create(){
        $rules = Rule::all();
        $carrier_services = Carrier_service::all();
        $eshops = Eshop::all();
        $subjects = Subject::all();
        $predicates = Predicate::all();

        return view('admin.rules.create', compact('rules', 'carrier_services','eshops','subjects','predicates'));
    }


    public function store(CreateRuleRequest $request){
        $rule = Rule::create($request->all());
        $rule->save();

        return redirect()->route('rules.index');
    }


    public function delete($id)
    {
        $rule = Rule::findOrFail($id);

        $rule->delete();

        return redirect()->route('rules.index');
    }

}
