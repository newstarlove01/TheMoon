function openSearch() {
  document.getElementById("search").style.display = "block";
}

function closeSearch() {
  document.getElementById("search").style.display = "none";
}

function updateImage() {
  const imgElement = document.getElementById("logo");
  const screenWidth = window.innerWidth;

  if (screenWidth < 1024) {
    imgElement.src = "./img/logo-doc1.png"; 
  } else {
    imgElement.src = "./img/logo-ngang.png";
  }
}

window.addEventListener("load", updateImage);
window.addEventListener("resize", updateImage);

