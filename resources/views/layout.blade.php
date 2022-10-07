<!DOCTYPE html>
<html>
<head>
    <title>Security Assignment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }

        .red {
            background-color: red;
        }

        #validation{
            display: none
        }
        #validationconf{
            display: none
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Security assignment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    // var PassBox = document.getElementById('pass');

    function containCapital(str) {
        return /[A-Z]/.test(str);

    }

    function containsSpecialChars(str) {
        const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        return specialChars.test(str);
    }

    function containsAnyLetters(str) {
        return /[a-zA-Z]/.test(str);
    }

    function containsNumber(str) {
        return /\d/.test(str);
    }



    function checkPass(){
        var validation = document.getElementById('validation');

        if(validation.style.display == '' || validation.style.display == 'none'){
            validation.style.display = 'block';
        }

        var PassBox = document.getElementById("password");
        var PassConfBox = document.getElementById("password-conf");

        var PassValue = PassBox.value;
        var PassConfValue = PassConfBox.value;



        if(containCapital(PassValue)){
            document.getElementById("text-capital").classList.remove('text-danger');
            document.getElementById("text-capital").classList.add('text-success');
            document.getElementById("text-capicon").classList.remove('fa-times');
            document.getElementById("text-capicon").classList.add('fa-check');
        }

        else{
            document.getElementById("text-capital").classList.add('text-danger');
            document.getElementById("text-capital").classList.remove('text-success');
            document.getElementById("text-capicon").classList.add('fa-times');
            document.getElementById("text-capicon").classList.remove('fa-check');

        }

        if(containsAnyLetters(PassValue)){
            document.getElementById("text-letter").classList.remove('text-danger');
            document.getElementById("text-letter").classList.add('text-success');
            document.getElementById("text-leticon").classList.remove('fa-times');
            document.getElementById("text-leticon").classList.add('fa-check');
        } else{

            document.getElementById("text-letter").classList.add('text-danger');
            document.getElementById("text-letter").classList.remove('text-success');
            document.getElementById("text-leticon").classList.add('fa-times');
            document.getElementById("text-leticon").classList.remove('fa-check');

        }

        if(containsNumber(PassValue)){
            document.getElementById("text-number").classList.remove('text-danger');
            document.getElementById("text-number").classList.add('text-success');
            document.getElementById("text-numicon").classList.remove('fa-times');
            document.getElementById("text-numicon").classList.add('fa-check');
        } else{
            document.getElementById("text-number").classList.add('text-danger');
            document.getElementById("text-number").classList.remove('text-success');
            document.getElementById("text-numicon").classList.add('fa-times');
            document.getElementById("text-numicon").classList.remove('fa-check');
        }

        if(PassValue.length >= 8){
            document.getElementById("text-min").classList.remove('text-danger');
            document.getElementById("text-min").classList.add('text-success');
            document.getElementById("text-minicon").classList.remove('fa-times');
            document.getElementById("text-minicon").classList.add('fa-check');
        } else{
            document.getElementById("text-min").classList.add('text-danger');
            document.getElementById("text-min").classList.remove('text-success');
            document.getElementById("text-minicon").classList.add('fa-times');
            document.getElementById("text-minicon").classList.remove('fa-check');
        }
    }

    function checkPassConf(){

        var validation = document.getElementById('validationconf');

        var text = document.getElementById('text-conf');

        var PassBox = document.getElementById("password");
        var PassConfBox = document.getElementById("password-conf");



        var PassValue = PassBox.value;
        var PassConfValue = PassConfBox.value;

        if(validation.style.display == '' || validation.style.display == 'none'){
            validation.style.display = 'block';
        }

        if(PassValue == PassConfValue){
            text.innerHTML = `<span class="fas fa-times pr-2 pt-1" id="text-conficon"></span> Password matched`;
            document.getElementById("text-conf").classList.remove('text-danger');
            document.getElementById("text-conf").classList.add('text-success');
            document.getElementById("text-conficon").classList.remove('fa-times');
            document.getElementById("text-conficon").classList.add('fa-check');
        }else{
            document.getElementById("text-conf").classList.add('text-danger');
            document.getElementById("text-conf").classList.remove('text-success');
            document.getElementById("text-conficon").classList.add('fa-times');
            document.getElementById("text-conficon").classList.remove('fa-check');
        }

    }





    </script>
</body>
</html>
