<?php

namespace App\Http\Controllers;
use App\Predicates\IsEqual;
use App\Subjects\IsCity;

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
        $selectedRule=[];
        $rules = Rule::orderBy('priority')->get();
        foreach ($rules as $rule) {
            $subject = app($rule->subject->class);
            $predicate = app($rule->predicate->class);
            $ruleValue= $rule->value;
            $subject->setValue($order->getContent());

            $compareResult= $predicate->compare($subject->value,$ruleValue);

            if($compareResult){
                $selectedRule['rule']=$rule->carrier_service->name;
                break;
            }

        }
        return response()->json($selectedRule);

    }

}
