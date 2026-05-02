<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <style>
        body {
            background: #0a0a0a;
            color: white;
            font-family: Arial;
            padding: 40px;
        }

        .box {
            max-width: 500px;
            margin: auto;
            background: #111;
            padding: 25px;
            border: 1px solid gold;
            border-radius: 10px;
        }

        input, textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            background: black;
            border: 1px solid gold;
            color: white;
        }

        button {
            background: gold;
            border: none;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
        }

        img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="box">

    <h2>Edit Product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $product->name }}" placeholder="Name">

        <textarea name="description" placeholder="Description">{{ $product->description }}</textarea>

        <input type="number" name="price" value="{{ $product->price }}" placeholder="Price">

        <!-- OLD IMAGE -->
        <img src="{{ asset('storage/products/'.$product->image) }}">

        <input type="file" name="image">

        <button>Update Product</button>
    </form>

</div>

</body>
</html>