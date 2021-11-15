<div class="breadcumb-area">
    <!-- breadcumb content -->
    <div class="breadcumb-content">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                        <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">{{ $title }}</h2>
                        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                            @if ($parentTitle !== null)
                                <li class="breadcrumb-item"><a href="{{ $parentRoute }}">{{ $parentTitle }}</a></li>
                            @endif
                            @if ($childTitle !== null)
                                <li class="breadcrumb-item"><a href="{{ $childRoute }}">{{ $childTitle }}</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
