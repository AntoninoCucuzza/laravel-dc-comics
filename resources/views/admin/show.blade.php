@extends('layouts.app')

@extends('partials.header')


@section('main-content')
    <h1 class="text-center">Comic #{{ $comic->id }}</h1>
    <div class="container p-5">
        <div class="row">
            <div class=" col-8">
                <h1 class="fw-bold">{{ $comic->title }}</h1>
                <p class="">{{ $comic->description }}</p>
                <div class="row">
                    <div class="col-6 artists">
                        <h4>Artists:</h4>
                        <p>{{ $comic->artists }}</p>
                    </div>
                    <div class="col-6 writers">
                        <h4>Writers:</h4>
                        <p>{{ $comic->writers }}</p>

                    </div>
                    <div class="info pt-4">
                        <h4><strong>Type: </strong> {{ $comic->type }}</h4>
                        <h4><strong>Series: </strong> {{ $comic->series }}</h4>
                        <h4><strong>Sale Date: </strong> {{ $comic->sale_date }}</h4>
                        <h4><strong>Price: </strong> {{ $comic->price }}</h4>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <img class="img-fluid h-100 object-fit-cover" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            </div>
        </div>
    @endsection

    @extends('partials.footer')
