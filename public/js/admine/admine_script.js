// Switch tabs
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.tab-link').forEach(btn => btn.classList.remove('active'));
    
    document.getElementById('section-' + tabId).classList.add('active');
    event.currentTarget.classList.add('active');
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
        if(confirm("Voulez-vous vraiment archiver cette offre ?")) {
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
    e.target.closest('.modal').style.display = 'none';
});

document.getElementById('formTag').addEventListener('submit', (e) => {
    e.preventDefault();
    alert("Tag ajouté !");
    e.target.closest('.modal').style.display = 'none';
});