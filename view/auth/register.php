<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>CareerLink | Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\public\css\auth\style_register.css">
    <link rel="stylesheet" href="..\..\public\css\all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <section class="page-inscription">
        <div class="carte-inscription">
            <form class="formulaire-inscription" id="formInscription" method="post" enctype="multipart/form-data">

                <h1 class="titre-inscription">S'inscrire</h1>
                <p class="sous-titre">Rejoignez la communauté CareerLink.</p>

                <div class="groupe-champ">
                    <label>Nom complet</label>
                    <div class="champ-icone">
                        <i class="fa-regular fa-user icone"></i>
                        <input type="text" name="nomComplet" placeholder="Ex: Jean Dupont" >
                    </div>
                </div>

                <div class="groupe-champ">
                    <label>Email</label>
                    <div class="champ-icone">
                        <i class="fa-regular fa-envelope icone"></i>
                        <input type="email" name="email" placeholder="email@exemple.com" >
                    </div>
                </div>

                <div class="groupe-champ">
                    <label>Mot de passe</label>
                    <div class="champ-icone">
                        <i class="fa-solid fa-lock icone"></i>
                        <input type="password" name="motDePasse" placeholder="Entrez votre mot de passe" >
                    </div>
                </div>

                <div class="groupe-champ">
                    <label>Vous êtes ?</label>
                    <div class="champ-icone">
                        <i class="fa-solid fa-user-tag icone"></i>
                        <select name="role" id="roleSelector" >
                            <option value="" disabled selected>Choisir votre profil</option>
                            <option value="candidat">Candidat (Je cherche un job)</option>
                            <option value="recruteur">Entreprise (Je recrute)</option>
                        </select>
                    </div>
                </div>

                <div id="sectionRecruteur" class="dynamic-section">
                    <div class="groupe-champ">
                        <label>Nom de l'entreprise</label>
                        <div class="champ-icone">
                            <i class="fa-solid fa-building icone"></i>
                            <input type="text" name="nomEntreprise" placeholder="Nom de la société">
                        </div>
                    </div>
                    <!-- <div class="groupe-champ">
                        <label>Logo de l'entreprise</label>
                        <div class="upload-container">
                            <input type="file" name="logoFile" id="logoFile" accept="image/*">
                            <label for="logoFile" class="upload-label">
                                <i class="fa-solid fa-cloud-arrow-up"></i> Choisir une image
                            </label>
                            <div id="previewContainer"></div>
                        </div>
                    </div> -->
                </div>

                <div id="sectionCandidat" class="dynamic-section">
                    <div class="groupe-champ">
                        <label>Numéro de téléphone</label>
                        <div class="champ-icone">
                            <i class="fa-solid fa-phone icone"></i>
                            <input type="tel" name="telephone" placeholder="Ex : 06 12 34 56 78">
                        </div>
                    </div>

                    <div class="groupe-champ">
                        <label>Salaire attendu</label>
                        <div class="champ-icone">
                            <i class="fa-solid fa-euro-sign icone"></i>
                            <input type="number" name="salaireAttendu" placeholder="Ex : 3000 €" min="0" step="100">
                        </div>
                    </div>

                    <div class="groupe-champ">
                        <label>Compétences</label>
                        <div class="champ-action">
                            <div class="champ-icone flex-grow">
                                <i class="fa-solid fa-bolt icone"></i>
                                <input type="text" id="skillInput" placeholder="Ex: PHP, Design...">
                            </div>
                            <button type="button" id="addSkill" class="btn-plus">Ajouter</button>
                        </div>
                        <div id="skillsContainer" class="tags-container"></div>
                    </div>

                    <div class="groupe-champ">
                        <label>Parcours professionnel / Études</label>
                        <button type="button" id="addExperience" class="btn-link">+ Ajouter une expérience</button>
                        <div id="experienceList" class="liste-dynamique"></div>
                    </div>
                </div>

                <button type="submit" class="bouton-principal">Créer mon compte</button>
                <p class="texte-connexion">Déjà inscrit ? <a href="login">Se connecter</a></p>
            </form>
        </div>
    </section>



    <script src="..\..\public\js\auth\register_script.js"></script>

</body>

</html>