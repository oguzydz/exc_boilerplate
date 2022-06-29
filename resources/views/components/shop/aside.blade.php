<aside class="sidebar-area">
    <form id="home-filter" method="GET" action="{{ route(Request::route()->getName(), Route::current()->parameters()) }}">
        <div class="widget widget_search style-two">
            <div class="search-form">
                <div class="form-group">
                    <input name="search" class="btn-radius" type="text" value="{{ Request()->search }}"
                        onchange="this.form.submit()" placeholder="Arama yap...">
                </div>
                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="widget widget-product-sorting">
            <h2 class="widget-title">Fiyata Göre Filtrele</h2>
            <div class="slider-product-sorting"></div>
            <div class="product-range-detail">
                <label for="amount">Fiyat:</label>
                <input type="text" id="amount" value="500" readonly="">
                <input name="minAmount" type="hidden" id="minAmount">
                <input name="maxAmount" type="hidden" id="maxAmount">
                <button class="float-right">Filtrele</button>
            </div>
        </div>
    </form>
    <div class="widget widget_categories product_category">
        <h2 class="widget-title">Kategoriler</h2>
        <ul>
            @foreach ($categories as $category)
                <li><a
                        href="{{ route($company->slug . '.category.show', [$category->slug]) }}">{{ $category->title }}</a>
                </li>
            @endforeach
            <li><a href="{{ route($company->slug . '.category.index') }}">Tümünü Görüntüle</a></li>
        </ul>
    </div>
</aside>
