
const roleSelector = document.getElementById('roleSelector');
const secRecruteur = document.getElementById('sectionRecruteur');
const secCandidat = document.getElementById('sectionCandidat');
const formInscription = document.getElementById('formInscription');
const skillInput = document.getElementById('skillInput');
const addSkillBtn = document.getElementById('addSkill');
const skillsContainer = document.getElementById('skillsContainer');

roleSelector.addEventListener('change', (e) => {
    if (e.target.value === 'recruteur') {
        secRecruteur.style.display = 'block';
        secCandidat.style.display = 'none';
    } else {
        secRecruteur.style.display = 'none';
        secCandidat.style.display = 'block';
    }
});

const addExpBtn = document.getElementById('addExperience');
const expList = document.getElementById('experienceList');

let experiences = [];

addExpBtn.addEventListener('click', () => {
    const item = document.createElement('div');
    item.className = 'experience-item';

    item.innerHTML = `
        <i class="fa-solid fa-x remove-exp"></i>
        <input type="text" placeholder="Entreprise / Établissement" class="exp-entreprise" required>
        <input type="text" placeholder="Poste / Diplôme" class="exp-poste" required>
        <input type="text" placeholder="Période (ex: 2022 - 2024)" class="exp-date" required>
    `;

    expList.appendChild(item);

    item.querySelector('.remove-exp').addEventListener('click', () => {
        const index = [...expList.children].indexOf(item);
        experiences.splice(index, 1);
        item.remove();
    });
});

function collectExperiences() {
    experiences = [];

    document.querySelectorAll('.experience-item').forEach(item => {
        experiences.push({
            entreprise: item.querySelector('.exp-entreprise').value,
            poste: item.querySelector('.exp-poste').value,
            date: item.querySelector('.exp-date').value
        });
    });
}


let skills = [];

addSkillBtn.addEventListener('click', () => {
    const value = skillInput.value.trim();
    if (value && !skills.includes(value)) {
        skills.push(value);

        const tag = document.createElement('div');
        tag.className = 'tag';
        tag.innerHTML = `<span>${value}</span><i class="fa-solid fa-circle-xmark"></i>`;
        skillsContainer.appendChild(tag);

        skillInput.value = '';

        tag.querySelector('i').addEventListener('click', () => {
            skills = skills.filter(s => s !== value);
            tag.remove();
        });
    }
});


formInscription.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const role = formData.get('role');
    if (role === 'candidat') {
        formData.append('skills', JSON.stringify(skills || []));
        formData.append('experiences', JSON.stringify(experiences || []));
    }

    try {
        const response = await fetch('http://localhost/Recherche_Emploi/view/auth/registerUser', {
            method: 'post',
            body: formData
        });

        const data = await response.json();
        console.log(data);
        showAlert(data.message, data.type);

        if (data.type === 'success' && data.redirect) {
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 800);
        }

    } catch (error) {
        console.error('erreur ajax :', error);
        // alert('erreur serveur');
    }
});


function showAlert(message, type) {
    const oldAlert = document.querySelector('.alert');
    if (oldAlert) oldAlert.remove();

    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.textContent = message;
    document.body.prepend(alertDiv);

    setTimeout(() => {
        alertDiv.style.opacity = '0';
        setTimeout(() => alertDiv.remove(), 500);
    }, 3000);
}
