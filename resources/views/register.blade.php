<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('register/create')}}" method="POST" >
    @csrf
        NAME:<input type="text"name="name">
        <br>
        EMAIL:<input type="email" name="email">
        <br>
        PASSWORD:<input type="password" name="password">
        <br>

        CONFIRM PASSWORD:<input type="password" name="Confirm Password">
        <br>

        REGISTER AS 
        <select name="type">
            <option value="user">User</option>
            <option value="owner">Owner</option>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>