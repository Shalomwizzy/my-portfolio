
@extends('layouts.app')

@section('content')

<div class="container">

    <!-- PROJECT SECTION -->
    @include('partials.project-section', ['projects' => $projects])

</div>

@endsection