@extends('layouts.app')

@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-6 ">
						<div class="single-prd-item">
							<img class="img-fluid" style="height: 500px;" src="{{ asset('storage/image/' . $product->image) }}" alt="">
						</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{ $product->name }}</h3>
						<h2>@convert($product->price)</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> :
                                @foreach ($cate as $item)
                                    @if ($item->id == $product->id_category)
                                         {{ $item->name }}
                                    @endif
                                @endforeach
                               </a></li>
						</ul>
						<p>{{ $product->description }}</p>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="{{ route('cart', $product->id) }}">Add to Cart</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

@endsection

@section('javascript')

@endsection
