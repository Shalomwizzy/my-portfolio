@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center learning-body">
        <div class="col-lg-6 col-md-8">
            <div class="learning-edit">
                <h1 class="text-center fs-3">Edit Learning</h1>
                <form action="{{ route('learnings.update', ['learning' => $learning->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Learning Name -->
                    <div class="edit-group">
                        <label for="learning_name">Learning Name:</label>
                        <input type="text" class="form-control" id="learning_name" name="name" value="{{ $learning->name }}" required>
                    </div>

                    <!-- Learning Description -->
                    <div class="edit-group">
                        <label for="learning_description">Learning Description:</label>
                        <textarea class="form-control" id="learning_description" name="description" rows="4">{{ $learning->description }}</textarea>
                    </div>

                    <!-- Current Learning -->
                    <div class="edit-group">
                        <label for="current_learning">Current Learning:</label>
                        <input type="text" class="form-control" id="current_learning" name="current_learning" value="{{ $learning->current_learning }}">
                    </div>

                    <!-- Start Date -->
                    <div class="edit-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $learning->start_date }}">
                    </div>

                    <!-- End Date -->
                    <div class="edit-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $learning->end_date }}">
                    </div>

                    <!-- Status -->
                    <div class="edit-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $learning->status }}">
                    </div>

                    <!-- Tags -->
                    <div class="edit-group">
                        <label for="tags">Tags:</label>
                        <input type="text" class="form-control" id="tags" name="tags" value="{{ $learning->tags }}">
                    </div>

                    <!-- Skills Gained -->
                    <div class="edit-group">
                        <label for="skills_gained">Skills Gained:</label>
                        <input type="text" class="form-control" id="skills_gained" name="skills_gained" value="{{ $learning->skills_gained }}">
                    </div>

                    <!-- Resources -->
                    <div class="edit-group">
                        <label for="resources">Resources:</label>
                        <input type="text" class="form-control" id="resources" name="resources" value="{{ $learning->resources }}">
                    </div>

                    <!-- External Links -->
                    <div class="edit-group">
                        <label for="external_links">External Links:</label>
                        <input type="text" class="form-control" id="external_links" name="external_links" value="{{ $learning->external_links }}">
                    </div>

                      <!-- Rating -->
                    <div class="edit-group">
                        <label for="rating">Rating:</label>
                        <!-- Include your star rating input here using plain HTML -->
                        <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="rating__star @if($i <= $learning->rating) fas fa-star @else far fa-star @endif"></i>
                            @endfor
                        </div>
                        <!-- Hidden input to store the selected rating -->
                        <input type="hidden" name="rating" id="ratingInput" value="{{ $learning->rating }}">
                    </div>

                    <!-- Image Upload -->
                    <div class="edit-group">
                        <label for="learning_image">Learning Image:</label>
                        <input type="file" class="form-control-file" id="learning_image" name="image">
                        @if ($learning->image)
                            <div class="mt-2">
                                <img src="{{ asset($learning->image) }}" alt="Learning Image" class="existing-learning-image" style="max-width: 200px; max-height: 200px;">
                            </div>
                        @endif
                    </div>

                    <!-- Save Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success save-button">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    const ratingStars = [...document.getElementsByClassName("rating__star")];
    const ratingInput = document.getElementById("ratingInput");

    function executeRating(stars) {
        const starClassActive = "rating__star fas fa-star";
        const starClassInactive = "rating__star far fa-star";
        const starsLength = stars.length;

        stars.map((star, index) => {
            star.onclick = () => {
                const clickedIndex = stars.indexOf(star);

                for (let i = 0; i < starsLength; ++i) {
                    if (i <= clickedIndex) {
                        stars[i].className = starClassActive;
                    } else {
                        stars[i].className = starClassInactive;
                    }
                }

                // Set the value of the hidden input to the selected rating
                ratingInput.value = clickedIndex + 1;
            };
        });
    }

    executeRating(ratingStars);
</script>

@endsection

