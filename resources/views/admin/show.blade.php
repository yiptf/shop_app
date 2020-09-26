@extends('main.layout')

@section('title')
    Online Shop
@endsection

@section('header')
    @include('main.header.admin')
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
                    <div class="text-right">
                        <a href="{{ route('admin.edit.product',[$product]) }}" class="btn btn-success pull-right">Edit</a>
                        <form action="{{ route('admin.delete.product', [$product]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-success pull-right">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection