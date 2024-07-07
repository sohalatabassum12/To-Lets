<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @foreach ($products as $product)
        name: {{$product->name}}
        <br>
        price: {{$product->price}}
        @can('view', $product)
            <button>Edit</button>
            <button>Delete</button>
        @endcan
        
        <br>
    @endforeach

</body>
</html>