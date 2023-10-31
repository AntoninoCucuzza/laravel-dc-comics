@extends('layouts.app')

@extends('partials.header')

@section('main-content')
    @forelse ($comics as $comic)
        <h1 class="card-title">{{ $comic->title }}</h1>
    @empty
        <h1>no comics</h1>
    @endforelse
@endsection

@extends('partials.footer')
