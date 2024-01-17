<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Progress;
use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //if(auth()->user()->can('create')) {
            return view('project.create');
     //   }
      //  else
         //   abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validated = $request->validate([
            'projectID' =>'required|min:1|string|max:255',
            'name' =>'required|min:1|string|max:255',
            'systemOwner' =>'required|min:1|string|max:255',
            'systemPIC'=>'required|min:1|string|max:255',
            'projectDuration'=>'required|min:1|string|max:255',
            'projectStatus'=>'required|min:1|string|max:255',
            'projectStartDate'=>'required',
            'projectEndDate' => 'required',
            'developmentMethodology' => 'nullable|string|max:255',
            'systemPlatform' => 'nullable|string|max:255',
            'projectDeploymentType' => 'nullable|string|max:255',
        ]);

        $projectStartDate = date('Y - m - d', strtotime($request->projectStartDate));
        $projectEndDate = date('Y -m - d', strtotime($request->projectEndDate));
        $project = new Project;
        $project->projectID = $request->projectID;
        $project->name = $request->name;
        $project->systemOwner = $request->systemOwner;
        $project->systemPIC = $request->systemPIC;
        $project->projectDuration = $request->projectDuration;
        $project->projectStatus = $request->projectStatus;
        $project->projectStartDate = $request->projectStartDate;
        $project->projectEndDate = $request->projectEndDate;
        $project->developmentMethodology = $request->developmentMethodology;
        $project->systemPlatform = $request->systemPlatform;
        $project->projectDeploymentType = $request->projectDeploymentType;
        $project->save();


        return redirect()->route('project.index')
            ->withSuccess('New Project has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $allDevelopers = Developer::all();
        return view('project.show',compact('project', 'allDevelopers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'projectID' =>'required|min:1|string|max:255',
            'name' =>'required|min:1|string|max:255',
            'systemOwner' =>'required|min:1|string|max:255',
            'systemPIC'=>'required|min:1|string|max:255',
            'projectDuration'=>'required|min:1|string|max:255',
            'projectStatus'=>'required|min:1|string|max:255',
            'projectStartDate'=>'required',
            'projectEndDate' => 'required',
            'developmentMethodology' => 'nullable|string|max:255',
            'systemPlatform' => 'nullable|string|max:255',
            'projectDeploymentType' => 'nullable|string|max:255',
        ]);
        $projectStartDate = date('Y - m - d', strtotime($request->projectStartDate));
        $projectEndDate = date('Y -m - d', strtotime($request->projectEndDate));
        $project = new Project;
        $project->projectID = $request->projectID;
        $project->name = $request->name;
        $project->systemOwner = $request->systemOwner;
        $project->systemPIC = $request->systemPIC;
        $project->projectDuration = $request->projectDuration;
        $project->projectStatus = $request->projectStatus;
        $project->projectStartDate = $request->projectStartDate;
        $project->projectEndDate = $request->projectEndDate;
        $project->developmentMethodology = $request->developmentMethodology;
        $project->systemPlatform = $request->systemPlatform;
        $project->projectDeploymentType = $request->projectDeploymentType;
        $project->save();

        return redirect()->route('project.index')
            ->withSuccess('Project has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //$this->authorize('view', \App\Models\Project::class);
        $project->delete();
        return redirect()->route('project.index');
    }

    public function assign(Project $project)
    {

        $allDevelopers = Developer::all();
        return view('project.assign',compact('project', 'allDevelopers'));
    }

    public function addToDeveloper(Request $request, $projectId)
    {
        $project = Project::find($projectId);
        $selectedDevelopers = $request->input('developers');

        // Add the selected subjects to the student (this is just an example, modify as needed)
        $project->developers()->attach($selectedDevelopers);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Developer added successfully');
    }

    public function dropAllDevelopers($projectId)
    {
        $project = Project::find($projectId);

        // Detach all subjects for the student
        $project->developers()->detach();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'All developers dropped successfully');
    }

    public function dropDeveloper($projectId, $developerId)
    {
        $project = Project::find($projectId);

        // Detach the specific subject for the student
        $project->developers()->detach($developerId);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Developer dropped successfully');
    }




    public function addToLeadDeveloper(Request $request, $projectId)
    {

        $project = Project::find($projectId);
        $selectedDevelopers = $request->input('developers');

        // Add the selected subjects to the student (this is just an example, modify as needed)
        $project->leaddevelopers()->attach($selectedDevelopers);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Lead Developer added successfully');
    }

    public function dropLeadDeveloper($projectId, $developerId)
    {
        $project = Project::find($projectId);

        // Detach all subjects for the student
        $project->leaddevelopers()->detach();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Lead developers dropped successfully');
    }



    public function progress(Project $project)
    {
        $progress = $project->progress;
        return view('project.progress', compact('project', 'progress'));
    }

    public function storeProgress(Request $request, Project $project)
    {
        $request->validate([
            'ReportID' => 'required|string',
            'Date_Report' => 'required|date',
            'Status' => 'required|string',
            'Description' => 'required|string',
        ]);

        $progress = $project->progress()->create([
            'ReportID' => $request->ReportID,
            'Date_Report' => $request->Date_Report,
            'Status' => $request->Status,
            'Description' => $request->Description,
        ]);

        return redirect()->route('project.progress', $project->id)->withSuccess('Progress added successfully');
    }

    public function editProgress(Project $project, Progress $progress)
    {
        return view('project.editProgress', compact('project', 'progress'));
    }

    public function deleteProgress(Project $project, Progress $progress)
    {
        $progress->delete();
        return redirect()->route('project.progress', $project->id)->withSuccess('Progress entry deleted successfully');
    }

    public function updateProgress(Request $request, Project $project, Progress $progress)
    {
        /*$validatedData = $request->validate([
            'ReportID' => 'required|string',
            'Date_Report' => 'required|date',
            'Status' => 'required|string',
            'Description' => 'required|string',
        ]); */

       // $progress->update($validatedData);
        $progress->update($request->all());

        return redirect()->route('project.progress', $project->id)->withSuccess('Progress entry updated successfully');
    }









}
