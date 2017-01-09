@extends('sites.layout')

@section('content')

@include('sites.shared._pageSubtitle', ['pageTitle' => 'Shop nội thất'])

<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<p class="woocommerce-result-count">
					Có tất cả 100 sản phẩm
				</p>

				<div class="row">
					@foreach($products as $product)
					<div class="col-md-4 product">
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