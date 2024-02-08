
<div class="container-fluid learning-section text-center">
    <!-- Image and Write-up for Learnings -->
    <div class="learning-header">
        <img src="{{ asset('images/learning-this-image.png') }}" class="learning-details-image img-fluid" alt="">
        <h5 class="mb-2">Learning</h5>
    </div>
    <h6 class="learning-writeup mb-4">Embark on a journey through my learning experiences, each one a step towards mastery...</h6>
    

    <div class="col-12 col-md-8 mb-3">
        <h5 class="text-center mb-4">All Learnings</h5>

        <div class="row justify-content-center mb-4" id="learningsContainer">
            @forelse ($learnings as $learning)
                <div class="col-lg-4 mb-4 learning-body my-6">
                    <div class="card h-100 learnings-index animate__animated animate__wobble">
                        <img src="{{ asset($learning->image) }}" class="card-img-top learning-image" alt="{{ $learning->name }}">
                        <div class="card-body learning-boddy">
                            <h5 class="card-title">{{ $learning->name }}</h5>
                            <p class="card-text learning-describe">{{ $learning->description }}</p>
                             
                                <ul class="list-group-flush">
                                    <!-- Your existing list items -->
                                    <li class="list-group-item learn-li"><strong>Start Date:{{ $learning->start_date }}</strong><hr>
                                    </li>
                                    
                                    <li class="list-group-item learn-li"><strong>End Date: {{ $learning->end_date }}</strong> 
                                     <hr>
                                    </li>
                                
                                    <li class="list-group-item learn-li"><strong>Status: {{ $learning->status }}</strong> <hr>
                                    </li>
    
                                    <li class="list-group-item"><strong>Tags: {{ $learning->tags }}</strong> 
                                    <hr>
                                    </li>
                                    
                                    <li class="list-group-item learn-li"><strong>Skills Gained: @foreach(explode(',', $learning->skills_gained) as $skills_gained)
                                        <time class="">{{ trim($skills_gained) }}</time>  @endforeach</strong> <hr></li>

                                        
                                       

                                   
    
                                    <li class="list-group-item learn-li"><strong>Resources: {{ $learning->resources }}</strong> 
                                    <hr>
                                    </li>

                                    <li class="list-group-item learn-li" style="display: flex; align-items: center; flex-wrap: wrap;">
                                        <strong>External Links:
                                        @php
                                            $externalLinks = json_decode($learning->external_links, true);
                                        @endphp
                                       
                                        @if (is_array($externalLinks) && count($externalLinks) > 0)
                                            @foreach ($externalLinks as $externalLink)
                                            
                                                <a href="{{ trim($externalLink['url']) }}" class="resources-external-linked" target="_blank">{{ trim($externalLink['name']) }}</a>

                                            @endforeach

                                        @else
                                            No external links available.
                                        @endif
                                    </strong>
                                    
                                   
                                    </li>
                                    <hr>
                                    
       

                                    
                                    <li class="list-group-item">
                                        <strong>Rating:
                                        <!-- Display star icons based on the rating value -->
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $learning->rating)
                                            <i class=" fa-solid fa-star fastar-checked"></i>
                                            @else
                                            <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </strong> 
                                    </li>
                                </ul>
                             
                          
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-center">No Learning Available</p>
                </div>
            @endforelse
        </div>

        <div>
            @php
                $learningsOffset = isset($learningsOffset) ? $learningsOffset : 0;
            @endphp
        
            @if($learnings->count() >= 3)
                <a href="#" class="btn btn-primary btn-loadmore" id="loadMoreLearnings" data-offset="{{ $learningsOffset }}">Load More</a>
            @endif
        </div>
    </div>
</div>










<script>
$(document).ready(function () {
    var loading = false;
    var noMoreLearnings = false;

    $('#loadMoreLearnings').on('click', function (e) {
        e.preventDefault();

        if (!loading && !noMoreLearnings) {
            var offset = $(this).data('offset');
            loadMoreLearnings(offset);
        }
    });

    function loadMoreLearnings(offset) {
        loading = true;

        $.ajax({
            url: '{{ route("learnings.userIndex") }}',
            type: 'GET',
            data: { offset: offset },
            success: function (response) {
                if (response.view) {
                    var loadMoreButton = $('#loadMoreLearnings');
                    if (loadMoreButton.length > 0) {
                        loadMoreButton.remove();
                    }

                    var content = $(response.view).find('.row').html();
                    $('#learningsContainer').append(content);

                    var newOffset = response.learningsOffset + 1; // Update the offset for the next load
                    $('#loadMoreLearnings').data('offset', newOffset);

                    if (response.learnings.length === 0) {
                        noMoreLearnings = true;
                        $('#loadMoreLearnings').hide();
                    }

                    $('#learningsContainer .learning-body:last-child').addClass('animate__animated animate__rollIn');
                } else {
                    noMoreLearnings = true;
                    $('#loadMoreLearnings').hide();
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











