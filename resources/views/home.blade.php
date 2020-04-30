@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">@lang('Your Cart')</div>
                <div class="card-body">
                   <span class="text-secondary">@lang('Your cart is currently empty')</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('Product List')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                    TODO: Create product list--}}
                    @foreach($products as $product)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ $product->name }}
                            </div>
                            <div class="card-body row">
                                <div class="col-sm-10">
                                    {{ $product->description }}
                                </div>
                                <div class="col-sm-2">
{{--                                    TODO: Create product options--}}
                                    <button class="btn btn-primary btn-sm">
                                        @lang('Add to cart')
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
