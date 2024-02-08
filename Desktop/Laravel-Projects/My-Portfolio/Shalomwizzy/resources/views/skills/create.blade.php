@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center skill-form">
        <div class="col-md-6">
            <h1 class="text-center skill-create-header">Create New Skill</h1>
            <form method="post" action="{{ route('skills.store') }}" enctype="multipart/form-data" class="skill-form">
                @csrf
                <!-- Skill Category -->
                <div class="skills-group">
                    <label for="category">Skill Category:</label>
                    <select name="category" id="category" class="form-select">
                        @forelse ($categories as $cat )
                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                            
                        @empty
                         <option disabled>No Categories Avaliable</option>
                        @endforelse

                    </select>
                    
                </div>

                <!-- Skill Name -->
                <div class="skills-group">
                    <label for="skills_name">Skill Name:</label>
                    <input type="text" class="form-control" id="skill_name" name="name" value="{{ isset($skill) ? $skill->name : '' }}" required>
                </div>


                <!-- Image Upload -->
                <div class="skills-group">
                    <label for="skill_image">Skill Image:</label>
                    <input type="file" class="form-control-file" id="skill_image" name="image" {{ isset($skill) ? '' : 'required' }}>
                </div>


                <!-- Button to Create or Update Skill -->
                <div class="text-center">
                    <button type="submit" class="btn btn-dark skill-createbtn">{{ isset($skill) ? 'Update Skill' : 'Create Skill' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection