@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Technologies list:</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Color</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                {{-- Technology's title --}}
                                <td>{{ ucfirst($technology->title) }}</td>

                                {{-- Technology's color --}}
                                <td>
                                    <div class="color-square rounded-1"
                                        style="background-color:rgb({{ $technology->color }})">
                                    </div>
                                </td>

                                {{-- Actions --}}
                                <td class="flex-nowrap text-end">
                                    <a href="{{ route('admin.technologies.show', $technology->slug) }}"><button
                                            class="btn btn-info">Details</button></a>
                                    <a href="{{ route('admin.technologies.edit', $technology->slug) }}"><button
                                            class="btn btn-warning">Modify</button></a>
                                    <form class="d-inline-block"
                                        action=" {{ route('admin.technologies.destroy', $technology->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- New Technology button --}}
                <div class="text-end">
                    <a href="{{ route('admin.technologies.create') }}"><button class="btn btn-primary">Add</button></a>
                </div>

            </div>
        </div>
    </div>
@endsection
