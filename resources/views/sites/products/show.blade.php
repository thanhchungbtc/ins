@extends('sites.layout')

@section('content')

@include('sites.shared._pageSubtitle', ['pageTitle' => 'Shop nội thất'])

<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12 product">

						<div class="product_item">
							<a class="image-popup-no-margins" href="/{{ $product->photos->first()->path }}">
								<img src="/{{ $product->photos->first()->thumbnailPath }}" class="product_thumbnail300">
							</a>
							<h1 class="text-left product-title">{{ $product->name }}</h1>
							<div class="product_detail_price">${{ number_format($product->price, 2) }}</div>
							<span>{{ $product->short_description }}</span>
						</div>
						<div class="clear"></div>
						<div class="product_description">{{ $product->description }}</div>
					</div>
				</div>

				<h2>
					Sản phẩm liên quan
				</h2>

				<div class="row">
					@foreach($relatedProducts as $product)
					<div class="col-md-3 product">
						@include('sites.shared._product', ['product' => $product])
					</div>
					@endforeach

				</div>
			</div>

			<div class="col-md-3">
				@include('sites.shared._sidebar')
			</div>
		</div>
	</div>
</section>
@stop