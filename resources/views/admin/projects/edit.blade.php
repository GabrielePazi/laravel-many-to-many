@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Modifica un progetto</h1>

                <form action="{{ route('admin.projects.update', $project->slug) }}" method="post">
                    @csrf
                    @method('patch')

                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label">Project's Title</label>
                        <input name="title" class="form-control" value="{{ $project->title }}">
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Project's Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $project->description }}</textarea>
                    </div>

                    {{-- thumb --}}
                    <div class="mb-3">
                        <label class="form-label">Project's Image</label>
                        <input name="thumb" class="form-control" value="{{ $project->thumb }}">
                    </div>

                    {{-- release_date --}}
                    <div class="mb-3">
                        <label class="form-label">Project's Release Date</label>
                        <input type="date" name="release_date" class="form-control" value="{{ $project->release_date }}">
                    </div>

                    {{-- link --}}
                    <div class="mb-3">
                        <label class="form-label">Project's link</label>
                        <input name="link" class="form-control" value="{{ $project->link }}">
                    </div>

                    <div class="w-100 text-end">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
