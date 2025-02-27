<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function createForm(Request $request)
    {


        $form = Form::create([
            'name' => $request->name,
            'description' => $request->description,
            'place' => $request->place,
            'address' => $request->address,
        ]);

        if (!$form->id) {
            return response()->json(["message" => "creating form faild"], 404);
        }


        return response()->json(["message" => "Success!", "data" => $form->id], 201);
    }

    public function getAll()
    {
        return response()->json(["data" => Form::all()]);
    }
}
