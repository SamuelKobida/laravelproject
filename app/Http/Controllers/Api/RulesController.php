<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRuleRequest;
use App\Models\Rule;


class RulesController extends Controller
{

    public function store(CreateRuleRequest $request){
            $rule=new Rule();
            $rule->name=($request->name);
            $rule->value=($request->value);
            $rule->priority=($request->priority);
            $rule->carrier_service_id=($request->carrier_service_id);
            $rule->eshop_id=($request->eshop_id);
            $rule->subject_id=($request->subject_id);
            $rule->predicate_id=($request->predicate_id);
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
