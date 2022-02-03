<div class="breadcrumb-area" style="background-image:url(/assets/img/page-title-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">{{ $title }}</h1>
                    <ul class="page-list">
                        <li><a href="{{ route('home') }}">Anasayfa</a></li>
                        @if ($parentTitle !== null)
                            <li><a href="{{ $parentRoute }}">{{ $parentTitle }}</a></li>
                        @endif
                        @if ($childTitle !== null)
                        <li><a href="{{ $childRoute }}">{{ $childTitle }}</a></li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

