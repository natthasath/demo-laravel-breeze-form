<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        // $obj = DB::table('schedule')->first();
        // return $obj->name;
        // return view('index');
        // Read - Display a list of items
    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        $data = [
            'Q28.1' => $request->checkbox1,
            'Q28.2' => $request->checkbox2
        ];
        try {

            DB::table('form')->insert([
                'email' => $request->email,
                'password' => $request->password,
                'address' => json_encode($data),
            ]);

            return response()->json(['status' => True, 'message' => 'Insert data success']);

        } catch (\Exception $e) {
            return $e;
            // return response()->json(['status' => False, 'message' => 'Insert data failed']);
        }
    }
    public function show($id)
    {
        // Read - Display a single item
    }
    public function edit($id)
    {
        // Update - Show the form to edit an item
    }
    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
    }
    public function destroy($id)
    {
        // Delete - Remove an item from the database
    }
}
