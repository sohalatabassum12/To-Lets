<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        Name:<input type="text" name="name"><br>
        Address:<input type="text" name="address"><br>
        Image:<input type="file" name="image"><br>
        Video: <input type="file" name="video"><br>
        Price per Month:<input type="number" name="price" ><br>
        Rooms: <input type="number" name="rooms"><br>
        Floor: <input type="number"name="floor"><br>
        Description: <input type="text" name ="description"><br>
        <button type="submit">Upload Product</button>
        
    </form>

</body>
</html>