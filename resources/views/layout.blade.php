<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Timetracker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet"> 

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-family: 'Alata', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .green {
                color:mediumseagreen;
            }

            .red {
                color:firebrick;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .yellow-circle {
                text-align: center;
                background-color:orange;
                padding:2em 3em;
                border-radius: 50%;
            }

            .blue-rect {
                text-align: center;
                background-color:cadetblue;
                padding:0.5em 2em;
                border-radius: 10px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            select {
                appearance: none;
                -webkit-appearance: none;
            }
            input, select {
                border:none;
                border-radius: 3px;
                padding-top:0.5em;
                padding-bottom:0.5em;
            }

            .button {
                border:none;
                border-radius: 3px;
                color:orange;
                padding:0.5em 1em;
                font-size: 1em;
                font-weight: 700;
            }
            .button:hover {
                color:coral;
            }
            nav {
                padding: 1em 1em;
            }

            nav a {
                margin-right: 1em;
                display:inline-block;
                padding: 1em 1em;
                text-decoration: none;
                color: white;
            }

            a.yellow {
                background:orange;
                border-radius: 50%;
            }
            a.yellow:hover {
                opacity: 80%;
            }

            a.blue {
                background:cadetblue;
                border-radius: 5px;
            }
            a.blue:hover {
                opacity: 80%;
            }

            .text-left {
                text-align: left;
            }
            .text-right {
                text-align: right;
            }

            tr td {
                padding: 0.5em;
            }


        </style>
    </head>
    <body>
        <nav>
            <a class="yellow" href="/">Tracker</a>
            <a class="blue" href="/data">Data</a>
            {{-- <a href="/clients">Add Client</a> --}}
        </nav>

        @yield('content')

    </body>
</html>
