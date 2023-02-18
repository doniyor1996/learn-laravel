@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1>Products</h1>
        <ul class="list-disc">
            @foreach ($list as $product)
                <li><a href="/products/{{$product['id']}}">{{ $product['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
