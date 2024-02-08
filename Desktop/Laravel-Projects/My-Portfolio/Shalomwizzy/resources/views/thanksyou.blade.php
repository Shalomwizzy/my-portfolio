

@extends('layouts.app') 

@section('content')
<div class="container text-center mt-5 thank-you-container">
    <div class="thankyou-header">
        <img src="{{ asset('images/handshake-icon.jpeg') }}" class="thankyou-details-image img-fluid animate__animated animate__bounce infinite" alt="">
        <h5 class="mb-2">Thank you for reaching out! </h5>
    </div>
  <div class="thank-you-message p-4">
  
    <span class="thank-you-text">Your interest and engagement with my portfolio are truly appreciated. It means a lot that you've taken the time to connect.
    I am committed to providing a thoughtful and timely response to your inquiry. Your message is important to me, and I'll do my best to get back to you within 24 hours.
   Meanwhile, feel free to explore more of my portfolio to gain insights into my work and expertise. If you have any specific questions or if there's a particular project you'd like to discuss, please don't hesitate to mention it in your message.
    Ensuring that your contact details are accurate is crucial. If there are any errors, kindly refresh the page and resubmit your information.
   Once again, thank you for considering my portfolio. I'm excited about the opportunity to connect and discuss how we can collaborate. Looking forward to our conversation!</span>

   <h6>
    Let's stay connected! Catch me on these social platforms:
    <a href="https://x.com/ishalomwizzy?s=21&t=jhwX7gvlXFMKMK7nX024RA" target="blank" class="social-icon-link" data-name="Twitter">
        <img src="{{ asset('images/x-icon.jpg') }}" class="socials-median-icons" alt=""></a>

    <a href="https://www.instagram.com/iam_shalomwizzy?igsh=MTN6cHNqdXYzeDNlbg==" target="blank" class="social-icon-link" data-name="Instagram"> <img src="{{ asset('images/instagram-icon-image.jpg') }}" class="socials-median-icons" alt=""> </a>

    <a href="https://www.facebook.com/akomolafe.temitopeshalom?mibextid=2JQ9oc" target="blank" class="social-icon-link" data-name="Facebook"><img src="{{ asset('images/facebook-icon.jpg') }}" class="socials-median-icons" alt=""></a>

    <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="Youtube"> <img src="{{ asset('images/youtube-icon.jpg') }}" class="socials-median-icons" alt=""></a>

    <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="TikTok"> <img src="{{ asset('images/tiktok-icon.jpg') }}" class="socials-median-icons" alt=""></a>

    <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="Github"> <img src="{{ asset('images/Github-icon 2.jpg') }}" class="socials-median-icons" alt=""></a>

    <a href="https://www.linkedin.com/in/temitope-akomolafe-5558a7261?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="blank" class="social-icon-link" data-name="Linkedln">
        <img src="{{ asset('images/linkeden-icon.jpg') }}" class="socials-median-icons" alt=""></a>


    <a href="https://wa.link/pw344p" target="blank" class="social-icon-link" data-name="WhatsApp"><img src="{{ asset('images/whatsapp-icon.jpg') }}" class="socials-median-icons" alt=""></a>
   </h6>

 
    
  </div>
  <a href="{{ route('welcome') }}"><button class="btn btn-primary back-homepage"> Back to homepage</button></a>
</div>




@endsection


