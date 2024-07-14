<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       @foreach ($UserProfile as $UserProfile)
          
           Address:{{$UserProfile->address}}
             <br>
           image: <img height="100px" width="100px" src="{{asset('images/' . $UserProfile->image )}}" alt="">
             <br>
           NID Number:{{$UserProfile->nid}}
             <br>
             birthdate:{{$UserProfile->birthdate}}
             <br>
             number:{{$UserProfile->number}}
             <br>
             <a href="{{ route('profile.edit', $UserProfile->id) }}">Edit</a>
             <a href="{{ route('profile.delete', $UserProfile->id) }}">Delete</a>
             @endforeach
</body>
</html>