@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Modifica un progetto</h1>

                @include('admin.projects.forms.upsert', [
                    'action' => route('admin.projects.update', $project->slug),
                    'method' => 'patch'
                ])
            </div>
        </div>
    </div>
@endsection
