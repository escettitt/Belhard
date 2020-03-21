@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card__image">
            <img src="/storage/1573570238831.png" alt="">
        </div>
        <div class="card__category">
            Рубрики
        </div>
        <div class="card__header">МИД России выразил протест в связи с заключением кота Квилти в одиночную камеру</div>
        <div class="card__description">Официальный представитель МИД России Мария Захарова решительно осудила решение руководства техасского приюта для животных поместить кота Квилти в одиночную камеру.</div>
        <div class="card__date">17 марта</div>
    </div>
    @foreach ($posts as $post)
    <div class="card" onclick="location.href='/posts/{{$post->id}}';">
    <div class="card__image">
    <img src="/storage/{{$post->cover}}" alt="">
        </div>
        <!-- <div class="card__category">
            Рубрики
        </div> -->
        <div class="card__header">{{$post->header}}</div>
        <div class="card__description">{{$post->description}}</div>
        <div class="card__date">17 марта</div>
</div>
    @endforeach
@stop