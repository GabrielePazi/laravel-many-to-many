<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(): View
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    public function create(): View
    {
        return view("admin.projects.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        $data["slug"] = $this->generateSlug($data["title"]);

        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->title);
    }

    public function show(string $slug): View
    {
        $project = Project::where("slug", $slug)->first();

        return view("admin.projects.show", compact("project"));
    }

    public function edit($slug): View
    {
        $project = Project::where("slug", $slug)->first();

        return view("admin.projects.edit", compact("project"));
    }

    public function update(Request $request, $slug)
    {
        $project = Project::where("slug", $slug)->first();

        $data = $request->all();

        if ($data["title"] !== $project->title) {
            $data["slug"] = $this->generateSlug($data["title"]);
        }
        $project->update($data);

        return redirect()->route("admin.projects.index");
    }

    public function destroy($slug)
    {
        $project = Project::where("slug", $slug)->first();

        $project->delete();

        return redirect()->route("admin.projects.index");
    }

    protected function generateSlug($title)
    {
        $counter = 0;

        do {
            if ($counter == 0) {
                $slug = $title;
            } else {
                $slug = $title . "-" . $counter;
            }

            // cerco se esiste già un elemento con questo slug
            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists);

        return $slug;
    }
}
