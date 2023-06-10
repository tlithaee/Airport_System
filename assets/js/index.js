const navId = document.getElementById("nav_menu");
const toggleBtnId = document.getElementById("toggle_btn");
const closeBtnId = document.getElementById("close_btn");
const loginForm = document.getElementById("loginForm");
const modalCloseBtn = loginForm.querySelector(".close");

// Show menu
toggleBtnId.addEventListener("click", () => {
  navId.classList.add("show");
});

// Hide menu
closeBtnId.addEventListener("click", () => {
  navId.classList.remove("show");
});

// Show login form
document.querySelector(".documentation_btn").addEventListener("click", () => {
  loginForm.style.display = "block";
});

// Hide login form when the close button is clicked
modalCloseBtn.addEventListener("click", () => {
  loginForm.style.display = "none";
});

// Hide login form when clicking outside the form
window.addEventListener("click", (event) => {
  if (event.target === loginForm) {
    loginForm.style.display = "none";
  }
});

