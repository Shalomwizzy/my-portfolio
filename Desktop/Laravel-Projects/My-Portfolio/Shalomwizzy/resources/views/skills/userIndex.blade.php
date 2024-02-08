
@extends('layouts.app')

@section('content')

<div class="container">

    <!-- SKILLS SECTION -->
    @include('partials.skills-section', ['skills' => $skills])

</div>

@endsection



