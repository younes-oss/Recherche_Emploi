const modal = document.getElementById("modalOffre");
const btnOuvrir = document.getElementById("btnOuvrirModal");
const btnFermer = document.querySelector(".fermer-modal");
const formOffre = document.getElementById("formAjouterOffre");

btnOuvrir.addEventListener("click", () => {
    loadTagsFromDatabase();
    modal.style.display = "flex";
});

btnFermer.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});



function loadTagsFromDatabase() {
    
    fetch('traiter_offre.php?action=getAllTags')
        .then(response => response.json())
        .then(tags => {
            
            const tagsContainer = document.querySelector('.tags-checkboxes');
            
            
            tagsContainer.innerHTML = '';
            
            
            tags.forEach(tag => {
                const label = document.createElement('label');
                label.innerHTML = `
                    <input type="checkbox" name="tags[]" value="${tag.id}"> 
                    ${tag.titre}
                `;
                tagsContainer.appendChild(label);
            });
        })
        .catch(error => {
            console.error('Erreur:', error);
            
            const tagsContainer = document.querySelector('.tags-checkboxes');
            tagsContainer.innerHTML = '<p>Impossible de charger les tags</p>';
        });
}


document.getElementById("modalOffre").classList.add("active");
