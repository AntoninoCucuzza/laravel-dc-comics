@extends('layouts.app')

@extends('partials.header')

@section('main-content')
    <div class="container py-3">
        <h1 class="text-center mb-3">Comic List</h1>
        <div class=" text-center mb-3">
            <a class="btn btn-secondary" href="{{ route('home') }}">Guests Home</a>
            <a class="btn btn-success" href="{{ route('comics.create') }}">Add Comic</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive-sm">
            <table class="table table-light table-hover">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr class="text-center table-dark">
                            <td>{{ $comic->id }}</td>
                            <td>{{ $comic->title }}</td>

                            @if (str_contains($comic->thumb, 'http'))
                                <td>
                                    <img height="75px" src="{{ $comic->thumb }}">
                                </td>
                            @else
                                <td>
                                    <img height="75px" src="{{ asset('storage/' . $comic->thumb) }}">
                                </td>
                            @endif
                            <td>
                                <a class="btn btn-primary" href="{{ route('comics.show', $comic->id) }}">More</a>
                                <a class="btn btn-warning " href="{{ route('comics.edit', $comic->id) }}">Edit</a>

                                <form class=" d-inline-block" action="{{ route('comics.destroy', $comic->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                {{-- <a class="btn btn-danger" href="#">Delete</a> --}}
                            </td>
                        </tr>
                    @empty
                        <h1> no comics? very very...</h1>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
@endsection

@extends('partials.footer')
