<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
    public function country()
    {
        return response()->json(CountryModel::get(), 200);
    }
    public function show($id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => "Not found id: $id"], 404);
        }
        // $country = $this->checkError($id);
        return response()->json($country, 200);
    }
    public function create(Request $request)
    {
        $validation = $this->validateCountry($request);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }
    public function edit(Request $request, $id)
    {   
        $country = CountryModel::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => "Not found id: $id"], 404);
        }
        $validation = $this->validateCountry($request);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }
    public function destroy(Request $request, $id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => "Not found id: $id"], 404);
        }
        $country->delete();
        return response()->json('', 204);
    }
    // private function checkError($id)
    // {
    //     $country = CountryModel::find($id);
    //     if (is_null($country)) {
    //         return response()->json(['error' => true, 'message' => "Not found id: $id"], 404);
    //     }
    //     return $country;
    // }
    private function validateCountry(Request $request)
    {
        $rules = [
            'alias' => 'required|min:2|max:2',
            'name' => 'required|min:3',
            'name_en' => 'required|min:3',
        ];
        return Validator::make($request->all(), $rules);
    }
}
