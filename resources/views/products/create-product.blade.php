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
        @vite("resources/css/app.css")
    </head>
    <body>
        <div class="container">
            <form class="create__form-product" action="http://127.0.0.1:8000/api/products/create" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="create__form-input" type="text" name="name" placeholder="Product Name" required><br>
                <input class="create__form-input" type="number" name="price" placeholder="Price" required><br>
                <textarea class="create__form-textarea" name="description" placeholder="Description" required></textarea>
                <br>
                <input class="create__form-input" type="number" name="rating" placeholder="Rating"><br>
                <input class="create__form-input" type="file" name="image" accept="image/*" required><br>
                <label for="category_id">Категория:</label>
                <select id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select><br>
                <button class="create__form-btn" type="submit">Create Product</button>
            </form>
            @if(isset($errorMessage))
                <div class="alert alert-danger">
                    {{ $errorMessage }}
                </div>
            @endif
        </div>
    </body>
</html>