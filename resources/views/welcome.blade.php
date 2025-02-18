<!DOCTYPE html>
<html lang="en">

<head>
    @include('homepage.header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="main">
        <div class="carousel">
            <div class="carousel-track">
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/back5.png') }}" alt="carousel pic">
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="services-section">
            <div class="services-grid">
                <div class="service-card">
                    <img src="{{ asset('images/icons/plumbing.png') }}" alt="Service 1">
                    <span>Plumber</span>

                </div>
                <div class="service-card">
                    <img src="{{ asset('images/icons/electrician.png') }}" alt="Service 2">
                    <span>Electrician</span>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/icons/carpenter.png') }}" alt="Service 3">
                    <span>Carpenter</span>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/icons/painter.png') }}" alt="Service 4">
                    <span>Painter</span>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/icons/welder.png') }}" alt="Service 5">
                    <span>Welder</span>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/icons/gardener.png') }}" alt="Service 6">
                    <span>Gardener</span>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>