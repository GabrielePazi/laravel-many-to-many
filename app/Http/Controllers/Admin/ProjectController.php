<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpsertProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function index(): View
    {
        //gets the data from the database and creates a new Project istance for each found element
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    public function create(): View
    {
        $types = Type::all();
        return view("admin.projects.create", ["types" => $types]);
    }

    public function store(UpsertProjectRequest $request): RedirectResponse
    {
        //inserted data validation
        $data = $request->validated();

        //generates new slug
        $data["slug"] = $this->generateSlug($data["title"]);

        //checks if $data["thumb"] has been set, because if $data["thumb"] has not been inserted in the form there is an error 
        if (isset($data["thumb"])) {
            //uploads in public/storage/post the value of $data["thumb"], which is an image
            $projectImage = Storage::put('projects', $data["thumb"]);

            $data["thumb"] = $projectImage;
        }

        //add the inserted data in a Project's istance
        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->title);
    }

    public function show(string $slug): View
    {
        //search in the database the first element with the same slug as the input
        $project = Project::where("slug", $slug)->first();

        return view("admin.projects.show", compact("project"));
    }

    public function edit(string $slug): View
    {
        //search in the database the first element with the same slug as the input
        $project = Project::where("slug", $slug)->first();

        $types = Type::all();
        return view("admin.projects.create", ["types" => $types]);
    }

    public function update(UpsertProjectRequest $request, string $slug): RedirectResponse
    {
        //search in the database the first element with the same slug as the input
        $project = Project::where("slug", $slug)->first();

        //validates the data from the form
        $data = $request->validated();

        //if the new title is not the same as the old, it generates a new slug 
        if ($data["title"] !== $project->title) {
            $data["slug"] = $this->generateSlug($data["title"]);
        }

        //if the thumb is set, it deletes the thumb, if it's not set it doesn't block the flow
        if ($project->thumb) {
            Storage::delete($project->thumb);
        }

        //checks if $data["thumb"] has been set, because if $data["thumb"] has not been inserted in the form there is an error 
        if (isset($data["thumb"])) {
            //updates the thumb
            $projectImage = Storage::put('projects', $data["thumb"]);
            $data["thumb"] = $projectImage;
        }

        //fill and save the data
        $project->update($data);

        return redirect()->route("admin.projects.index");
    }

    public function destroy(string $slug): RedirectResponse
    {
        //search in the database the first element with the same slug as the input
        $project = Project::where("slug", $slug)->first();

        //if the thumb is set, it deletes the thumb, if it's not set it doesn't block the flow
        if ($project->thumb) {
            Storage::delete($project->thumb);
        }

        //deletes the found project
        $project->delete();

        return redirect()->route("admin.projects.index");
    }

    protected function generateSlug(string $title): string
    {
        $counter = 0;

        do {

            //if counter is 0, the slug is $title, else "$title-$counter"
            if ($counter == 0) {
                $slug = $title;
            } else {
                $slug = $title . "-" . $counter;
            }

            //if it doesn't exist the value is null and the while doesn't begin, else il cycles until it doesn't exist
            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists);

        return $slug;
    }
}
