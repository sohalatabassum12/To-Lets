<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{route('profile.update', $UserProfile->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        

        Address:<input type="text" name="address"value="{{$UserProfile->address}}"><br>
        
        
        Image:<input type="file" name="image"value="{{$UserProfile->image}} "><br>
        
    
        NID Number:<input type=" number" name="nid" value="{{$UserProfile->nid}}"><br>
    
        Birth-Date: <input type="number" name="birthdate"value="{{$UserProfile->birthdate}}"><br>
        
        Floor: <input type="number"name="number"value="{{$UserProfile->number}}"><br>
        <button type="submit">submit</button>
    </form>


</body>
</html>
