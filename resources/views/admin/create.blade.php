@extends('layouts.app')

@extends('partials.header')

@section('main-content')
    <div class="container py-3">
        <h1 class="text-center">Add Comic</h1>

        <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" mb-5 ">
                <div class="row g-3 align-items-center ">
                    <div class="col-6">
                        <label for="title" class="form-label ">Title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpid"
                            placeholder="Insert a comic title">
                    </div>
                    <div class="col-6">
                        <label for="description" class="form-label ">description</label>
                        <textarea style="height: 38px" class="form-control" placeholder="Leave a description here" id="description"></textarea>
                    </div>
                </div>
            </div>

            {{--  <div class=" mb-5 ">
                <div class="row g-3 align-items-center ">
                    <div class="col-6">
                        <label for="artist" class="form-label ">artist</label>
                        <input type="text" class="form-control" name="artist" id="artist" aria-describedby="helpid"
                            placeholder="Insert comic artists">
                    </div>
                    <div class="col-6">
                        <label for="writers" class="form-label ">writers</label>
                        <input type="text" class="form-control" placeholder="Insert writers here" id="writers">
                    </div>
                </div>
            </div> --}}

            <div class="mb-5">
                <div class="row g-3 align-items-center ">
                    <div class="col-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="helpid"
                            placeholder="Insert a comic price">
                    </div>
                    <div class="col-4">
                        <label for="type" class="form-label">type</label>
                        <input type="text" class="form-control" name="type" id="type" aria-describedby="helpid"
                            placeholder="Insert a comic type">
                    </div>

                    <div class="col-4">
                        <label for="series" class="form-label">series</label>
                        <input type="text" class="form-control" name="series" id="series" aria-describedby="helpid"
                            placeholder="Insert a comic series">
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label for="thumb" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Choose file"
                    aria-describedby="helpid">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>

        </form>

    </div>
@endsection

@extends('partials.footer')
