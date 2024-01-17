<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = Progress::all();
        return view('progress.index', compact('progress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('progress.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProgressID' =>'required|min:4|string|max:255',
            'Date_Report' =>'required|min:4|string|max:255',
            'Status'=>'required|min:6|string|max:255',
            'Description'=>'required|min:6|string|max:255',
        ]);


        $progress = new Progress;
        $progress->ProgressID = $request->ProgressID;
        $progress->Date_Report = $request->Date_Report;
        $progress->Status = $request->Status;
        $progress->Description = $request->Description;
        $progress->save();

        return redirect()->route('project.index')
            ->withSuccess('New Progress added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Progress $progress)
    {
        return view('progress.show',compact('progress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progress $progress)
    {
        return view('progress.edit',compact('progress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progress $progress)
    {
        $validated = $request->validate([
            'ProgressID' =>'required|min:4|string|max:255',
            'Date_Report' =>'required|min:4|string|max:255',
            'Status'=>'required|min:6|string|max:255',
            'Description'=>'required|min:6|string|max:255',
        ]);

        $progress->update($request->all());

        return redirect()->route('progress.index')
            ->withSuccess('Developer record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        $progress->delete();
        return redirect()->route('progress.index');
    }
}
