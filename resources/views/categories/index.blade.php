@extends('layouts.app')

@section('content')

<div class="container mx-auto">
<ul class="list-disc">
@foreach ($categories as $c)
  <li><a href="/categories/{{$c['id']}}">{{ $c['name'] }}</a></li>
@endforeach
</ul>
</div>

@endsection
