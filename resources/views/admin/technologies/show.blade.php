@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="d-flex align-items-center justify-content-between">
                    {{-- Page Title --}}
                    <h1 class="my-3">Details on "{{ ucfirst($technology->title) }}"</h1>

                    {{-- button for the homepage --}}
                    <div class="text-end">
                        <a href="{{ route('admin.technologies.index') }}"><button class="btn btn-primary">Home</button></a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Color</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Technology's title --}}
                            <td>{{ ucfirst($technology->title) }}</td>

                            {{-- Technology's color --}}
                            <td>
                                <div class="color-square rounded-1" style="background-color:rgb({{ $technology->color }})">
                                </div>
                            </td>

                            {{-- Actions --}}
                            <td class="text-end">
                                <a href="{{ route('admin.technologies.show', $technology->slug) }}"><button
                                        class="btn btn-warning">Modify</button></a>
                                <form class="d-inline-block"
                                    action=" {{ route('admin.technologies.destroy', $technology->slug) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
