@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Cours</h1>

        <p>{{ count($courses) }} cours trouvés</p> {{-- Debug pour voir si des cours sont chargés --}}

        @if($courses->isEmpty())
            <p>Aucun cours disponible pour l’instant.</p>
        @else
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($course->description), 100) }}</p>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
