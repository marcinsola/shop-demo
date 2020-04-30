@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card cart" data-cart-id="{{$cart->getKey()}}">
                <div class="card-header">@lang('Your Cart')</div>
                <div class="card-body">
                    @if($cart->products->isEmpty())
                       <span class="text-secondary">@lang('Your cart is currently empty')</span>
                    @endif

                    @foreach($cart->products as $cartProduct)
                        <div class="card-header">
                            {{ $cartProduct->name }}
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-10">
                                {{ $cartProduct->description }}
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="amount" step="1">
                                <button class="btn btn-danger btn-sm">@lang('Remove from cart')</button>
                            </div>
                        </div>
                    @endforeach
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
                    @foreach($products as $product)
                        <div class="card mb-3">
                            <div class="card-header product-header">
                                {{ $product->name }}
                            </div>
                            <div class="card-body row">
                                <div class="col-sm-10">
                                    {{ $product->description }}
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary btn-sm add-product" data-product-id="{{ $product->getKey() }}">
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
<script type="application/javascript">
    $('.add-product').click(function(e) {
        let productId = $(this).data('product-id'),
            cartId = $('.cart').data('cart-id');

        $.post('/addProduct', {'cart-id': cartId, 'product-id': productId, '_token': "{{ csrf_token() }}"})
            .done(function (data) {
                console.log(data)
            })
    });
</script>
@endsection

