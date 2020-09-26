@extends('main.layout')

@section('title')
    Online Shop
@endsection

@section('header')
    @include('main.header.user')
@endsection

@section('content')
<div class="row">
@foreach($products as $product)
    <div class="col-sm-3 col-md-3">      
        <img src="{{ $product->imagePath }}" alt=".." class="img-thumbnail">
        <h3>{{ $product->name }}</h3>
        <h3>{{ $product->price }}</h3>
        <a href="{{ route('user.show.product', [$product]) }}" class="btn btn-success pull-right" role="button">Details</a>
    </div>
@endforeach
</div>
@endsection