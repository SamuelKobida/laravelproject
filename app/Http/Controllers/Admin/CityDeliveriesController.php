<?php

namespace App\Http\Controllers\Admin;

use App\Models\CityDeliveries;
use App\Http\Requests\CreateCityDeliveryRequest;
use App\Models\CityDelivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityDeliveriesController extends Controller
{
    public function index(){
        $city_deliveries = CityDelivery::paginate(20);

        return view('admin.city_delivery.index', compact('city_deliveries'));
    }
   /* public function create(){
        return view('admin.categories.create');
    }
    public function store(CreateCategoryRequest $request){
        $category = Category::create($request->all());

        $category->save();

        $this->_setFlashMessage($request, 'success', "Kategória $category->name bola úspešne pridaná.");

        return redirect()->route('categories.index');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CreateCategoryRequest $request, $id){
        $category = Category::findOrFail($id);

        $category->update($request->all());

        $category->save();

        $this->_setFlashMessage($request, 'success', "Kategória $category->name bola úspešne zmenená.");

        return redirect()->route('categories.index');
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Kategória $category->name bola vymazaná.");

        $category->delete();

        return redirect()->route('categories.index');
    } */
}
