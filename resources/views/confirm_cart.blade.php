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
    <section class="cart_area pt-3">
        @if(session('cart'))
                <form action="{{ route('postCart') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}" />
                <div class="col-6 m-auto">
                    <h3 class="mb-30 text-center">Purchase Information</h3>
                    <div class="section-top-border mt-2">
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">
                                    <div class="serial">#</div>
                                    <div class="country">Name</div>
                                    <div class="visit">Quantity</div>
                                    <div class="percentage">Price</div>
                                </div>
                                    <?php $total = 0;
                                    $number = 1;
                                    ?>
                                @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                    <input type="hidden" name="id_product[]" value="{{ $id }}" />
                                    <div class="table-row">
                                        <div class="serial">{{$number++}}</div>
                                        <div class="country"> <img src="{{ $details['image'] != '' ? asset('storage/image/'.$details['image'] ) : '' }}" width="60px" /></div>
                                        <div class="visit">{{ $details['quantity'] }}</div>
                                        <div class="percentage">
                                            @convert($details['price'] * $details['quantity'])
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="checkout_btn_inner d-flex justify-content-end mt-3 mb-3">
                        <h4>Total : @convert($total)</h4>
                        <input name="total" type="hidden" value="{{ $total }}"/>
                    </div>
                    <div class="mt-10">
                        <input type="text" name="name_buyer" value="{{ Auth::user()->name }}" placeholder="Name" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Name'"
                               required class="single-input-primary">
                    </div>

                    <div class="mt-10">
                        <input type="text" value="{{ Auth::user()->email }}" name="email" placeholder="Email address" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Email address'"
                               required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="phone" placeholder="Phone" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Phone'"
                               required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Address'"
                               required class="single-input-primary">
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select name="payment">
                                <option value="1">visit card</option>
                                <option value="2">Cash</option>
                                <option value="3">Transfer</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-10">
                        <textarea class="single-textarea" placeholder="Note" name="note" onfocus="this.placeholder = ''"
                                  onblur="this.placeholder = 'Note'" required></textarea>
                    </div>
                    <div class="checkout_btn_inner d-flex justify-content-end mt-3">
                        <a class="gray_btn" href="{{ route('cart') }}">Back</a>
                        <button type="submit" class="border-0 primary-btn ml-3" href="#">Submit</button>
                    </div>
                    </div>
                </form>
        @elseif(!Auth::check())
            <div class="d-flex justify-content-center">
                <h3>You need Login account. <a href="{{ route('login') }}">Login!</a></h3>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <h3>This cart is empty. <a href="{{ route('product') }}">Buy Now!</a></h3>
            </div>
        @endif
    </section>
    <!--================End Cart Area =================-->

@endsection

@section('javascript')
    <script type="text/javascript">
    </script>
@endsection
