

    <!-- <form action="" method="GET">
        @csrf
<input type="email" name="email" id="" value="__('Email')"required autocomplete="current-email">
          
<input type="password" name="password" id="" value="__('password')"required autocomplete="current-password">

            <button type="submit">Login</button>
    </form> -->

    <form action="{{route('login')}}" method="POST">
        @csrf
        Email:<input type="email" name="email" ><br>
                
        Password:<input type="password" name="password"><br>

            <button type="submit">Login</button>
    </form>
