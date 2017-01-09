<div class="widget">
	<h4>Sản phẩm bán chạy</h4>
	<div class="small-border"></div>
	<ul class="product-list">
		@foreach($hotProducts as $p)
		<li class="product_item">
			<img src="/{{ $p->photos->first()->thumbnailPath }}" class="product_thumbnail">
			<a href="/shop/{{ $p->id }}">
				<span class="product-title">{{ $p->name }}</span>
			</a>
			<div class="clear"></div>
			<div class="product_price">${{ number_format($p->price, 2) }}</div>
		</li>
		@endforeach()
	</ul>
</div>

<div class="widget">
	<h4>Danh mục sản phầm</h4>
	<div class="small-border"></div>
	<ul class="list-group">
		@foreach($categories as $c)

		<li class="list-group-item">
			<a href="#">
				<span class="product-title">{{ $c->name }}</span>
			</a>
		</li>
		@endforeach()
	</ul>
</div>
