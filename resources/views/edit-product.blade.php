<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        Name:<input type="text" name="name" value="{{$product->name}}">
        

        Address:<input type="text" name="address"value="{{$product->address}}"><br>
        
        
        Image:<input type="file" name="image"value="{{$product->image}} "><br>
        
    
        Price per Month:<input type=" number" name="price" value="{{$product->price}}"><br>
    
        Rooms: <input type="number" name="rooms"value="{{$product->rooms}}"><br>
        
        Floor: <input type="number"name="floor"value="{{$product->floor}}"><br>
        
        Description: <input type="text" name ="description"value="{{$product->description}}"><br>
        
        Price:<input type="number" name="price" value="{{$product->price}}">
        <button type="submit">submit</button>
    </form>


</body>
</html>
