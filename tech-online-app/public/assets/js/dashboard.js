const successForm = document.querySelector(".product-success");
const resetSuccess = document.querySelector(".success-reset");

const productAddForm = document.querySelector(".product-new");
const resetAdd = document.querySelector(".product-new-reset");

const userEditForm = document.querySelector(".user-edit");
const userEditReset = document.querySelector(".user-edit-reset");

const userAddForm = document.querySelector(".user-new");
const userReset = document.querySelector(".user-new-reset");

successForm.addEventListener("submit", function (e) {
  e.preventDefault();
});
productAddForm.addEventListener("submit", function (e) {
  e.preventDefault();
});

resetSuccess.addEventListener("click", function () {
  successForm.reset();
});
resetAdd.addEventListener("click", function () {
  productAddForm.reset();
});

userEditForm.addEventListener("submit", function (e) {
  e.preventDefault();
});
userEditReset.addEventListener("click", function () {
  userEditForm.reset();
});

userAddForm.addEventListener("submit", function (e) {
  e.preventDefault();
});
userReset.addEventListener("click", function () {
  userAddForm.reset();
});
