@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Add New Type</h1>

                <form action="{{ route('admin.types.store') }}" method="post">
                    @csrf
                    @method('post')

                    {{-- Title input --}}
                    <div class="mb-3">
                        <label class="form-label">New Title</label>
                        <input name="title" type="text" class="form-control">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-success mt-5">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
