<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CareerLink | Créer un compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="..\..\public\css\auth\style_register.css">
    <link rel="stylesheet" href="..\..\public\css\auth\all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <section class="page-inscription">
        <div class="carte-inscription">
            <form class="formulaire-inscription" id="formInscription" method="post">
                
                <h1 class="titre-inscription">S'inscrire</h1>
                <p class="sous-titre">Rejoignez la communauté CareerLink dès aujourd'hui.</p>

                <div class="groupe-champ">
                    <label for="nomComplet">Nom complet</label>
                    <div class="champ-icone">
                        <i class="fa-regular fa-user icone"></i>
                        <input type="text" id="nomComplet" name="nomComplet" placeholder="Ex: Jean Dupont" required>
                    </div>
                </div>

                <div class="groupe-champ">
                    <label for="nomUtilisateur">Nom d'utilisateur</label>
                    <div class="champ-icone">
                        <i class="fa-regular fa-circle-user icone"></i>
                        <input type="text" id="nomUtilisateur" name="nomUtilisateur" placeholder="jdupont2026" required>
                    </div>
                </div>

                <div class="groupe-champ">
                    <label for="motDePasse">Mot de passe</label>
                    <div class="champ-icone">
                        <i class="fa-solid fa-lock icone"></i>
                        <input type="password" id="motDePasse" name="motDePasse" placeholder="Minimum 8 caractères" required>
                    </div>
                </div>

                <div class="groupe-champ">
                    <label for="confirmationMotDePasse">Confirmer le mot de passe</label>
                    <div class="champ-icone">
                        <i class="fa-solid fa-shield-check icone"></i>
                        <input type="password" id="confirmationMotDePasse" name="confirmationMotDePasse" placeholder="Répétez le mot de passe" required>
                    </div>
                </div>

                <div class="groupe-champ">
                    <label>Vous êtes ?</label>
                    <div class="champ-icone">
                        <i class="fa-solid fa-user-tag icone"></i>
                        <select name="role" required>
                            <option value="" disabled selected>Choisir votre profil</option>
                            <option value="candidate">Candidat (Je cherche un job)</option>
                            <option value="company">Entreprise (Je recrute)</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="bouton-principal">Accepter et s'inscrire</button>

                <p class="texte-connexion">
                    Déjà sur CareerLink ?
                    <a href="login.php">Se connecter</a>
                </p>
            </form>
        </div>
    </section>

</body>
</html>