// scripts.js

// Data nama dan data diri
const data = {
    name: "Sophia Maratu Solihat",
    about: "Ini adalah data diri saya."
};

document.addEventListener("DOMContentLoaded", function () {
    // Tampilkan nama pada halaman Home
    const nameElement = document.getElementById("name");
    if (nameElement) {
        nameElement.textContent = `Hello, ${data.name}`;
    }

    // Tampilkan data diri pada halaman About Us
    const aboutElement = document.getElementById("about");
    if (aboutElement) {
        aboutElement.textContent = data.about;
    }
});
