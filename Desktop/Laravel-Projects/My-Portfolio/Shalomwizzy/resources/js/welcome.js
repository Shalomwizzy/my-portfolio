
    document.addEventListener('DOMContentLoaded', function () {
        const namePlaceholder = document.getElementById('name-placeholder');
        const waveEmoji = document.getElementById('wave-emoji');
        const writingPen = document.getElementById('writing-pen');
        const names = [
            
            'T✍️',
            'Te✍️',
            'Tem✍️',
            'Temi✍️',
            'Temito✍️',
            'Temitop✍️',
            'Temitope✍️',
            'Temitope V✍️',
            'Temitope Vi✍️',
            'Temitope Vic✍️',
            'Temitope Vict✍️',
            'Temitope Victo✍️',
            'Temitope Victor✍️',
            'Temitope Victor A✍️',
            'Temitope Victor Ak✍️',
            'Temitope Victor Ako✍️',
            'Temitope Victor Akom✍️',
            'Temitope Victor Akomo✍️',
            'Temitope Victor Akomol✍️',
            'Temitope Victor Akomola✍️',
            'Temitope Victor Akomolaf✍️',
            'Temitope Victor Akomolafe✍️',
            'Temitope Victor Akomolafe S✍️',
            'Temitope Victor Akomolafe Sha✍️',
            'Temitope Victor Akomolafe Shal✍️',
            'Temitope Victor Akomolafe Shalo✍️',
            'Temitope Victor Akomolafe Shalom✍️',
            '(TAVS)✍️',
           
        ];

        let index = 0;

        setInterval(() => {
            namePlaceholder.textContent = names[index];
            index = (index + 1) % names.length;
        }, 800);

    });

    // BACK TO TOP 

 
    // Get the button
    document.addEventListener('DOMContentLoaded', function () {
        var mybutton = document.getElementById("backToTopBtn");
    
        function handleScroll() {
            var scrollY = window.scrollY || document.documentElement.scrollTop;
    
            if (scrollY > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
    
        window.addEventListener('scroll', handleScroll);
    
        mybutton.addEventListener("click", function () {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        });
    
        // Trigger the handleScroll function once to handle initial state
        handleScroll();
    });
    



    



















