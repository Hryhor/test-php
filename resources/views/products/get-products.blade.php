<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite("resources/css/nouislider.css")
        @vite("resources/css/app.css")
    </head>
    <body>
        @include('layouts.header')

        <main class="main">
            <section class="products">
                <div class="container">
                    <h1 class="products__title">Новинки магазину</h1>
   
                    <div class="products-content grid-container">
                        <form id="filter-form" action="{{ route('products.get-products') }}" method="GET">
                            <div class="filters">
                                <div class="filters__item filters-price">
                                    <div class="filters-price__title">Ціна</div>
                                    <div id="range-slider" class="filters-price__slider"></div>
                                    <div class="filters-price__inputs">
                                        <label class="filters-price__label">
                                            <span class="filters-price__text">від</span>
                                            <input id="input-0" name="min_price" type="number" min="100" max="9999" placeholder="100" class="filters-price__input">
                                            <span class="filters-price__text">грн</span>
                                        </label>
                                        <label class="filters-price__label">
                                            <span class="filters-price__text">до</span>
                                            <input id="input-1" name="max_price" type="number" min="100" max="9999" placeholder="9999" class="filters-price__input">
                                            <span class="filters-price__text">грн</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="products__category">
                                @foreach ($products as $product)
                                    <ul class="product__category">
                                        @if ($product->category)
                                            <li id="{{ $product->category->id }}" class="product__category-item category-filter" data-category-id="{{ $product->category->id }}">{{ $product->category->name }}</li><br>
                                        @endif
                                    </ul>
                                @endforeach
                            </div>

                            <button id="filter-form" class="product__btn filters_btn" type="submit">Застосувати фільтр</button>
                            <button id="reset-btn" class="product__btn" method="reset" type="button">Cкинути фільтр</button>
                        </form>

                        <ul class="products-grid">
                            @foreach ($products as $product)
                                <li class="products-grid-item product-item">
                                    <article class="product">
                                        <a href="{{ route('products.get-product', ['id' => $product->id]) }}" class="product__image">
                                            <div class="product__switch image-switch">
                                                <div class="image-switch__item">
                                                    <div class="image-switch__img">
                                                        <img src="{{ $product->image_product }}" alt="{{ $product['name'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="product__image-pagination image-pagination" aria-hidden="true"></ul>
                                        </a>
                                        <h3 class="product__title">
                                            <a href="#">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product__props">
                                            <span class="product__rating">
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.04894 0.92705C7.3483 0.00573924 8.6517 0.00573965 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58779 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z" />
                                                </svg>
                                                {{ $product->rating }}
                                            </span>
                                            <span class="product__testimonials">83 відгуку</span>
                                        </div>
                                        <div class="product__info">
                                            <span class="product__available">В наявності: 13 шт</span>
                                        </div>
                                        <div class="product__price product-price">
                                            <span class="product-price__current" data-price="{{ $product->price }}">{{ $product->price }}</span>
                                        </div>
                                        <button class="product__btn">Придбати</button>
                                    </article>
                                </li>
                            @endforeach  
                        </ul>
                    </div>
                </div>
            </section>
        </main>
        @vite('resources/js/app.js')
    </body>
</html>