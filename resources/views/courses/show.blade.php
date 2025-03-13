@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="container">
        <h1>{{ $course->title }}</h1>
        <p><strong>Enseignant :</strong> {{ $course->teacher->name }}</p>
        <p>{!! $course->description !!}</p>

        <h3>Commentaires</h3>
        @foreach ($course->comments as $comment)
            <p><strong>{{ $comment->user->name }} :</strong> {{ $comment->content }}</p>
        @endforeach
    </div>
@endsection
