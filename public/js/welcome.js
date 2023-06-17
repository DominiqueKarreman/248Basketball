const element = document.querySelector('#programmeDiv');
const statDiv = document.querySelector('#statDiv');
const watDoetDiv = document.querySelector('#watDoetDiv');
const observer = new IntersectionObserver(entries => {
    console.log(entries, "entries")
    if (entries[0].isIntersecting) {
        console.log("test")
        element.classList.add('animate');
    } else {
        // element.classList.remove('animate');
    }
}, {
    threshold: 0.1
})
const observer2 = new IntersectionObserver(entries => {

    if (entries[0].isIntersecting) {
        let stat1 = document.getElementById("stat1")
        let stat2 = document.getElementById("stat2")
        let stat3 = document.getElementById("stat3")



        animateNumber(stat1, 45)
        animateNumber(stat2, 155)
        animateNumber(stat3, 452)
        observer2.unobserve(statDiv)

        statDiv.style.opacity = 1;
        console.log("statdiv: intersecting: ", entries[0].isIntersecting)
    } else {
        // statDiv.style.opacity = 0;
        console.log("statDiv: intersecting: ", entries[0].isIntersecting)
    }
}, {
    threshold: 0.9
});

observer2.observe(statDiv);

observer.observe(statDiv);

const observer3 = new IntersectionObserver(entries => {
    console.log(entries, "entries3")
    if (entries[0].isIntersecting) {
        console.log("YTAHS")
        // watDoetDiv.classList.add('animate');
        watDoetDiv.style.transform = "translateY(0)"
        watDoetDiv.style.transition = "1.5 ease-in"
        watDoetDiv.style.opacity = 1
    } else {
        // element.classList.remove('animate');
    }
}, {
    threshold: 0.1
})
observer3.observe(watDoetDiv)

function animateNumber(element, finalNumber) {
    let currentNumber = 0;
    const duration = 1750; // 2  seconds
    const step = finalNumber / (duration / 10); // increment by 10ms

    const intervalId = setInterval(() => {
        currentNumber += step;
        if (currentNumber >= finalNumber) {
            clearInterval(intervalId);
            currentNumber = finalNumber;
        }
        element.textContent = Math.round(currentNumber);
    }, 10);
}

const eventsDiv = document.querySelector('#events');

const options = {
    rootMargin: '0px',
    threshold: 0.5
};

const observer4 = new IntersectionObserver(entries => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {

            eventsDiv.style.transform = "scale(1)"
        } else {
            // eventsDiv.classList.remove('slide-in');
        }
    });
}, options);

observer4.observe(eventsDiv);


// const navbar = document.querySelector('nav');

// window.addEventListener('scroll', () => {
//     console.log(window.scrollY)
//     if (window.scrollY > 0 || window.scrollY < 100) {

//         navbar.style.background = "linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));"
//     } else {
//         navbar.style.background = '#EDB12C'
//     }
// });
