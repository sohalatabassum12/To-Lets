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
        <h1>{{$message->message}}</h1>
        <hr>
    @endforeach

    <form action="{{route('message.send')}}" method="post">
        @csrf
        <input type="hidden" value="{{$userId}}" name="receiverId">
        <textarea name="message" id=""></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>