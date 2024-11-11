let currentIndex = 0;

function showSlide(index) {
    const slide = document.getElementById('slide');
    const slideWidth = slide.children[0].offsetWidth;
    slide.style.transform = `translateX(${-index * slideWidth}px)`;
}

function nextSlide() {
    const slide = document.getElementById('slide');
    if (currentIndex < slide.children.length - 3) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    showSlide(currentIndex);
}

function prevSlide() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = slide.children.length - 3;
    }
    showSlide(currentIndex);
}

setInterval(nextSlide, 5000);