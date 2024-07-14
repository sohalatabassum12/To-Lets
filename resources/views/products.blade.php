<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       @foreach ($products as $product)
           Name: {{$product->name}}
             <br>
           Address:{{$product->address}}
             <br>
           image: <img height="100px" width="100px" src="{{asset('images/' . $product->image )}}" alt="">
             <br>
           Floor:{{$product->floor}}
             <br>
           Rooms:{{$product->rooms}}
             <br>
           Description:{{$product->description}}
             <br>
           Price: {{$product->price}}
           @if ($product->status == $product::available)
           <a href="{{route('house.book', $product->id)}}">Book Now</a>
           @elseif ($product->status == $product::pending)  
           <a href="{{route('house.book', $product->id)}}">Pending</a>
           <a href="{{route('message', $product->id)}}">Send Message</a>
           @else
           <a href="{{route('house.book', $product->id)}}">Booked</a>
           @endif
            @can('view', $product)
            <a href="{{ route('product.edit', $product->id) }}">Edit</a>
           <a href="{{ route('product.delete', $product->id) }}">Delete</a>
             @endcan  
             <br>
             @endforeach
</body>
</html>