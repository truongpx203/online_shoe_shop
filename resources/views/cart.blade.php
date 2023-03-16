@extends('layouts.app')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        @if(session('cart'))

        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <form action="{{ route('updateCart') }}" method="POST">
                            @csrf
                            <tbody>
                            <?php $total = 0 ?>

                                @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                        <tr>
                                            <input type="hidden" name="id[]" value="{{ $id }}" />
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="{{ $details['image'] != '' ? asset('storage/image/'.$details['image'] ) : '' }}" width="60px" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <p>{{ $details['name'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 id="price-{{ $id }}">@convert($details['price'])</h5>
                                            </td>
                                            <td>
                                                <div class="product_count">
                                                    <input type="text" name="qty[]" id="sst-{{ $id }}" maxlength="12" value="{{ $details['quantity'] }}" title="Quantity:"
                                                           class="input-text qty">
                                                    <input type="hidden" id="sst-default-{{ $id }}" maxlength="12" value="{{ $details['quantity'] }}"
                                                           class="input-text">
                                                    <button onclick="
                                                        var result = document.getElementById('sst-{{ $id }}');
                                                        var defaultResult = document.getElementById('sst-default-{{ $id }}').value;
                                                        var sst = result.value;
                                                        if( !isNaN( sst )) result.value++;
                                                        var updateCart = document.getElementById('btn-cart-update');
                                                        var ddd = result.value;
                                                         if( ddd === defaultResult){
                                                               updateCart.classList.remove('bg-warning');
                                                         }else{
                                                             updateCart.classList.add('bg-warning');
                                                         }
                                                        return false;"
                                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                                    <button onclick="
                                                        var result = document.getElementById('sst-{{ $id }}');
                                                        var defaultResult = document.getElementById('sst-default-{{ $id }}').value;

                                                        var sst = result.value;
                                                        if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;

                                                        var updateCart = document.getElementById('btn-cart-update');
                                                        var ddd = result.value;
                                                         if( ddd === defaultResult){
                                                               updateCart.classList.remove('bg-warning');
                                                         }else{
                                                             updateCart.classList.add('bg-warning');

                                                         } return false;"
                                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>@convert($details['price'] * $details['quantity'])</h5>
                                            </td>
                                        </tr>
                                @endforeach
                                <tr class="bottom_button">
                                    <td>
                                        <button name="action" value="updateCart"  type="submit" class="gray_btn" id="btn-cart-update" href="#">Update Cart</button>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>@convert($total)</h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="#">Back</a>
                                            <button name="action" value="postToConfirm" type="submit" class="border-0 primary-btn" href="#">Proceed to checkout</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        @elseif(!Auth::check())
            <div class="d-flex justify-content-center">
                <h3>You need Login account. <a href="{{ route('login') }}">Login!</a></h3>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <h3>This cart is empty. <a href="{{ route('products.index') }}">Buy Now!</a></h3>
            </div>
        @endif
    </section>
    <!--================End Cart Area =================-->

@endsection

@section('javascript')
    <script type="text/javascript">
     </script>
@endsection
