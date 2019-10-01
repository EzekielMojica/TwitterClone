@extends('layouts.app')

@section('sidebar')
@parent
<form method="POST" action="/home">
   @csrf
   <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="border-bottom py-2 px-3 d-none d-md-block">
        <textarea name="post" id="post" rows="1" placeholder="What's Happening?"></textarea>
        <div class="text-right">
            <input type="submit" class="btn btn-primary rounded-pill" value="Tweet">
        </div>
    </div>
</form>

@foreach($tweets as $tweet)
<a class="d-block text-reset text-decoration-none" href="#">
    <div class="border-bottom tweet">
        <div class="row mx-0 pt-3 px-3">
            <p class="m-0 font-weight-bold pr-1">{{$tweet['user']['name']}}</p>
            <p class="m-0 text-muted">{{$tweet['user']['email']}}</p>
            <span class="px-1 text-muted">·</span>
            <p class="m-0 text-muted">{{time_elapsed($tweet['updated_at'])}}</p>
        </div>
        <div class="px-3">
            <p>{{$tweet['tweet']}}</p>
        </div>
    </div>
</a>
@endforeach

@endsection

@section('search')
@parent

@endsection

@php
    function time_elapsed($timestamp){
        $time = time() - strtotime($timestamp);
        if($time <= 0){
            return 'Just now';
        }
        $time_unit = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second');
        $time_unit_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds');
        foreach ($time_unit as $seconds => $string){
            $d = $time / $seconds;
            if ($d >=1){
                $result = round($d);
                return $result . ' ' . ($result > 1 ? $time_unit_plural[$string] : $string) . ' ago';
            }
        }
    }
@endphp