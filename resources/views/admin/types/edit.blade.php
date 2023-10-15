@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Modify a Type</h1>

                <form action="{{ route('admin.types.update', $type->slug) }}" method="post">
                    @csrf
                    @method('patch')

                    {{-- Title input --}}
                    <div class="mb-3">
                        <label class="form-label">New Title</label>
                        <input name="title" type="text" class="form-control" value="{{ $type->title }}">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-warning mt-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
