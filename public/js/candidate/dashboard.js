/**
 * Logique Front-end du Dashboard
 */

// Fonction pour envoyer une candidature via AJAX
async function envoyerCandidature(idOffre) {
    try {
        console.log(`Initialisation de la candidature pour l'offre: ${idOffre}`);
        
        // Simulation d'une attente serveur
        alert("Envoi de votre candidature en cours...");
        
        // C'est ici que vous utiliserez fetch() pour appeler votre Controller PHP
        // const response = await fetch('postuler.php', { method: 'POST', body: JSON.stringify({id: idOffre}) });
        
        alert("Succès : Votre candidature a été transmise au recruteur.");
    } catch (error) {
        console.error("Erreur lors de la postulation", error);
    }
}

// Gestion dynamique des liens actifs
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', function() {
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
    });
});