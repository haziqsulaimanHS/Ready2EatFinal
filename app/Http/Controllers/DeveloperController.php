<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();
        return view('developer.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('developer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>'required|min:4|string|max:255',
            'staffID'=>'required|min:4|string|max:255',
            'department' => 'required|min:4|string|max:255',
        ]);


        $developer = new Developer;
        $developer->name = $request->name;
        $developer->staffID = $request->staffID;
        $developer->department = $request->department;
        $developer->save();

        return redirect()->route('developer.index')
            ->withSuccess('New Developer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        $allProject = Project::all();
        return view('developer.show',compact('developer', 'allProject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        return view('developer.edit',compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $validated = $request->validate([
            'name' =>'required|min:4|string|max:255',
            'staffID'=>'required|min:4|string|max:255',
            'department' => 'required|min:4|string|max:255'
        ]);

        $developer->update($request->all());

        return redirect()->route('developer.index')
            ->withSuccess('Developer record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();
        return redirect()->route('developer.index');
    }
}
