<link href="{{ asset('/css/task.css') }}" rel="stylesheet">

@extends('layout')
<div class="container">
    <div class="main-content">
        <h1 class=".title"> Weekly Schedule for Student </h1>
        <a href="#holiday-list"> Holiday List </a>

        @if(count($tasks) > 0)
            @foreach ($tasks as $date=>$entries)
                @php  
                    $total = array_sum(array_column($entries, 'minutes'))  
                @endphp
        
                <p class='title-date'> {{ $date }} ( Study Time: {{ floor($total/60) }}h {{ $total%60 }}m) </p>
            
                <ul>
                    @foreach($entries as $entry)
                        <li>
                            {{ $entry['task'] }}  ({{ $entry['minutes'] }}m) 
                        </li>
                    @endforeach
                </ul>
            @endforeach
        @else
            <h2> No tasks available to list </h2>
        @endif

        <div class="sidebar">
                <h2 id="holiday-list">Holiday List</h2>
                @if(count($holidays) > 0)
                    <ul>
                        @foreach($holidays as $holiday)
                            <li>{{ $holiday }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No holidays</p>
                @endif
        </div>
    </div>
</div>
