@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="my-3">Types list:</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                {{-- Type's title --}}
                                <td>
                                  <h5><span class="badge bg-primary">{{ ucfirst($type->title) }}</span></h5>
                                </td>

                                {{-- Actions --}}
                                <td class="flex-nowrap text-end">
                                    <a href="{{ route('admin.types.show', $type->slug) }}"><button
                                            class="btn btn-info">Details</button></a>
                                    <a href="{{ route('admin.types.edit', $type->slug) }}"><button
                                            class="btn btn-warning">Modify</button></a>
                                    <form class="d-inline-block"
                                        action=" {{ route('admin.types.destroy', $type->slug) }}"
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

                {{-- New Type button --}}
                <div class="text-end">
                    <a href="{{ route('admin.types.create') }}"><button class="btn btn-primary">Add</button></a>
                </div>

            </div>
        </div>
    </div>
@endsection
