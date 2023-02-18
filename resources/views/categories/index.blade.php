@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h3>Categories</h3>
        <ul class="list-disc">
            @foreach ($categories as $c)
                <li><a href="/categories/{{$c['id']}}/products">{{ $c['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection