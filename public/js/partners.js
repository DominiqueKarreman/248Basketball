
const partnerDiv = document.querySelector('#partnerDiv');

const options = {
    rootMargin: '0px',
    threshold: 0.5
};

const observer5 = new IntersectionObserver(entries => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {

            partnerDiv.style.transform = "translateY(0)"
            partnerDiv.style.transition = "1.5 ease-in"
            partnerDiv.style.opacity = 1
        } else {
            // eventsDiv.classList.remove('slide-in');
        }
    });
}, options);

observer5.observe(partnerDiv);

