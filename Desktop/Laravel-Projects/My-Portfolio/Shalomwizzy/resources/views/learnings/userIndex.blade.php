
@extends('layouts.app')

@section('content')

<div class="container">

    <!-- LEARNING SECTION -->
    @include('partials.learnings-section', ['learnings' => $learnings])
   


</div>

@endsection