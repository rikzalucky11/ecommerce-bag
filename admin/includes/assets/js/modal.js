// MODAL

const modal = document.getElementById("modal");
const closeModal = document.getElementById("modal-close");
const add = document.getElementById("btn-add");

add.addEventListener("click", (event) => {
  event.preventDefault();
  modal.classList.add("active");
});

closeModal.addEventListener("click", () => {
  modal.classList.remove("active");
});