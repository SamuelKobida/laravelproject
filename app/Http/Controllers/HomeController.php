<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }


    public function resolve(Request $order)
    {
        $selectedRule=false;
        $rules = Rule::all();
        foreach ($rules as $rule) {
            $subject = app($rule->subjects->class);
            $predicate = app($rule->predicates->class);
            $ruleValue= $rule->value;
            $subject->setValue($order);

            $compareResult= $predicate->compare($subject->value,$ruleValue);

            if($compareResult){
                $selectedRule=$rule->carrier_service->name;
                break;
            }
        }
    }

}
