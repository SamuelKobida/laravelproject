<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;

class ResolveController extends Controller
{



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
