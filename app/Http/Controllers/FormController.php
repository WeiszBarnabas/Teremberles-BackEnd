<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function createForm(Request $request)
    {


        $form = Form::create([
            // 'name' => $request->name,
            // 'description' => $request->description,
            // 'place' => $request->place,
            // 'address' => $request->address,
            'name' => "teszt form",
            'description' => "kell egy terem",
            'place' => "egyetemtér 123333",
            'address' => "egyetemtér sok"
        ]);

        if (!$form->id) {
            return response()->json(["message" => "creating form faild"], 404);
        }


        return response()->json(["message" => "Success!", "data" => $form->id], 201);
    }

    public function getAll()
    {
        $allForms = Form::orderBy('created_at', 'desc')->get();
        return response()->json(["data" => $allForms]);
    }
}
