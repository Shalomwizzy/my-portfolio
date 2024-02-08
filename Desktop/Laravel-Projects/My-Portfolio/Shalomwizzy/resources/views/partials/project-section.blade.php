<div class="container-fluid project-section">
    <div class="project-header">
        <img src="{{ asset('images/my-project-icon.jpeg') }}" class="project-details-image img-fluid" alt="">
        <h5 class="mb-2">Projects</h5>
    </div>

    <h6 class="project-writeup">Explore the diverse landscapes of my projects, where every endeavor is a story waiting to be discovered...</h6>


        <div class="col-12 col-md-8 mb-3">
            <h5 class="text-center mb-5">All Projects</h5>
            <div class="row project-index" id="projectContainer">
                @forelse ($projects as $project)
                    <div class=" col-lg-4 mb-4  mb-4">
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
                                    <div class="d-flex justify-content-between live-git text-center">
                                        @if ($project->github_link)
                                            <p class="mb-1 btn github-btn"><a href="{{ $project->github_link }}" class="link-link" target="_blank"> <i class="fa-brands fa-github"></i> GitHub Link</a></p>
                                        @endif
                                        @if ($project->live_link)
                                            <p class="mb-1 btn livelink-btn"><a href="{{ $project->live_link }}" class="link-link" target="_blank"> <i class="fa-solid fa-link"></i> Live Link</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p class="text-center">No Project Available</p>
                    </div>
                @endforelse
            </div>
        </div>
   
    <div>
        @php
            $projectOffset = isset($projectOffset) ? $projectOffset : 0;
        @endphp
    
        @if($projects->count() >= 3)
            <a href="#" class="btn btn-primary btn-loadmore" id="loadMoreProjects" data-offset="{{ $projectOffset }}">Load More</a>
        @endif
    </div>
 
</div>

  


<script>
    $(document).ready(function () {
        var loading = false; // Variable to prevent multiple simultaneous requests
        var noMoreProjects = false; // Variable to track if there are no more projects
    
        $('#loadMoreProjects').on('click', function (e) {
            e.preventDefault();
    
            if (!loading && !noMoreProjects) {
                var offset = $(this).data('offset');
                loadMoreProjects(offset);
            }
        });
    
    
        function loadMoreProjects(offset) {
            loading = true; // Set loading to true to prevent multiple requests
    
            $.ajax({
                url: '{{ route("projects.userIndex") }}',
                type: 'GET',
                data: { offset: offset },
                success: function (response) {
                    if (response.view) {
                        // Check if the "Load More" button already exists
                        var loadMoreButton = $('#loadMoreProjects');
                        if (loadMoreButton.length > 0) {
                            // Remove existing "Load More" button before appending new content
                            loadMoreButton.remove();
                        }

                        
    
                        // Append only the content of the view, not the entire HTML
                        var content = $(response.view).find('.project-index').html();
                        $('#projectContainer').append(content);
    
                        // Update the offset for the next load using the same method
                        $('#projectContainer').data('offset', response.projectOffset);
    
                        // Check if there are more projects
                        if (response.projects.length === 0) {
                            noMoreProjects = true;
                            $('#loadMoreProjects').hide(); // No more projects to load, hide the button
                        }
    
                        // Trigger animate.css animation
                        $('#projectContainer .project-body:last-child').addClass('animate__animated animate__rollIn');
                    } else {
                        noMoreProjects = true;
                        $('#loadMoreProjects').hide(); // No more projects to load, hide the button
                        // Optionally, display a message to the user
                        // $('#projectContainer').append('<p>No more projects available</p>');
                    }
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function () {
                    loading = false; 
                }

                
            });
        }
    });
    </script>
    


















