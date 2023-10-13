@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Modify a Technology</h1>

                <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="input-group mb-3">
                        {{-- Color input --}}
                        <div style="width:60px; height: 58px">
                            <input name="color" type="color" class="form-control rounded-end-0 h-100 p-2" value="{{ sprintf("#%02x%02x%02x", explode(',', $technology->color)[0], explode(',', $technology->color)[1], explode(',', $technology->color)[2]) }}">
                        </div>
                        {{-- Title input --}}
                        <div class="form-floating">
                          <input name="title" type="text" class="form-control" value="{{ $technology->title }}">
                          <label class="form-label">New Title</label>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-warning mt-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
