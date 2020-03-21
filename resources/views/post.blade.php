@extends('layouts.default')
@section('content')
    <div class="main">
        <div class="post__wrapper">
            <div class="post__header">{{$post->header}}</div>
            <div class="post__description">{{$post->description}}</div>
            <div class="post__image"><img src="{{ asset('storage/'.$post->cover) }}" alt=""></div>
            <div class="post__body">{!! $post->body !!}</div>
        </div>
        @guest
        @if (Route::has('register'))
        @endif
        @else
        <div class="post__change">
        <a href="/edit/{{$post->id}}" class="button">Изменить</a>
        </div>

        @endguest


</div>
@stop