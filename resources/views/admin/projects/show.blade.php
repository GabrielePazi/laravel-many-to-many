@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="box">
                    <h5 class="mt-3"><a href="{{ route('admin.projects.index') }}"><- HomePage</a></h5>
                    {{-- title and type of th project --}}
                    <h1 class="my-3">{{ ucfirst($project->title) }}<span
                            class="badge bg-primary ms-3">{{ $project->type->title }}</span></h1>

                    {{-- Technology --}}
                    @foreach ($project->technologies as $technology)
                        <div class="badge" style="background-color: rgb({{ $technology->color }})">{{ $technology->title }}
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center">
                        {{-- release date --}}
                        <h5 class="my-3">Published on: {{ date('d M Y', strtotime($project->release_date)) }}</h5>

                        {{-- link --}}
                        <h6><a href="{{ $project->link }}">Project's Link</a></h6>
                    </div>

                    {{-- thumb --}}
                    <img class="rounded-3"
                        src=" @if (str_contains(asset('/storage/' . $project?->thumb), 'projects')) {{ asset('/storage/' . $project?->thumb) }}   
                    @else
                        {{ $project?->thumb }} @endif "
                        alt="" width="100%">

                    {{-- description --}}
                    <div class="my-4">
                        <h5>Project's Description:</h5>
                        <p>{{ ucfirst($project->description) }}</p>
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex gap-2 my-4 w-100 justify-content-end">
                        @if ($project->deleted_at == null)
                            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">Modify</a>
                        @else
                            <a href="{{ route('admin.projects.restore', $project->slug) }}"
                                class="btn btn-warning">Restore</a>
                        @endif
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
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
