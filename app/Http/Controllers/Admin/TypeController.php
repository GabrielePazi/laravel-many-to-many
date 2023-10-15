<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data["slug"] = $this->generateSlug($data["title"]);

        Type::create($data);

        return redirect(route('admin.types.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $type = Type::where('slug', $slug)->first();
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $type = Type::where('slug', $slug)->first();
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $type = Type::where('slug', $slug)->first();

        $data = $request->all();

        $data["slug"] = $type["slug"];

        $type->update($data);

        return redirect(route('admin.types.show', $type->slug));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $type = Type::where('slug', $slug)->first();

        $type->delete();

        return redirect(route('admin.types.index'));
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
            $alreadyExists = Type::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists);

        return $slug;
    }
}
