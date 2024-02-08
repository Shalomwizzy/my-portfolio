@extends('layouts.admin')

@section('content')

<div class="container">
    <p class="h5">All Projects</p>
    <div class="row project-index shop">
        @forelse ($projects as $project)
        <div class="col-md-4 mb-5">
            <div class="card h-100 project-card project-body animate__animated animate__rollIn">
                <img src="{{ asset($project->image) }}" class="card-img-top project-image" alt="{{ $project->name }}">
                <div class="card-body project-details ">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text text-muted project-descibe">{{ $project->description }}</p>
                    <div class="mt-3">
                        @if ($project->ui_ux)
                            <h6 class="mb-1"><strong>UI/UX:</strong> {{ $project->ui_ux }}</h6>
                        @endif
                        @if ($project->front_end)
                            <h6 class="mb-1"><strong>Front-end:</strong> {{ $project->front_end }}</h6>
                        @endif
                        @if ($project->back_end)
                            <h6 class="mb-1"><strong>Back-end:</strong> {{ $project->back_end }}</h6>
                        @endif
                        @if ($project->stack_used)
                            <div class="stacks-used">
                                <strong class="">Stacks Used:</strong>
                                @foreach(explode(',', $project->stack_used) as $stack)
                                    <time class="">{{ trim($stack) }}</time>
                                @endforeach
                            </div>
                        @endif
                        <br>
                        <div class="d-flex justify-content-between live-git">
                            @if ($project->github_link)
                                <p class="mb-1 btn github-btn "><a href="{{ $project->github_link }}" target="_blank">  <i class="fa-brands fa-github"></i> GitHub Link</a></p>
                            @endif
                            @if ($project->live_link)
                                <p class="mb-1 btn livelink-btn"><a href="{{ $project->live_link }}" target="_blank"> <i class="fa-solid fa-link"></i> Live Link</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-success">Edit</a>
                <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @empty
        <div class="col">
            <p class="text-center">No Project Available</p>
        </div>
        @endforelse
    </div>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {!! $projects->links('pagination::bootstrap-5') !!}
    </div>
</div>

@endsection





