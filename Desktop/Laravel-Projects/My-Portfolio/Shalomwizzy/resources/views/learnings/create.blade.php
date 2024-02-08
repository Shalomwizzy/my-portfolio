@extends('layouts.admin')

@section('content')
<div class="container create-container learning-body">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header create--header">{{ __('Create Learning') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('learnings.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Learning Category -->
                        <div class="create-group">
                            <label for="category">Learning Category:</label>
                            <select name="category_id" id="category" class="form-select">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option disabled>No Categories Available</option>
                                @endforelse
                            </select>
                        </div>

                        <!-- Learning Name -->
                        <div class="create-group">
                            <label for="learning_name">Learning Name:</label>
                            <input type="text" class="form-control" id="learning_name" name="name" required>
                        </div>

                        <!-- Learning Description -->
                        <div class="create-group">
                            <label for="learning_description">Description:</label>
                            <textarea class="form-control" id="learning_description" name="description" rows="4"></textarea>
                        </div>

                        <!-- Current Learning -->
                        <div class="create-group">
                            <label for="current_learning">Current Learning:</label>
                            <input type="text" class="form-control" id="current_learning" name="current_learning">
                        </div>

                        <!-- Start Date -->
                        <div class="create-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>

                        <!-- End Date -->
                        <div class="create-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>

                        <!-- Status -->
                        <div class="create-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status">
                        </div>

                        <!-- Tags -->
                        <div class="create-group">
                            <label for="tags">Tags:</label>
                            <input type="text" class="form-control" id="tags" name="tags">
                        </div>

                        <!-- Skills Gained -->
                        <div class="create-group">
                            <label for="skills_gained">Skills Gained:</label>
                            <input type="text" class="form-control" id="skills_gained" name="skills_gained">
                        </div>

                        <!-- Resources -->
                        <div class="create-group">
                            <label for="resources">Resources:</label>
                            <input type="text" class="form-control" id="resources" name="resources">
                        </div>

                        <!-- External Links -->
                        <div class="create-group">
                            <label for="external_links">External Links:</label>
                            <div class="external-links-container">
                        
                                @if($learning->external_links)
                        
                                    @forelse($learning->external_links as $externalLink)
                                        <div class="external-link-entry">
                                            <input type="text" class="form-control" name="external_links_name[]" value="{{ $externalLink['name'] }}" placeholder="Link Name">
                                            <input type="text" class="form-control" name="external_links_url[]" value="{{ $externalLink['url'] }}" placeholder="Link URL">
                                        </div>
                                    @empty
                                        <div class="external-link-entry">
                                            <input type="text" class="form-control" name="external_links_name[]" placeholder="Link Name">
                                            <input type="text" class="form-control" name="external_links_url[]" placeholder="Link URL">
                                        </div>
                                    @endforelse
                        
                                @else
                        
                                    <div class="external-link-entry">
                                        <input type="text" class="form-control" name="external_links_name[]" placeholder="Link Name">
                                        <input type="text" class="form-control" name="external_links_url[]" placeholder="Link URL">
                                    </div>
                        
                                @endif
                        
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary add-external-link">Add External Link</button>
                        </div>
                        {{-- <div class="create-group">
                            <label for="external_links">External Links:</label>
                            <input type="text" class="form-control" id="external_links" name="external_links">
                        </div> --}}

                        <!-- Image Upload -->
                        <div class="create-group">
                            <label for="learning_image">Learning Image:</label>
                            <input type="file" class="form-control-file" id="learning_image" name="image" required>
                        </div>

                        <!-- Rating -->
                        <div class="create-group">
                            <label for="rating">Rating:</label>
                            <!-- Include your star rating input here using plain HTML -->
                            <div class="rating">
                                <i class="rating__star far fa-star"></i>
                                <i class="rating__star far fa-star"></i>
                                <i class="rating__star far fa-star"></i>
                                <i class="rating__star far fa-star"></i>
                                <i class="rating__star far fa-star"></i>
                            </div>
                            <!-- Hidden input to store the selected rating -->
                            <input type="hidden" name="rating" id="ratingInput" value="0">
                        </div>
                        

                        <!-- Button to Create Learning -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Learning</button>
                        </div>
                    </form>
                </div>
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



<script>
    $(document).ready(function () {
        // Counter for dynamic field names
        let externalLinkCounter = 1;

        // Handle click on "Add External Link" button
        $('.add-external-link').click(function () {
            // Clone the last external link entry
            let newEntry = $('.external-link-entry:last').clone();

            // Increment the counter and update field names
            externalLinkCounter++;
            newEntry.find('[name^="external_links_name"]').attr('name', 'external_links_name[' + externalLinkCounter + ']');
            newEntry.find('[name^="external_links_url"]').attr('name', 'external_links_url[' + externalLinkCounter + ']');

            // Clear input values in the cloned entry
            newEntry.find('input').val('');

            // Append the new entry to the container
            $('.external-links-container').append(newEntry);
        });
    });
</script>


@endsection

