<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

use function Laravel\Prompts\error;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data["slug"] = $this->generateSlug($data["title"]);

        $data["color"] = implode(",", sscanf($data["color"], "#%02x%02x%02x"));

        Technology::create($data);

        return redirect(route('admin.technologies.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $technology = Technology::where('slug', $slug)->first();
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $technology = Technology::where('slug', $slug)->first();
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $technology = Technology::where('slug', $slug)->first();

        $data = $request->all();

        $data["slug"] = $technology["title"];

        $data["color"] = implode(",", sscanf($data["color"], "#%02x%02x%02x"));

        $technology->update($data);

        return redirect(route('admin.technologies.show', $technology->slug));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $technology = Technology::where('slug', $slug)->first();

        $technology->delete();
        $technology->projects()->detach();

        return redirect(route('admin.technologies.index'));
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
            $alreadyExists = Technology::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists);

        return $slug;
    }
}
