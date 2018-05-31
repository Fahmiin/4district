<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{asset('/css/materialize.min.css')}}"  media="screen,projection"/>
        <link rel="shortcut icon" href="{{ asset('4district.ico') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <title>4District</title>
    </head>
    <body>
        <div class="center-align teal darken-4 container40 landing white-text">
            <h1><span class="red-text accent-2">4District</span>Connect</h1>
            <h4 class="content"><strong><em>This is a safe place to express your thoughts, deepest worries and buried feelings</em></strong></h4>
            <a href="/home" class="btn red accent-2 waves-effect waves-light"><i class="material-icons right">forward</i>Enter</a>
            <p class="footnote">*4district is a non-profitable organization, built and dedicated to raising awareness towards mental health.</p>
            <a href="https://www.facebook.com/fourdistrict/">4District on Facebook</a> |  
            <a href="https://www.instagram.com/4district/?hl=en">4District on Instagram</a>
        </div>
    </body>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</html>