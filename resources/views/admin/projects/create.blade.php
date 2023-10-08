@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <form action="">
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Project's Title</label>
                        <input name="title" class="form-control">
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Project's Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    {{-- thumb --}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Project's Image</label>
                        <input name="thumb" class="form-control">
                    </div>

                    {{-- release_date --}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Project's Release Date</label>
                        <input type="date" name="release_date" class="form-control">
                    </div>

                    {{-- link --}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Project's link</label>
                        <input name="link" class="form-control">
                    </div>

                    <div class="w-100 text-end">
                        <button class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
