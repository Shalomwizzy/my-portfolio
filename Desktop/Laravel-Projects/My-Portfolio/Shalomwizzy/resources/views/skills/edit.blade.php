@extends('layouts.admin')

@section('content')
<div class="container skills-edit-body">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="skill-edit">
                <h1 class="text-center fs-3">Edit Skill</h1>
                <form action="{{ route('skills.update', ['skill' => $skill->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
 
                          <!-- Skill Name -->
                <div class="skills-edit mb-5">
                    <label for="skills_name">Live Link:</label>
                    <input type="text" class="form-control" id="skills_name" name="name" value="{{ isset($skill) ? $skill->name : '' }}">
                </div>
                <br>


                <!-- Image Upload -->
                <div class="skills-edit mt-5">
                    <label for="skill_image">Skill Image:</label>
                    <input type="file" class="form-control-file" id="skill_image" name="image">

                    @if ($skill->image)
                    <div class="mt-2">
                        <img src="{{ asset($skill->image) }}" alt="Learning Image" class="existing-learning-image" style="max-width: 200px; max-height: 200px;">
                    </div>
                @endif
                </div>
                
             


                    <!-- Save and Cancel Buttons -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success save-button">Save Changes</button>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection