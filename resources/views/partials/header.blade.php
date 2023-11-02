@section('header-content')
    <nav class="nav justify-content-center bg-dark   ">
        <a class="nav-link" href="{{ route('home') }}">comics</a>
        <a class="nav-link " href="{{ route('comics.index') }}" aria-current="page">admin</a>
        <a class="nav-link " href="{{ route('about') }}" aria-current="page">about</a>
    </nav>
@endsection
