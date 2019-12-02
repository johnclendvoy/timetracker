<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet"> 

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 3em;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <form action="/task" method="post">
                    @csrf
                    <div class="m-b-md">
                        <label for="">What did you do?</label>
                        <input required type="text" name="title">
                    </div>

                    <div class="m-b-md">
                        <label>How many hours did it take?</label>
                        <input required type="number" step="0.01" min="0" name="hours">
                    </div>

                    <div class="m-b-md">
                        <label>Who was it for?</label>
                        <select required name="client_id">
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-b-md">
                        <label>When did you finish it?</label>
                        <input required type="date" name="date" value="{{ now()->toDateString()}}">
                    </div>

                    <div class="m-b-md">
                        <button type="submit">Submit</button>
                    </div>

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
                </form>

            </div>
        </div>
    </body>
</html>
