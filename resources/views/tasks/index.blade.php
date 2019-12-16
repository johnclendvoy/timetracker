@extends('layout')

@section('content')
    <div class="flex-center full-height">
        @foreach($clients as $client)
            <div class="blue-rect m-b-md text-left">
                <h2>{{$client->name}}</h2>
                <h4>{{$client->tasks->count()}} Tasks &middot;
                    {{$client->hours}} Hours
                </h4>
                <table>
                @foreach($client->tasks->sortBy('date') as $task)
                    <tr class="task-list-item">
                        <td>{{$task->date->format('D M j')}}</td>
                        <td>{{$task->title}}</td>
                        <td class="text-right">{{$task->hoursMinutes}}</td>
                    </tr>
                @endforeach
                </table>
            </div>
        @endforeach
    </div>

@endsection