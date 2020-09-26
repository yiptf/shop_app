@extends('main.layout')

@section('title')
    Online Shop
@endsection

@section('header')
    @include('main.header.user')
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

<div class="text-right">
    <form action="{{ route('user.add.product', [$product]) }}" method="post">
    @csrf
    <label for="quantity">Quantity</label>
    <input name="quantity" type="number" min="0" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the quantity</small>
    @error('price') <p style="color: red;">{{ $message }}</p>@enderror
    <button class="btn btn-success pull-right">Add</button>
    </form>
</div>
@endsection