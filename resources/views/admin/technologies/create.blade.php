@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Add New Technology</h1>

                <form action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="input-group mb-3">
                        {{-- Color input --}}
                        <div style="width:60px; height: 58px">
                            <input name="color" type="color" class="form-control rounded-end-0 h-100 p-2">
                        </div>
                        <div class="form-floating">
                          <input name="title" type="text" class="form-control">
                          <label class="form-label">Title</label>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-success mt-5">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
