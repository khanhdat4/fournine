const header = document.querySelector(".header");
window.addEventListener("scroll", function () {
    header.classList.toggle("fixed-top", window.scrollY > 46);
});

// const productAddForm = document.querySelectorAll(".product-add-form");

// [...productAddForm].forEach((item) => {
//     item.addEventListener("submit", function (e) {
//         e.preventDefault();
//     });
// });

// const headerCount = document.querySelector(".header-cart-count");
// setInterval(() => {
//   if (headerCount.textContent) {
//     headerCount.classList.add("is-show");
//   } else {
//     headerCount.classList.remove("is-show");
//   }
// }, 500);
// const ups = document.querySelectorAll(".item-up");
// const downs = document.querySelectorAll(".item-down");
// [...ups].forEach((item) => {
//   item.addEventListener("click", function (e) {
//     const num = +item.parentElement.previousElementSibling.value;
//     item.parentElement.previousElementSibling.value = num + 1;
//   });
// });
// [...downs].forEach((item) => {
//   item.addEventListener("click", function (e) {
//     const num = +item.parentElement.previousElementSibling.value;
//     if (num > 1) {
//         item.parentElement.previousElementSibling.value = num - 1;
//     }
//   });
// });
function setTime(name) {
    element = document.getElementById(name);
    element.style.display = "flex";
    setTimeout(() => {
        element.style.display = "none";
    }, 900);
}
// setTime('modal-success')
// setTime('modal-error')
