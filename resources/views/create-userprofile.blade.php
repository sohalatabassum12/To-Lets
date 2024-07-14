<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

            <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        

        Address:<input type="text" name="address"><br>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        Image:<input type="file" name="image"><br>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        NID Number:<input type="number" name="nid" ><br>
        @error('nid')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        Rooms: <input type="number" name="birthdate"><br>
        @error('birthdate')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        Contact Number: <input type="number" name ="number"><br>
        @error('number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Upload your Info</button>
</body>

</html>