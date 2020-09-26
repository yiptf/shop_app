@extends('main.layout')

@section('title')
    Online Shop
@endsection

@section('header')
    @include('main.header.guest')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Details</div>
                    <div class="card-body">
                    <img src="{{ $product->imagePath }}" alt=".." class="img-thumbnail">
                    <h3>{{ $product->name }}</h3>
                    <h3>{{ $product->price }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection