<a href="/shop/{{ $product->id }}">

<img width="100%" src="/{{ $product->photos->first()->thumbnailPath }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" />
</a>

<h4>
<a href="/shop/{{ $product->id }}">
	{{ $product->name }}
</a>
</h4>

<div class="price"><span class="woocommerce-Price-amount amount">${{ number_format($product->price, 2) }}</span></div>

<a href="/shop/{{ $product->id }}" class="button btn btn-line button product_type_simple add_to_cart_button ajax_add_to_cart">Xem thêm</a>