<?php

namespace App\Http\Controllers;

use App\Models\BU;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class BUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('isManagerOrBuUnit')) {
            $bus = BU::all();
            return view('bu.index', compact('bus'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'newSystem' =>'required|min:4|string|max:255',
            'description'=>'required|min:4|string|max:255',
        ]);


        $bu = new BU;
        $bu->newSystem = $request->newSystem;
        $bu->description = $request->description;
        $bu->save();

        return redirect()->route('bu.index')
            ->withSuccess('New Request System added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BU $bu)
    {
        $allbu = BU::all();
        return view('bu.show',compact('bu', 'allbu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BU $bu)
    {
        return view('bu.edit',compact('bu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BU $bu)
    {
        $validated = $request->validate([
            'newSystem' =>'required|min:4|string|max:255',
            'description'=>'required|min:4|string|max:255',
        ]);

        $bu->update($request->all());

        return redirect()->route('bu.index')
            ->withSuccess('Request System record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BU $bu)
    {
        $bu->delete();
        return redirect()->route('bu.index');
    }
}
