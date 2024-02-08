<div class="container skill-section">
            <!-- Image and Write-up for Skills -->
        <div class="skill-header">
            <img src="{{ asset('images/skills-picture.jpg') }}" class="skill-details-image" alt="">
            <h5 class="mb-2">Skills</h5>
        </div>
        <h6 class="skill-writeup">Discover the diverse skills I've acquired, each representing a unique facet of my expertise...</h6>
    <div class="row animate__animated animate__slideInLeft">


        <!-- Skills Section -->
        <div class="col-md-12 order-md-1">
            <h5 class="d-flex justify-content-center">All Skills</h5>

            <div class="row skill-index user" id="skillContainer" data-offset="{{ $skillsOffset }}">
                @forelse ($skills as $skill)
                    <div class="col-md-3 mb-4">
                        <div class="h-100">
                            {{-- Displaying image in a circular format --}}
                            <div class="flex-column mt-3 skill-img-con" style="width: 100px; height: 100px;">
                                <img src="{{ asset($skill->image) }}" class="skill-images" alt="{{ $skill->name }}">
                                <h6 class="skill-name">{{ $skill->name }}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p class="text-center">No Skill Available</p>
                    </div>
                @endforelse
            </div>

            <div>
                @php
                    $skillsOffset = isset($skillsOffset) ? $skillsOffset : 0;
                @endphp
            
                @if($skills->count() >= 3)
                    <a href="#" class="btn btn-primary btn-loadmore" id="loadMoreSkills" data-offset="{{ $skillsOffset }}">Load More</a>
                @endif
            </div>
        </div>
    </div>
</div>







<script>
$(document).ready(function () {
    var loadingSkills = false;
    var noMoreSkills = false;
    var loadedSkills = [];

    $('#loadMoreSkills').on('click', function (e) {
        e.preventDefault();

        if (!loadingSkills && !noMoreSkills) {
            var offsetSkills = $('#skillContainer').data('offset');
            loadMoreSkills(offsetSkills);
        }
    });

    function loadMoreSkills(offsetSkills) {
        loadingSkills = true;

        $.ajax({
            url: '{{ route("skills.userIndex") }}',
            type: 'GET',
            data: { offset: offsetSkills },
            success: function (response) {
                console.log(response); // Log the entire response object for debugging

                if (response.view) {
                    var loadMoreButtonSkills = $('#loadMoreSkills');
                    if (loadMoreButtonSkills.length > 0) {
                        loadMoreButtonSkills.remove();
                    }

                    // Filter out skills that have already been loaded
                    var newSkills = response.skills.filter(skill => !loadedSkills.includes(skill.id));

                    if (newSkills.length > 0) {
                        var contentSkills = $(response.view).find('.skill-index').html();
                        $('#skillContainer').append(contentSkills);

                        // Update the offset for the next load
                        $('#skillContainer').data('offset', response.offset);

                        // Add new skills to the loadedSkills array
                        loadedSkills = loadedSkills.concat(newSkills.map(skill => skill.id));
                    } else {
                        noMoreSkills = true;
                        $('#loadMoreSkills').hide();
                    }
                } else {
                    noMoreSkills = true;
                    $('#loadMoreSkills').hide();
                }
            },
            error: function (error) {
                console.log(error);
            },
            complete: function () {
                loadingSkills = false;
            }
        });
    }
});

</script>






