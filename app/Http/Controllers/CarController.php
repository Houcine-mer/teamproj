<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //


    function loadCars() {
        $carslist = Car::all();
        return response()->json($carslist);
    }
    function loadCar(Request $request){
        $carID = request()->route('id');
        $car = Car::find($carID);
        return response()->json($car);
    }
    function createCar(Request $request) {
        $data = $request->validate(
            [
                'brand_name' => 'required|exists:brands,name',
                'name' => 'required|string',
                'year' => 'nullable|integer|min:1900|max:' .date('Y'),
                'image_url' => 'required|string',
                'buyprice' => 'nullable|numeric|min:0',
                'rentprice' => 'nullable|numeric|min:0',
                'tourprice' => 'nullable|numeric|min:0',
                'buy' => 'sometimes|boolean',
                'rent' => 'sometimes|boolean',
                'tour' => 'sometimes|boolean',
            ]
            );



        $newCar = Car::create($data);

        return response()->json([
            'message' => 'Car created',
        ]);
    }
    function updateCar(Request $request){
        $carID = request()->route('id');
        $data = $request->validate(
            [
                'name' => 'required|string',
                'year' => 'nullable|integer|min:1900|max:' .date('Y'),
                'image_url' => 'required|string',
                'buyprice' => 'nullable|numeric|min:0',
                'rentprice' => 'nullable|numeric|min:0',
                'tourprice' => 'nullable|numeric|min:0',
                'buy' => 'sometimes|boolean',
                'rent' => 'sometimes|boolean',
                'tour' => 'sometimes|boolean',   
            ]
        );
        $updatedcar = Car::find($carID);
        if(!$updatedcar){
            return response()->json([
                'message' => 'car does not found',
            ]);
        }
        $updatedcar->update($data);
        return response()->json([
            'message' => 'car updated',
            'data' => $updatedcar,
        ]);

    }
    function deleteCar(Request $request) {
        $carID = request()->route('id');
        $deletedCar = Car::find($carID);
        $deletedCar->delete();
        return response()->json([
            'message' => "car deleted",
        ]);

    }


    function loadbrandCars(Request $request){
        $brandName = request()->route('brandName');
        $brand = Brand::where('name', $brandName)->first();
        if(!$brand) return response()->json([
            'message' =>"brand does not exist",
        ]);
        $cars = $brand->cars;

        return response()->json([$cars]);
    }
    public function tourCars()
{
    return Car::where('tour', true)
        ->select('id', 'brand_name', 'name', 'year', 'image_url', 'tourprice')
        ->get();
}



    
}
