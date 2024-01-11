<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    
    public function index()
    {
        $people = People::all();
        return response()->json(['data' => $people]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName'=> 'required|string|max:20',
            'lastName'=> 'required|string|max:50',     
            'street'=> 'required|string|max:255',
            'city'=> 'required|string|max:100',
            'country'=> 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $person = People::create($request->all());

        return response()->json(['message' => 'Person created successfully', 'data' => $person], 201);
    }

    public function show($id)
    {
        $person = People::findOrFail($id);
        return response()->json(['data' => $person]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'firstName'=> 'required|string|max:20',
            'lastName'=> 'required|string|max:50',     
            'street'=> 'required|string|max:255',
            'city'=> 'required|string|max:100',
            'country'=> 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $person = People::findOrFail($id);
        $person->update($request->all());

        return response()->json(['message' => 'Person updated successfully', 'data' => $person]);
    }

    public function destroy($id)
    {
        $person = People::findOrFail($id);
        $person->delete();

        return response()->json(['message' => 'Person deleted successfully']);
    }

    public function fallback() {
        return response()->json("dupa", 404);
      }
}
