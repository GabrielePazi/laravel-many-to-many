@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="d-flex align-items-center justify-content-between">
                    {{-- Page Title --}}
                    <h1 class="my-3">Details on "{{ ucfirst($type->title) }}"</h1>

                    {{-- button for the homepage --}}
                    <div class="text-end">
                        <a href="{{ route('admin.types.index') }}"><button class="btn btn-primary">Home</button></a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- Type's title --}}
                            <td>
                              <h5><span class="badge bg-primary">{{ ucfirst($type->title) }}</span></h5>
                            </td>

                            {{-- Actions --}}
                            <td class="text-end">
                                <a href="{{ route('admin.types.show', $type->slug) }}"><button
                                        class="btn btn-warning">Modify</button></a>
                                <form class="d-inline-block"
                                    action=" {{ route('admin.types.destroy', $type->slug) }}" method="post">
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
