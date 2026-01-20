<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLink | Tableau de Bord Candidat</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="..\..\public\css\candidate\candidate_style.css">
</head>
<body>

    <header class="entete-principale">
        <div class="conteneur d-flex-align">
            <div class="logo-plateforme">
                <i class="fas fa-bullseye"></i> Career<span>Link</span>
            </div>
            
            <nav class="navigation-centrale">
                <a href="#" class="lien-nav active">Home</a>
                <a href="#" class="lien-nav">Messages <span class="pastille-rouge"></span></a>
                <a href="#" class="lien-nav">About us</a>
                <a href="#" class="lien-nav select-job">Jobs</a>
                <a href="#" class="lien-nav">Community</a>
            </nav>

            <div class="actions-utilisateur">
                <button class="btn-icon"><i class="fas fa-cog"></i></button>
                <button class="btn-icon"><i class="fas fa-bell"></i></button>
                <div class="avatar-utilisateur">
                    <img src="https://ui-avatars.com/api/?name=User+Candidat&background=random" alt="User">
                </div>
            </div>
        </div>
    </header>

    <main class="zone-contenu conteneur">

        <div class="titre-recommandation">
            <span>👉</span> Vous êtes un bon profil pour ces offres similaires
        </div>

        <section class="grille-offres">
            
            <article class="carte-job shadow-sm">
                <div class="entete-carte">
                    <div class="info-entreprise">
                        <img src="https://i.pinimg.com/564x/63/a2/31/63a231592efca78f2bcbc02267eb37be.jpg" alt="Logo" class="logo-ent">
                        <span class="nom-ent">Atlassian Inc.</span>
                    </div>
                </div>
                <div class="tags-wrapper">
                    <span class="badge-tag orange">Direct hire</span>
                    <span class="badge-tag violet">Design / Product Designer</span>
                </div>
                <h2 class="titre-poste">Sr Product Designer</h2>
                <div class="salaire-info">$100 – $115/hr</div>
                <ul class="liste-details">
                    <li><i class="fas fa-map-marker-alt"></i> Work from anywhere</li>
                    <li><i class="fas fa-clock"></i> Work anytime</li>
                    <li><i class="fas fa-calendar-check"></i> Full time | 40 hours per week</li>
                    <li><i class="fas fa-history"></i> Long term</li>
                </ul>
                <div class="bas-carte">
                    <button class="btn-fav"><i class="far fa-star"></i></button>
                    <button class="btn-action-job" onclick="voirDetails(101)">View job ↗</button>
                </div>
            </article>

            <article class="carte-job shadow-sm">
                <div class="entete-carte">
                    <div class="info-entreprise">
                        <img src="https://i.pinimg.com/564x/63/a2/31/63a231592efca78f2bcbc02267eb37be.jpg" alt="Logo" class="logo-ent">
                        <span class="nom-ent">Wayfair</span>
                    </div>
                </div>
                <div class="tags-wrapper">
                    <span class="badge-tag jaune">Freelance</span>
                    <span class="badge-tag violet">Design / Product Designer</span>
                </div>
                <h2 class="titre-poste">Product Design Lead</h2>
                <div class="salaire-info">$100 – $130/hr</div>
                <ul class="liste-details">
                    <li><i class="fas fa-map-marker-alt"></i> Work from anywhere</li>
                    <li><i class="fas fa-globe"></i> EST | Full day overlap</li>
                    <li><i class="fas fa-calendar-check"></i> Full time | 40 hours per week</li>
                    <li><i class="fas fa-history"></i> Long term</li>
                </ul>
                <div class="bas-carte">
                    <button class="btn-fav"><i class="far fa-star"></i></button>
                    <button class="btn-action-job" onclick="voirDetails(102)">View job ↗</button>
                </div>
            </article>

            <article class="carte-job shadow-sm">
                <div class="entete-carte">
                    <div class="info-entreprise">
                        <img src="https://i.pinimg.com/564x/63/a2/31/63a231592efca78f2bcbc02267eb37be.jpg" alt="Logo" class="logo-ent">
                        <span class="nom-ent">Wayfair</span>
                    </div>
                </div>
                <div class="tags-wrapper">
                    <span class="badge-tag jaune">Freelance</span>
                    <span class="badge-tag violet">Design / Product Designer</span>
                </div>
                <h2 class="titre-poste">Product Design Lead</h2>
                <div class="salaire-info">$100 – $130/hr</div>
                <ul class="liste-details">
                    <li><i class="fas fa-map-marker-alt"></i> Work from anywhere</li>
                    <li><i class="fas fa-globe"></i> EST | Full day overlap</li>
                    <li><i class="fas fa-calendar-check"></i> Full time | 40 hours per week</li>
                    <li><i class="fas fa-history"></i> Long term</li>
                </ul>
                <div class="bas-carte">
                    <button class="btn-fav"><i class="far fa-star"></i></button>
                    <button class="btn-action-job" onclick="voirDetails(102)">View job ↗</button>
                </div>
            </article>

            <article class="carte-job shadow-sm">
                <div class="entete-carte">
                    <div class="info-entreprise">
                        <img src="https://i.pinimg.com/564x/63/a2/31/63a231592efca78f2bcbc02267eb37be.jpg" alt="Logo" class="logo-ent">
                        <span class="nom-ent">Wayfair</span>
                    </div>
                </div>
                <div class="tags-wrapper">
                    <span class="badge-tag jaune">Freelance</span>
                    <span class="badge-tag violet">Design / Product Designer</span>
                </div>
                <h2 class="titre-poste">Product Design Lead</h2>
                <div class="salaire-info">$100 – $130/hr</div>
                <ul class="liste-details">
                    <li><i class="fas fa-map-marker-alt"></i> Work from anywhere</li>
                    <li><i class="fas fa-globe"></i> EST | Full day overlap</li>
                    <li><i class="fas fa-calendar-check"></i> Full time | 40 hours per week</li>
                    <li><i class="fas fa-history"></i> Long term</li>
                </ul>
                <div class="bas-carte">
                    <button class="btn-fav"><i class="far fa-star"></i></button>
                    <button class="btn-action-job" onclick="voirDetails(102)">View job ↗</button>
                </div>
            </article>

            <article class="carte-job shadow-sm">
                <div class="entete-carte">
                    <div class="info-entreprise">
                        <img src="https://i.pinimg.com/564x/63/a2/31/63a231592efca78f2bcbc02267eb37be.jpg" alt="Logo" class="logo-ent">
                        <span class="nom-ent">Wayfair</span>
                    </div>
                </div>
                <div class="tags-wrapper">
                    <span class="badge-tag jaune">Freelance</span>
                    <span class="badge-tag violet">Design / Product Designer</span>
                </div>
                <h2 class="titre-poste">Product Design Lead</h2>
                <div class="salaire-info">$100 – $130/hr</div>
                <ul class="liste-details">
                    <li><i class="fas fa-map-marker-alt"></i> Work from anywhere</li>
                    <li><i class="fas fa-globe"></i> EST | Full day overlap</li>
                    <li><i class="fas fa-calendar-check"></i> Full time | 40 hours per week</li>
                    <li><i class="fas fa-history"></i> Long term</li>
                </ul>
                <div class="bas-carte">
                    <button class="btn-fav"><i class="far fa-star"></i></button>
                    <button class="btn-action-job" onclick="voirDetails(102)">View job ↗</button>
                </div>
            </article>

            <article class="carte-job shadow-sm">
                <div class="entete-carte">
                    <div class="info-entreprise">
                        <img src="https://i.pinimg.com/564x/63/a2/31/63a231592efca78f2bcbc02267eb37be.jpg" alt="Logo" class="logo-ent">
                        <span class="nom-ent">Wayfair</span>
                    </div>
                </div>
                <div class="tags-wrapper">
                    <span class="badge-tag jaune">Freelance</span>
                    <span class="badge-tag violet">Design / Product Designer</span>
                </div>
                <h2 class="titre-poste">Product Design Lead</h2>
                <div class="salaire-info">$100 – $130/hr</div>
                <ul class="liste-details">
                    <li><i class="fas fa-map-marker-alt"></i> Work from anywhere</li>
                    <li><i class="fas fa-globe"></i> EST | Full day overlap</li>
                    <li><i class="fas fa-calendar-check"></i> Full time | 40 hours per week</li>
                    <li><i class="fas fa-history"></i> Long term</li>
                </ul>
                <div class="bas-carte">
                    <button class="btn-fav"><i class="far fa-star"></i></button>
                    <button class="btn-action-job" onclick="voirDetails(102)">View job ↗</button>
                </div>
            </article>


        </section>
    </main>

    <script src="main.js"></script>
</body>
</html>