@extends('layouts.admin')

@section('content')


<div class="container">
    <h5 class=" d-flex justify-content-center">All Skills</h5>
    <div class="row skill-index shop">
        @forelse ($skills as $skill)
        <div class="col-md-4 mb-4">
            <div class="card h-100 index-skill-card">
                <img src="{{ asset($skill->image) }}" class="card-img-top index-image" alt="{{ $skill->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $skill->name }}</h5>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('skills.edit', ['skill' => $skill->id]) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('skills.destroy', ['skill' => $skill->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <p class="text-center">No Skill Available</p>
        </div>
        @endforelse
    </div>
</div>

@endsection
