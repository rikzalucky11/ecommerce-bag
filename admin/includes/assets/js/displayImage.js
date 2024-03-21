const button = document.querySelector(".img-input");
const image = document.querySelector("#img-input-display");
const input = document.querySelector("#insertFile");

input.addEventListener("change", (event) => {
    var files = event.target.files;
    var fileName = files[0].name;

    image.src = URL.createObjectURL(files[0]);
    image.classList.add("active");
    // button.textContent = fileName; it will display the filename but the problem is the img will not be display
});
