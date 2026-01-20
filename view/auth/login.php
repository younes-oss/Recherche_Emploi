<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link rel="stylesheet" href="..\..\public\css\auth\style_login.css">
    <!-- <link rel="stylesheet" href="../../../public/assets/css/all.min.css"> -->

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Kranky&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Work+Sans:wght@410&display=swap"
        rel="stylesheet">
</head>

<body>

    <section class="page-connexion">

        <div class="carte-connexion">

            <form class="formulaire-authentification" method="post" id="formConnexion">

                <h1 class="titre-authentification">Connexion</h1>

                <!--Email -->
                <div class="groupe-champ">
                    <label for="identifiant">Email</label>
                    <div class="champ-icone">
                        <i class="fa-regular fa-envelope icone"></i>
                        <input type="email" id="identifiant" name="identifiant" placeholder="Entrez votre email"
                            required>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="groupe-champ">
                    <label for="motDePasse">Mot de passe</label>
                    <div class="champ-icone">
                        <i class="fa-solid fa-lock icone"></i>
                        <input type="password" id="motDePasse" name="motDePasse" placeholder="********" required>
                    </div>
                </div>

                <!-- Bouton -->
                <button type="submit" class="bouton-principal">
                    Se connecter
                </button>

                <!-- Lien inscription -->
                <p class="texte-inscription">
                    Pas encore de compte ?
                    <a href="register.php">Créer un compte</a>
                </p>

            </form>

        </div>

    </section>

</body>

</html>