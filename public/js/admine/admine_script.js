// Switch tabs
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.tab-link').forEach(btn => btn.classList.remove('active'));
    document.getElementById('section-' + tabId).classList.add('active');
    event.currentTarget.classList.add('active');

    if (tabId === "categories") {
        const containerCategories = document.getElementById('container-categories');
        if (!containerCategories) {
            console.error('Container #container-categories not found');
            return;
        }

        containerCategories.innerHTML = '';

        fetch("http://localhost/Recherche_Emploi/view/admine/afficherlescatego")
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }
                return res.json();
            })
            .then(data => {
                if (!Array.isArray(data)) {
                    console.error('Data is not an array:', data);
                    return;
                }
                data.forEach(cat => {
                    const span = document.createElement('span');
                    span.classList.add('badge-item');
                    span.dataset.catId = cat.id || '';
                    span.innerHTML = `
                    ${cat.titre || cat['titre'] || 'Unnamed'}
                    <i class="fas fa-times" onclick="deleteCategory(${cat.id || ''})"></i>
                `;
                    containerCategories.appendChild(span);
                });
            })
            .catch(error => {
                console.error('Fetch error:', error);
                containerCategories.innerHTML = '<span class="error">Erreur chargement catégories</span>';
            });
    }
    if (tabId === "tags") {
        const containerTags = document.getElementById('container-tags');
        if (!containerTags) {
            console.error('Container #container-tags not found');
            return;
        }

        containerTags.innerHTML = '';

        fetch("http://localhost/Recherche_Emploi/view/admine/afficherlestag")
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }
                return res.json();
            })
            .then(data => {
                if (!Array.isArray(data)) {
                    console.error('Data is not an array:', data);
                    return;
                }
                data.forEach(tag => {
                    const span = document.createElement('span');
                    span.classList.add('badge-item');
                    span.dataset.tagId = tag.id || '';
                    span.innerHTML = `
                    ${tag.titre || tag['titre'] || 'Unnamed'}
                    <i class="fas fa-times" onclick="deleteCategory(${tag.id || ''})"></i>
                `;
                    containerTags.appendChild(span);
                });
            })
            .catch(error => {
                console.error('Fetch error:', error);
                containerTags.innerHTML = '<span class="error">Erreur chargement Tags</span>';
            });
    }

}

// Modal Logic
document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', () => {
        const modalId = btn.getAttribute('data-modal');
        document.getElementById(modalId).style.display = 'block';
    });
});

document.querySelectorAll('.fermer').forEach(span => {
    span.addEventListener('click', () => {
        span.closest('.modal').style.display = 'none';
    });
});

window.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal')) {
        e.target.style.display = 'none';
    }
});

// Archive Logic
document.querySelectorAll('.btn-archive').forEach(btn => {
    btn.addEventListener('click', () => {
        if (confirm("Voulez-vous vraiment archiver cette offre ?")) {
            btn.closest('.item-admin').style.opacity = '0.5';
            btn.innerHTML = "Archivé";
            btn.disabled = true;
        }
    });
});

// Form Submissions (Simulated)
document.getElementById('formCategory').addEventListener('submit', (e) => {
    e.preventDefault();
    
    alert("Catégorie ajoutée !");
    e.target.closest('.modal').style.display = 'none';})
    

;

document.getElementById('formTag').addEventListener('submit', (e) => {
    e.preventDefault();
    alert("Tag ajouté !");
    e.target.closest('.modal').style.display = 'none';
    
});