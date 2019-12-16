@extends('layout')

@section('content')
        <div class="flex-center full-height">

            <div class="yellow-circle m-b-md">
                <h1>Time Tracker</h1>
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
@endsection