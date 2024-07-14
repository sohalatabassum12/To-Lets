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
        Name:<input type="text" name="name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        Address:<input type="text" name="address"><br>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        Image:<input type="file" name="image"><br>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        Video: <input type="file" name="video"><br>
        Price per Month:<input type="number" name="price" ><br>
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        Rooms: <input type="number" name="rooms"><br>
        @error('rooms')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        Floor: <input type="number"name="floor"><br>
        @error('floor')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        Description: <input type="text" name ="description"><br>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Upload Product</button>
        
    </form>

</body>
</html>