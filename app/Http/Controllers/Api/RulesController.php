<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRuleRequest;
use App\Models\Rule;
use Illuminate\Support\Facades\DB;

class RulesController extends Controller
{


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
