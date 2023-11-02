@extends('layouts.app')

@extends('partials.header')

@section('main-content')
    <div class="container py-3">
        <h1 class="text-center">Add Comic</h1>
        <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-5">
                <div class="row g-3 align-items-center ">
                    <div class="col-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpid"
                            placeholder="type comic name" value="{{ $comic->title }}">
                    </div>

                    <div class="col-6">
                        <label for="description" class="form-label ">description</label>
                        <textarea style="height: 38px" class="form-control" placeholder="Leave a description here" id="description"
                            value="{{ $comic->description }}"></textarea>
                    </div>
                </div>

            </div>
            <div class="mb-5">

                <div class="row g-3 align-items-center ">
                    <div class="col-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="helpid"
                            placeholder="typer price" value="{{ $comic->price }}">
                    </div>
                    <div class="col-4">
                        <label for="type" class="form-label">type</label>
                        <input type="text" class="form-control" name="type" id="type" aria-describedby="helpid"
                            placeholder="Insert a comic type" value="{{ $comic->type }}">
                    </div>
                    <div class="col-4">
                        <label for="series" class="form-label">series</label>
                        <input type="text" class="form-control" name="series" id="series" aria-describedby="helpid"
                            placeholder="Insert a comic series" value="{{ $comic->series }}">
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="d-flex gap-3">

                    <div>
                        @if (str_contains($comic->thumb, 'http'))
                            <img class="img-fluid" src="{{ $comic->thumb }}">
                        @else
                            <img class="img-fluid" src="{{ asset('storage/' . $comic->thumb) }}">
                        @endif
                    </div>

                    <div class="mb-5">

                        <label for="thumb" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Choose file"
                            aria-describedby="helpid">
                        <div class="mt-5">
                            <button type="submit" class="btn btn-warning">update</button>
                            <button type="reset" class="btn btn-danger">Reset</button>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@extends('partials.footer')
