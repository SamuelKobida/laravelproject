<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Eshop;
use App\Models\Rule;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class ResolveController extends Controller
{


    public function resolve(Request $order)
    {
        $eshops = Eshop::all();

        $selectedRule = [];
        $selectedCourier = [];

        $rules = Rule::orderBy('priority')->get();
        foreach ($rules as $rule) {
            if (($rule->isActive) > 0) {
                if ($eshops[$rule->eshop_id - 1]->name == ($order['eshop'])) {

                    $subject = app($rule->subject->class);
                    $predicate = app($rule->predicate->class);
                    $ruleValue = $rule->value;
                    $subject->setValue($order->getContent());

                    $compareResult = $predicate->compare($subject->value, $ruleValue);

                    if ($compareResult) {
                        $selectedRule['rule'] = $rule->carrier_service->name;
                        $selectedCourier['courier'] = $rule->carrier_service->carrier_id;
                        break;
                    }
                }
            }
        }
        return response()->json($selectedCourier+$selectedRule);

    }

}
