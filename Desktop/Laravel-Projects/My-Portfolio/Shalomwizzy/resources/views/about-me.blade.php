@extends('layouts.app')

@section('content')
    {{-- ABOUT ME --}}
<section   class="mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="{{ asset('images/my classic photo.JPG') }}" alt="Your Image" class="img-fluid  about-me-image">
            </div>
            <div class="col-lg-6">
                <h5 class="display-4">About Me</h5>
                <h6>TEMITOPE VICTOR AKOMOLAFE</h6>
                <h5>
                    <u style="text-decoration-thickness: 2px; text-decoration-color: #941F3E; font-weight: bold;">Full stack web developer</u>
                </h5>
                
                <p>
                    Hello! I'm Temitope Victor Akomolafe, a passionate full stack web developer with over 9 months of experience in crafting immersive digital experiences. When I'm not coding, you can find me indulging in my other passions – watching captivating movies, cheering on my favorite football teams, discovering new music gems, and diving into exciting gaming adventures.
                </p>
                <p>
                    I thrive on taking up new challenges and working on innovative projects that push the boundaries of technology. I believe in the power of continuous learning and am always eager to enhance my skills to stay ahead in this dynamic field.
                </p>
                <div class="mt-4">
                    <h6><a href="https://1drv.ms/b/s!AolA_6C5gyWGbyHIX0SuiiQ-rB8?e=ceWXQm" class="btn btn-primary btn-downloadcv" target="blank"><i class="fa-solid fa-download"></i> Download CV</a></h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection