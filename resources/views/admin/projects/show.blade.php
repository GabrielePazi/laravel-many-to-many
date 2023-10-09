@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="box">
                    {{-- title --}}
                    <h1 class="my-3">{{ ucfirst($project->title) }}</h1>


                    <div class="d-flex justify-content-between align-items-center">
                        {{-- release date --}}
                        <h5 class="my-3">Published on: {{ date('d M Y', strtotime($project->release_date)) }}</h5>

                        {{-- link --}}
                        <h6><a href="{{ $project->link }}">Project's Link</a></h6>
                    </div>

                    {{-- thumb --}}
                    <img class="rounded-3" src="{{ $project->thumb }}" alt="" width="100%">

                    {{-- description --}}
                    <div class="my-4">
                        <h5>Project's Description:</h5>
                        <p>{{ ucfirst($project->description) }}</p>
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex gap-2 my-4 w-100 justify-content-end">
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">Modify</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
