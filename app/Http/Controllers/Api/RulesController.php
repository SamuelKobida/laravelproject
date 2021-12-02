<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;


class RulesController extends Controller
{

    public function store(Request $request){
        $rule=Rule::create($request->all());
        $rule->save();
        return $rule;
    }



    public function delete($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->delete();

         return $rule;
    }

    public function changeStatus($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->isActive = !$rule->isActive;
        $rule->save();

        return $rule;
    }

}
