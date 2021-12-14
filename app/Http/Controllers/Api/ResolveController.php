<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrier;
use App\Models\Eshop;
use App\Models\Rule;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class ResolveController extends Controller
{


    public function resolve(Request $order)
    {
        $eshops = Eshop::all();
        $carriers = Carrier::all();
        $selectedRule = [];
        $selectedCourier = [];


        $rules = Rule::all()->whereIn('isActive',"1")->sortBy('priority');

        foreach ($rules as $rule) {
                //POZERA IBA TIE RULES PRE ESHOPY KTORE SU V JSONE
                if ($eshops[$rule->eshop_id - 1]->name == ($order['eshop'])) {
                    //V PRIPADE ZE SA JEDNA O MATERSKU RULE VCHADZA DO JEJ SUBRULES
                    if (($rule->parentrule_id) === (NULL) and ($rule->value == ($order['city']))) {
                        //VYBERAM PATRIACE SUBRULS
                        $sub_rules = $rules->whereIn('parentrule_id',[$rule->id]);
                        foreach ($sub_rules as $sub_rule) {

                            //NACITAVAM SUBJECT KTORY BUDEME POUZIVAT
                            $subject = app($sub_rule->subject->class);
                            //NACITAVAM PREDICATE KTORY BUDEME POUZIVAT
                            $predicate = app($sub_rule->predicate->class);
                            //NACIVTAVAM VALUE Z PRAVIDLA
                            $ruleValue = $sub_rule->value;
                            //POUZIVAM FUNKCIU NACITANEHO SUBJECTU
                            $subject->setValue($order->getContent());
                            // POUZIVAM FUNKCIU NACITANEHO PREDICATU
                            $compareResult = $predicate->compare($subject->value, $ruleValue);
                            // POZERAM NA VYSLEDOK FUNCKIE NACITANEHO PREDICATU

                            if ($compareResult) {
                                $selectedRule['service'] = $sub_rule->carrier_service->name;
                                $selectedCourier['courier'] = $carriers[$sub_rule->carrier_service->carrier_id]->name;

                                //VRACIAM VYSLEDOK
                                return response()->json($selectedCourier + $selectedRule);
                            }
                        }
                    }
                    if (($rule->parentrule_id) === (NULL)){
                        $subject = app($rule->subject->class);
                        $predicate = app($rule->predicate->class);
                        $ruleValue = $rule->value;
                        $subject->setValue($order->getContent());

                        $compareResult = $predicate->compare($subject->value, $ruleValue);

                        if ($compareResult) {
                            $selectedRule['service'] = $rule->carrier_service->name;
                            $selectedCourier['courier'] = $carriers[$rule->carrier_service->carrier_id]->name;

                            return response()->json($selectedCourier + $selectedRule);
                        }
                        }

                }

        }
        return response()->json("Nenašla sa vhodná kuriérska služba");

    }

}
