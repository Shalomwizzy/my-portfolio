@extends('layouts.app')

@section('content')

<div class="my-skills container">
    <p class="h5">All Skills</p>
    <div class="row skill-index user">
        @forelse ($skills as $skill)
        <div class="col-md-4 mb-4">
            <div class="circle">
                {{-- Displaying image in a circular format --}}
                <div class="flex-colum mt-3 skill-img-con">
                    <img src="{{ asset($skill->image) }}" class="skill-images" alt="{{ $skill->name }}">
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $skill->name }}</h5>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <p class="text-center">No Skill Available</p>
        </div>
        @endforelse
    </div>
    {{-- <div class="pagination-container d-flex justify-content-center mt-4">
        {!! $products->links('pagination::bootstrap-5') !!}
    </div> --}}
</div>

@endsection
