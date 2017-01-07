@inject('categories', 'App\Category')
<div class="container">
    <!-- portfolio filter begin -->
    <div class="row">
        <div class="col-md-12 text-center">
            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                <li><a href="#" data-filter="*" class="selected">Tất cả</a></li>
                @foreach($categories->all() as $category)
                    <li><a href="#" data-filter=".{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- portfolio filter close -->
</div>