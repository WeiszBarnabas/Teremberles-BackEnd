<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\UniQuotation;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    function getPrices() {
        $price = Price::orderBy('id')->get();
        return response()->json(["error" => false ,"data"=>$price]);
    }

    function getUniPrices() {
        $price = UniQuotation::orderBy('id')->get();
        return response()->json(["error" => false ,"data"=>$price]);
    }


    function createPrice(Request $request) {

        Price::create([
            'category' => $request->category,
            'egyetem' => $request->egyetem,
            'egyetem_hetvege' => $request->egyetem_hetvege,
            'kulso' => $request->kulso,
            'kulso_hetvege' => $request->kulso_hetvege,
        ]);

        return response()->json(["error" => false ,"data"=>"Price created successfully"]);
    }

    function updatePrice(Request $request) {
        $price = Price::find($request->id);

        if ($price) {
            $price->egyetem = $request->egyetem;
            $price->egyetem_hetvege = $request->egyetem_hetvege;
            $price->kulso = $request->kulso;
            $price->kulso_hetvege = $request->kulso_hetvege;
            $price->save();
            return response()->json(["error" => false ,"data"=>$price]);
        } else {
            return response()->json(["error" => true ,"message"=>"Price not found"]);
        }
    }
}
