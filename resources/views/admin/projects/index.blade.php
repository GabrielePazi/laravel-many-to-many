@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="text-end my-3">
                    <a href=" {{ route('admin.projects.create') }}" class="btn btn-success">Create New Project</a>
                </div>
                <div class="cards-container d-flex gap-3 flex-wrap">

                    @foreach ($projects as $project)
                        @include('admin.profile.partials.project-card')
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
