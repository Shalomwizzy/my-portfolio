{{-- HERO --}}
<section>
    <div class="container mt-5 hero-section">
        <div class="row align-items-center">
            <div class="col-lg-6 animate__animated animate__bounceInRight">
                <h5 class="display-4">
                    Greetings!  <span class="wave" id="wave-emoji">👋</span>,
                </h5>
                <p class="lead">
                    I am <span id="name-placeholder">S</span>
                </p>
                <p>
                    a versatile<span> Full-stack web developer</span>  dedicated to crafting stunning and engaging user interfaces. My passion lies in seamlessly blending creativity with functionality to deliver exceptional web experiences. From front-end design to back-end development, I thrive on turning ideas into reality.
                </p>
                <h6>
                    <a href="{{ route('contact.me') }}" class="btn btn-primary"> <img class="hireme" src="{{ asset('images/hire-image.jpeg') }}" alt=""> Hire Me </a>
                    <a href="https://1drv.ms/b/s!AolA_6C5gyWGbyHIX0SuiiQ-rB8?e=ceWXQm" target="blank" class="btn btn-outline-secondary btn-downloadcv"> <i class="fa-solid fa-download"></i> Download CV</a>
                </h6>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/robotodesign.jpeg') }}" alt="Hand Logo" class="img-fluid rounded-circle animate__animated animate__flip">
            </div>
        </div>
    </div>
</section>


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

   {{-- PROJECTION SECTION --}}
   <section>
    @include('partials.project-section', ['projects' => $projects])
   </section>

    {{-- SKILL SECTION --}}
     <section>
        @include('partials.skills-section', ['skills' => $skills])
     </section>

     {{-- LEARNING SECTION --}}

     <section>
        @include('partials.learnings-section', ['learnings' => $learnings])
     </section> 



     {{-- CONTACT SECTION --}}

     <section>
        <div class="container contact-section">
            <div class="animate__animated">
               <div class="contact-header">
                   <img src="{{ asset('images/contact-me-icon.png') }}" class="contact-details-image img-fluid" alt="">
                   <h5 class="mb-2" style="align-self: flex-end;">Contact</h5>
                   
               </div>
           
               <h6 class="contact-writeup">Connect with me and let's bring your ideas to life!</h6>
            </div>
           
               <div class="contact-container">
                   <div class="contact-info animate__animated animate__slideInRight">
                       <h5 class="">Contact Us for Your Next Project</h5>
                       <p class="contact-text">
                        Whether you want to discuss a new project, explore collaboration opportunities, or simply connect, I'm thrilled that you've chosen to reach out! Your engagement means a lot.
                    </p>
                    <p class="contact-text">
                        Feel free to connect with me on any of the social media platforms listed below. Each platform reflects a unique aspect of my journey, projects, and insights. Your comments, messages, and feedback are always appreciated.
                    </p>
                    <p class="contact-text">
                        If you prefer a more direct approach, you can also use the contact form below to reach out. It's a convenient way to share your thoughts, inquiries, or project details. I look forward to hearing from you!
                    </p>
                    
                  
                    
                       <div class="social-icons">
        
                        <a href="https://x.com/ishalomwizzy?s=21&t=jhwX7gvlXFMKMK7nX024RA" target="blank" class="social-icon-link" data-name="Twitter">
                            <img src="{{ asset('images/x-icon.jpg') }}" class="social-median-icons" alt=""></a>
        
                        <a href="https://www.instagram.com/iam_shalomwizzy?igsh=MTN6cHNqdXYzeDNlbg==" target="blank" class="social-icon-link" data-name="Instagram"> <img src="{{ asset('images/instagram-icon-image.jpg') }}" class="social-median-icons" alt=""> </a>
        
                        <a href="https://www.facebook.com/akomolafe.temitopeshalom?mibextid=2JQ9oc" target="blank" class="social-icon-link" data-name="Facebook"> <img src="{{ asset('images/facebook-icon.jpg') }}" class="social-median-icons" alt=""></a>
        
                        <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="Youtube"> <img src="{{ asset('images/youtube-icon.jpg') }}" class="social-median-icons" alt=""></a>
        
                        <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="TikTok"> <img src="{{ asset('images/tiktok-icon.jpg') }}" class="social-median-icons" alt=""></a>

                        
                        {{-- <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="Github"> <img src="{{ asset('images/Github-icon 2.jpg') }}" class="social-median-icons" alt=""></a> --}}

                        <a href="https://github.com/Shalomwizzy" target="blank"class="social-icon-link" data-name="Github"> <img src="{{ asset('images/github-icon.jpg') }}" class="social-median-icons" alt=""></a>
        
                        <a href="https://www.linkedin.com/in/temitope-akomolafe-5558a7261?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="blank" class="social-icon-link" data-name="Linkedln">
                            <img src="{{ asset('images/linkeden-icon.jpg') }}" class="social-median-icons" alt=""></a>
        
        
                        <a href="https://wa.link/pw344p" target="blank" class="social-icon-link" data-name="WhatsApp"><img src="{{ asset('images/whatsapp-icon.jpg') }}" class="social-median-icons" alt=""></a>
        
                        
        
                        {{-- <a href="mailto: temivictorakomolafe@icloud.com" target="blank"><i class="fa-solid fa-envelope"></i></a>
                        <a href="tel:+2348144738828"><i class="fas fa-phone"></i></a>
                        <a href="https://wa.me/8144738828" target="_blank"><i class="fab fa-whatsapp"></i></a> --}}
                       </div>
                   </div>
                   <div class="contact-form animate__animated animate__slideInLeft">
                       <h2>Contact Me</h2>
                       <form action="{{ route('send.mail') }}" method="post">
                           @csrf
                           <div class="form-group">
                               <input type="text" id="name" name="name" required>
                               <label for="name">Your Name</label>
                           </div>
           
                           <div class="form-group">
                               <input type="email" id="email" name="email" required>
                               <label for="email">Your Email</label>
                           </div>
           
                           <div class="form-group">
                               <textarea id="message" name="message" rows="4" required></textarea>
                               <label for="message">Your Message</label>
                           </div>
           
                           <button type="submit">Send Message</button>
                       </form>
                   </div>
               </div>
           </div>
        
           <script>
            document.addEventListener("DOMContentLoaded", function () {
              const formGroups = document.querySelectorAll(".form-group");
          
              formGroups.forEach((formGroup) => {
                const input = formGroup.querySelector("input, textarea");
          
                input.addEventListener("focus", () => {
                  formGroup.classList.add("focused");
                });
          
                input.addEventListener("blur", () => {
                  if (!input.value) {
                    formGroup.classList.remove("focused");
                  }
                });
              });
            });
          </script>
     </section>