
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }}</title>
    @vite("resources/css/app.css")
</head>
<body>
    @include('layouts.header')

    <main class="main">
        <div class="container">
            <h1 class="products__title">{{ $product->name }}</h1>
            <div class="product__wrap">
                <div>
                    <img src="{{ $product->image_product }}" alt="{{ $product['name'] }}">
                </div>
                <div>
                    <p class="product__desc">{{ $product->description }}</p>
                </div>
            </div>
            <div>{{ $product->price }}</div>
            <div>{{ $product->date_publish }}</div>
        </div>
    </main>
</body>
</html>