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
                <div class="card-header">Edit product</div>
                    <div class="card-body">
                        <form action="{{ route('admin.update.product', [$product]) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('main.form')
                            <button type="submit" class="btn btn-primary">Make changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection