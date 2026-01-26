<?php


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Gestion CareerLink</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="..\..\public\css\admine\admine_style.css">
</head>

<body>

    <header class="entete-principale">
        <div class="conteneur d-flex-align">
            <div class="logo-plateforme"><i class="fas fa-shield-halved"></i> Admin<span>Link</span></div>
            <div class="actions-rapides">
                <button class="btn-action" data-modal="modalCategory"><i class="fas fa-folder-plus"></i> + Catégorie</button>
                <button class="btn-action" data-modal="modalTag"><i class="fas fa-tags"></i> + Tag</button>
            </div>
        </div>
    </header>

    <main class="zone-contenu conteneur">

        <section class="admin-grid">
            <aside class="sidebar-admin">
                <div class="stat-simple">Total Offres: <strong>24</strong></div>
                <nav class="nav-admin">
                    <button class="tab-link active" onclick="switchTab('offres')"><i class="fas fa-briefcase"></i>Toutes les Offres</button>
                    <button class="tab-link" onclick="switchTab('categories')"><i class="fas fa-list"></i>Catégories</button>
                    <button class="tab-link" onclick="switchTab('tags')"><i class="fas fa-hashtag"></i> Tags</button>
                </nav>
            </aside>
            <div class="content-display">
                <div id="section-offres" class="tab-content active">
                    <h2 class="titre-v">Flux des Offres</h2>
                    <div class="liste-lineaire" id="container-offres">
                        <div class="item-admin">
                            <div class="info">
                                <h3>Fullstack Dev</h3>
                                <span>Catégorie: <strong>Development</strong></span>
                            </div>
                            <div class="actions">
                                <button class="btn-archive" title="Archiver"><i class="fas fa-box-archive"></i> Archiver</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="section-categories" class="tab-content">
                    <h2 class="titre-v">Gestion des Catégories</h2>
                    <div class="badges-container" id="container-categories">
                    </div>
                </div>
                <div id="section-tags" class="tab-content">
                    <h2 class="titre-v">Gestion des Tags</h2>
                    <div class="badges-container" id="container-tags">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="modal" id="modalCategory">
        <div class="modal-contenu">
            <div class="modal-header">
                <h3>Nouvelle Catégorie</h3><span class="fermer">&times;</span>
            </div>
            <form id="formCategory" method="post" action="addCategorie">
                <input type="text" name="categorieName" placeholder="Nom de la catégorie (ex: Mobile)" required>
                <button type="submit" class="btn-valider" name="ajouter">Ajouter</button>
            </form>
        </div>
    </div>

    <div class="modal" id="modalTag">
        <div class="modal-contenu">
            <div class="modal-header">
                <h3>Nouveau Tag</h3><span class="fermer">&times;</span>
            </div>
            <form id="formTag" method="post" action="addTag">
                <input type="text" name="TagName" placeholder="Nom du tag (ex: Freelance)" required>
                <button type="submit" name="ajouterTag" class="btn-valider">Ajouter</button>
            </form>
        </div>
    </div>

    <script src="..\..\public\js\admine\admine_script.js"></script>
</body>

</html>