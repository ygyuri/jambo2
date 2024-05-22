document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed'); // Log when the DOM is fully loaded

    // Get all slide elements
    const slides = document.querySelectorAll('.slide');
    const dotsContainer = document.querySelector('.navigation-dots');
    let index = 0; // Initialize the slide index

    // Create navigation dots
    slides.forEach((slide, idx) => {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (idx === 0) {
            dot.classList.add('active');
        }
        dotsContainer.appendChild(dot);
    });

    const dots = document.querySelectorAll('.dot');

    // Function to switch to the next slide
    const nextSlide = () => {
        console.log('Current index:', index); // Log the current index
        // Remove 'active' class from the current slide and dot
        slides[index].classList.remove('active');
        dots[index].classList.remove('active');
        // Increment index to move to the next slide (loop back to the first slide if reached the end)
        index = (index + 1) % slides.length;
        // Add 'active' class to the next slide and dot
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        console.log('Next index:', index); // Log the next index
    };

    // Set interval to automatically switch to the next slide
    let interval = setInterval(nextSlide, 5000); // Adjust the interval (in milliseconds) as needed
    console.log('Slideshow started with interval:', interval); // Log the interval ID

    // Function to pause the slideshow on mouseover
    const pauseSlideShow = () => {
        clearInterval(interval); // Clear the interval to pause the slideshow
        console.log('Slideshow paused'); // Log the pause event
    };

    // Function to resume the slideshow on mouseout
    const resumeSlideShow = () => {
        interval = setInterval(nextSlide, 5000); // Restart the interval to resume the slideshow
        console.log('Slideshow resumed with new interval:', interval); // Log the new interval ID
    };

    // Add event listeners for mouseover and mouseout events to pause/resume the slideshow
    slides.forEach(slide => {
        slide.addEventListener('mouseover', () => {
            pauseSlideShow();
            console.log('Mouse over on slide', index); // Log the mouseover event
        });
        slide.addEventListener('mouseout', () => {
            resumeSlideShow();
            console.log('Mouse out from slide', index); // Log the mouseout event
        });
    });

    // Add event listeners to navigation dots for manual slide control
    dots.forEach((dot, dotIndex) => {
        dot.addEventListener('click', () => {
            // Remove 'active' class from the current slide and dot
            slides[index].classList.remove('active');
            dots[index].classList.remove('active');
            // Set index to the clicked dot's index
            index = dotIndex;
            // Add 'active' class to the new slide and dot
            slides[index].classList.add('active');
            dots[index].classList.add('active');
            console.log('Manual slide to index:', index); // Log the manual slide index
        });
    });
});
