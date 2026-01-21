const modal = document.getElementById("modalOffre");
const btnOuvrir = document.getElementById("btnOuvrirModal");
const btnFermer = document.querySelector(".fermer-modal");
const formOffre = document.getElementById("formAjouterOffre");

btnOuvrir.addEventListener("click", () => {
    modal.style.display = "block";
});

btnFermer.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});

formOffre.addEventListener("submit", (e) => {
    e.preventDefault();
    modal.style.display = "none";
    alert("Votre offre a été publiée avec succès !");
});