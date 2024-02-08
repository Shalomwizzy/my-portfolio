<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        /* Add your custom CSS styles here */
        .contact-response {
            text-align: center;
            margin-top: 20px;
        }

        .contact-response .social-icons {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contact-response .social-icon {
            margin: 0 10px;
            font-size: 20px;
            color: #555555;
        }

        .contact-response .subcopy {
            margin-top: 20px;
            border-top: 1px solid #cccccc;
            text-align: center;
            padding-top: 20px;
        }

        .contact-response .subcopy-text {
            font-size: 12px;
            color: #555555;
        }

        .all-right{
            font-size: 8px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="thank-you">
            Thank You for Contacting Us
        </div>

        <p>Hello {{ $data['name'] }},</p>
        <p>Thank you for contacting us. We have received your message and will get back to you shortly.</p>

        <div class="details">
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Message:</strong> {{ $data['message'] }}</p>
        </div>

        <p>Best regards,<br>Lahaadee Kiddies</p>

        <div class="contact-response">
            <ul class="social-icons">
                <li class="social-icon">
                    <a href="https://www.instagram.com/lahaadee_kiddies/?igshid=MzRlODBiNWFlZA%3D%3D">
                        <img src="{{ asset('instagram-image-logo.png') }}" alt="Instagram" width="20">
                    </a>
                </li>
                <li class="social-icon">
                    <a href="https://facebook.com">
                        <img src="{{ asset('Facebook-image-logo.png') }}" alt="Facebook" width="20">
                    </a>
                </li>
                <li class="social-icon">
                    <a href="https://twitter.com">
                        <img src="{{ asset('x-image-logo-png.webp') }}" alt="Twitter" width="20">
                    </a>
                </li>
                <li class="social-icon">
                    <a href="https://www.tiktok.com/@lahaadee_kiddies?_t=8eu0LrbRkXt&_r=1">
                        <img src="{{ asset('tiktokimage-logo.png') }}" alt="TikTok" width="20">
                    </a>
                </li>
                <li class="social-icon">
                    <a href="https://api.whatsapp.com/send?phone=2349039354646&text=Hi%20my%20name%20is%20%F0%9F%98%8A">
                        <img src="{{ asset('whatsap-image-logo.webp') }}" alt="WhatsApp" width="20">
                    </a>
                </li>
      
      

            </ul>
        </div>

        @component('mail::subcopy')
        <div class="all-right">
            © {{ date('Y') }} LAHAADEE KIDDIES - Your Number One Online Shopping Store For Kiddies. All rights reserved.
        </div>
        @endcomponent
    </div>
</body>
</html>