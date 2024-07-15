<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    message

    @foreach ($messages as $message)
            <h1>{{$message->sender->name}}: {{$message->sender_message}}</h1>
            @if (!empty($message->receiver_message))
            <h1>{{auth()->user()->name}}: {{$message->receiver_message}}</h1>
            @endif
        <hr>
    @endforeach

  

    <form action="{{route('message.send')}}" method="post">
        @csrf
        <input type="hidden" value="{{$userId}}" name="receiverId">
        <input type="hidden" value="{{$productId}}" name="productId">
        <textarea name="message" id=""></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>