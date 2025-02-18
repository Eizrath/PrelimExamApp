<?php

namespace App\Http\Controllers;

use App\Models\Homeowner;
use Illuminate\Http\Request;

class HomeownerController extends Controller
{

    public function index(){
        $homeowners = Homeowner::all();
        return view('homeowners.index', compact('homeowners'));
    }

    public function create(){
        return view('homeowners.create');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:homeowners',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        Homeowner::create($request->all());

        return redirect()->route('homeowners.index')->with('success', 'Homeowner added successfully.');
    }

    public function edit(Homeowner $homeowner){
        return view('homeowners.edit', compact('homeowner'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:homeowners,email,' . $id . ',homeowner_id',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $homeowner = Homeowner::findOrFail($id);
        $homeowner->update($request->all());

        return redirect()->route('homeowners.index')->with('success', 'Homeowner updated successfully!');
    }

    public function destroy(Homeowner $homeowner){
        $homeowner->delete();
        return redirect()->route('homeowners.index')->with('success', 'Homeowner deleted successfully.');
    }
}
