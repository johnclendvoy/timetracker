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

            .content {
                text-align: center;
                background-color:orange;
                padding-right:2em;
                padding-left:2em;
                border-radius: 50%;
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

            nav a {
                color:slategrey
            }

        </style>
    </head>
    <body>
        <nav>
            <a href="/data">Data</a>
            {{-- <a href="/clients">Add Client</a> --}}
        </nav>
        <div class="flex-center full-height">

            <div class="content m-b-md">
                <h1>Egg Tracker</h1>
                <form action="/task" method="post">
                    @csrf
                    <div class="m-b-md">
                        <label for="">What did you do?</label>
                        <input required type="text" name="title" value="{{old('title')}}">
                    </div>

                    <div class="m-b-md">
                        <label>How many minutes did it take?</label>
                        <input required type="number" step="1" min="0" name="minutes" value="{{old('minutes')}}">
                    </div>

                    <div class="m-b-md">
                        <label>Who was it for?</label>
                        <select required name="client_id">
                            @foreach($clients as $client)
                                <option selected="{{ old('client_id') === $client->id ? 'selected' : ''}}" value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-b-md">
                        <label>When did you finish it?</label>
                        <input required type="date" name="date" value="{{ old('date', now()->toDateString()) }}">
                    </div>

                    <div class="m-b-md">
                        <button class="button" type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div>
                @if(session()->has('id'))
                    <div class="green">Added Task #{{ session('id') }}.</div>
                @endif

                @if($errors->any())
                    <ul class="red">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </body>
</html>
