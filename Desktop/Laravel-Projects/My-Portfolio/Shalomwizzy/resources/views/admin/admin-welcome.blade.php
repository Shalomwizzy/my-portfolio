@extends('layouts.admin')

@section('content')
    @include('partials.welcome-section', ['projects' => $projects, 'skills' => $skills, 'learnings' => $learnings])
@endsection

