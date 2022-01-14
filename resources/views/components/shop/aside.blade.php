<aside class="sidebar-area">
    <div class="widget widget_search style-two">
        <form class="search-form">
            <div class="form-group">
                <input class="btn-radius" type="text" placeholder="Arama yap...">
            </div>
            <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="widget widget-product-sorting">
        <h2 class="widget-title">Fiyata Göre Filtrele</h2>
        <div class="slider-product-sorting"></div>
        <div class="product-range-detail">
            <label for="amount">Fiyat:</label>
            <input type="text" id="amount" readonly="">
            <button class="float-right">Filtrele</button>
        </div>
    </div>
    <div class="widget widget_categories product_category">
        <h2 class="widget-title">Kategoriler</h2>
        <ul>
            @foreach ($categories as $category)
                <li><a href="#">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </div>
</aside>
