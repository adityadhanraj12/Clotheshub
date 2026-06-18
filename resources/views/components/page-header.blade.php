<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>{{ $title }}</h1>
            </div>

            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{ $title }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>