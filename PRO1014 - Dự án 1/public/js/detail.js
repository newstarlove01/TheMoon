var slideIndex = 1;
var autoPlayInterval;
showDivs(slideIndex);

// Function to show slides
function showDivs(n) {
  var i;
  var slides = document.getElementsByClassName("slide-items");
  var dots = document.getElementsByClassName("album-item");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active-album", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active-album";
}

// Autoplay function
function startAutoPlay() {
  // Clear any existing interval to avoid multiple intervals running simultaneously
  clearInterval(autoPlayInterval);
  autoPlayInterval = setInterval(function () {
    slideIndex++;
    showDivs(slideIndex);
  }, 3000); // Change slides every 5 seconds
  console.log("Autoplay started");
}

// Function to set the current slide
function currentDiv(n) {
  showDivs((slideIndex = n));
}

// Function to set the current slide and pause autoplay
function pauseAndShow(n) {
  currentDiv(n);
  if (autoPlayInterval) {
    clearInterval(autoPlayInterval); // Stop autoplay
    console.log("Autoplay paused");
  }
  // Restart autoplay after a 5-second pause
  setTimeout(function () {
    console.log("Autoplay resumed");
    startAutoPlay();
  }, 5000);
}

// Start autoplay when page loads
window.onload = function () {
  startAutoPlay();
};

(function () {
  const quantityContainer = document.querySelector(".quantity");
  const minusBtn = quantityContainer.querySelector(".minus");
  const plusBtn = quantityContainer.querySelector(".plus");
  const inputBox = quantityContainer.querySelector(".input-box");

  updateButtonStates();

  quantityContainer.addEventListener("click", handleButtonClick);
  inputBox.addEventListener("input", handleQuantityChange);

  function updateButtonStates() {
    const value = parseInt(inputBox.value);
    minusBtn.disabled = value <= 1;
    plusBtn.disabled = value >= parseInt(inputBox.max);
  }

  function handleButtonClick(event) {
    if (event.target.classList.contains("minus")) {
      decreaseValue();
    } else if (event.target.classList.contains("plus")) {
      increaseValue();
    }
  }

  function decreaseValue() {
    let value = parseInt(inputBox.value);
    value = isNaN(value) ? 1 : Math.max(value - 1, 1);
    inputBox.value = value;
    updateButtonStates();
    handleQuantityChange();
  }

  function increaseValue() {
    let value = parseInt(inputBox.value);
    value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
    inputBox.value = value;
    updateButtonStates();
    handleQuantityChange();
  }

  function handleQuantityChange() {
    let value = parseInt(inputBox.value);
    value = isNaN(value) ? 1 : value;

    // Execute your code here based on the updated quantity value
    console.log("Quantity changed:", value);
  }
})();

function onlyOne(checkbox) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach((item) => {
    if (item !== checkbox) {
      item.checked = false;
    }
  });
}
