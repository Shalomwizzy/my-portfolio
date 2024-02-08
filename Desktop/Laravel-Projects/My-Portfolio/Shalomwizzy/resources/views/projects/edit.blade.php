@extends('layouts.admin')

@section('content')
<div class="container project-container project-body">
    <div class="row justify-content-center project-form">
        <div class="col-md-6">
            <h1 class="text-center project-create-header">Create New Project</h1>
            <form method="post" action="{{ route('projects.store') }}" enctype="multipart/form-data" class="project-form">
                @csrf
                <!-- Project Category -->
                <div class="project-create">
                    <label for="category">Project Category:</label>
                    <select name="category" id="category" class="form-select">
                        @forelse ($categories as $cat )
                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                        @empty
                        <option disabled>No Categories Available</option>
                        @endforelse
                    </select>
                </div>

                <!-- Project Name -->
                <div class="project-create">
                    <label for="project_name">Project Name:</label>
                    <input type="text" class="form-control" id="project_name" name="name" value="{{ isset($project) ? $project->name : '' }}" required>
                </div>

                <!-- Product Description -->
                <div class="project-create">
                    <label for="project_description">Description:</label>
                    <textarea class="form-control" id="project_description" name="description" rows="4">{{ isset($project) ? $project->description : '' }}</textarea>
                </div>

                <!-- UI/UX -->
                <div class="project-create">
                    <label for="ui_ux">UI/UX:</label>
                    <input type="text" class="form-control" id="ui_ux" name="ui_ux" value="{{ isset($project) ? $project->ui_ux : '' }}">
                </div>

                <!-- Front-end -->
                <div class="project-create">
                    <label for="front_end">Front-end:</label>
                    <input type="text" class="form-control" id="front_end" name="front_end" value="{{ isset($project) ? $project->front_end : '' }}">
                </div>

                <!-- Back-end -->
                <div class="project-create">
                    <label for="back_end">Back-end:</label>
                    <input type="text" class="form-control" id="back_end" name="back_end" value="{{ isset($project) ? $project->back_end : '' }}">
                </div>

                <!-- Stack Used -->
                <div class="project-create">
                    <label for="stack_used">Stack Used:</label>
                    <input type="text" class="form-control" id="stack_used" name="stack_used" value="{{ isset($project) ? $project->stack_used : '' }}">
                </div>

                <!-- GitHub Link -->
                <div class="project-create">
                    <label for="github_link">GitHub Link:</label>
                    <input type="text" class="form-control" id="github_link" name="github_link" value="{{ isset($project) ? $project->github_link : '' }}">
                </div>

                <!-- Live Link -->
                <div class="project-create mb-5">
                    <label for="live_link">Live Link:</label>
                    <input type="text" class="form-control" id="live_link" name="live_link" value="{{ isset($project) ? $project->live_link : '' }}">
                </div>
                <br>


                <!-- Image Upload -->
                <div class="project-create mt-5">
                    <label for="project_image">Project Image:</label>
                    <input type="file" class="form-control-file" id="project_image" name="image">

                    @if ($project->image)
                    <div class="mt-2">
                        <img src="{{ asset($project->image) }}" alt="Learning Image" class="existing-learning-image" style="max-width: 200px; max-height: 200px;">
                    </div>
                @endif
                </div>





                <!-- Button to Create or Update Project -->
                <div class="text-center">
                    <button type="submit" class="btn btn-danger project-createbtn">{{ isset($project) ? 'Update Project' : 'Create Project' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection







