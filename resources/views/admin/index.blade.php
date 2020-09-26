@extends('main.layout')

@section('title')
    Online Shop
@endsection

@section('header')
    @include('main.header.admin')
@endsection


@section('content')
<div class="row">
@foreach($products as $product)
    <div class="col-sm-3 col-md-3">      
        <img src="{{ $product->imagePath }}" alt=".." class="img-thumbnail">
        <h3>{{ $product->name }}</h3>
        <h3>{{ $product->price }}</h3>
        <a href="{{ route('admin.show.product', [$product]) }}" class="btn btn-success pull-right" role="button">Details</a>
    </div>
@endforeach
</div>

<div class="text-right">
    <a href="{{ route('admin.create.product') }}" class="btn btn-dark">Create new product</a>
</div>
@endsection