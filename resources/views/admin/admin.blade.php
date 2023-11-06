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

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $comic->id }}">
                                    Delete
                                </button>

                                <div class="modal fade" id="modalId-{{ $comic->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $comic->id }}" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">

                                        <div class="modal-content">

                                            <div class="modal-header bg-dark">
                                                <h5 class="modal-title" id="modalTitle-{{ $comic->id }}">Modal id:
                                                    {{ $comic->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body bg-dark">
                                                sei sicuro di voler eliminare questo fumetto? non si torna indietro
                                            </div>

                                            <div class="modal-footer bg-dark">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>


                                                <form class=" d-inline-block bg-dark"
                                                    action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                </form>

                                            </div>

                                        </div>
                                    </div>

                                    {{--         <form class=" d-inline-block" action="{{ route('comics.destroy', $comic->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}

                            </td>
                        </tr>
                    @empty
                        <h1> no comics? very very...</h1>
                    @endforelse
                </tbody>

            </table>
            {!! $comics->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>


        <h1 class="text-center">soft-deleted comics</h1>
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
                @forelse ($deletedComics as $deletedcomic)
                    <tr class="text-center table-dark">
                        <td>{{ $deletedcomic->id }}</td>
                        <td>{{ $deletedcomic->title }}</td>
                        @if (str_contains($comic->thumb, 'http'))
                            <td>
                                <img height="75px" src="{{ $deletedcomic->thumb }}">
                            </td>
                        @else
                            <td>
                                <img height="75px" src="{{ asset('storage/' . $deletedcomic->thumb) }}">
                            </td>
                        @endif
                        <td>bottoni </td>
                    </tr>
                @empty
                    <tr class="text-center table-dark">
                        <td colspan="4">no comics has been deleted</td>
                    </tr>
                @endforelse

            </tbody>
        </table>



    </div>
@endsection

@extends('partials.footer')
