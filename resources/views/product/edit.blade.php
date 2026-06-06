<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form action="{{ route('product.update', $product->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}">
    <br><br>

    <input type="number" name="points" value="{{ $product->points }}">
    <br><br>

    <input type="text" name="image" value="{{ $product->image }}">
    <br><br>

    <textarea name="description">{{ $product->description }}</textarea>
    <br><br>
    
    <button type="submit">
        Update
    </button>

</form>

</body>
</html>