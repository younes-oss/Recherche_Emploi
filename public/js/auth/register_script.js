document.addEventListener('DOMContentLoaded', () => {
    const roleSelector = document.getElementById('roleSelector');
    const secRecruteur = document.getElementById('sectionRecruteur');
    const secCandidat = document.getElementById('sectionCandidat');

    roleSelector.addEventListener('change', (e) => {
        if (e.target.value === 'company') {
            secRecruteur.style.display = 'block';
            secCandidat.style.display = 'none';
        } else {
            secRecruteur.style.display = 'none';
            secCandidat.style.display = 'block';
        }
    });

    const skillInput = document.getElementById('skillInput');
    const addSkillBtn = document.getElementById('addSkill');
    const skillsContainer = document.getElementById('skillsContainer');

    addSkillBtn.addEventListener('click', () => {
        const value = skillInput.value.trim();
        if (value) {
            const tag = document.createElement('div');
            tag.className = 'tag';
            tag.innerHTML = `<span>${value}</span><i class="fa-solid fa-circle-xmark"></i>`;
            skillsContainer.appendChild(tag);
            skillInput.value = '';

            tag.querySelector('i').addEventListener('click', () => tag.remove());
        }
    });

    const addExpBtn = document.getElementById('addExperience');
    const expList = document.getElementById('experienceList');

    addExpBtn.addEventListener('click', () => {
        const item = document.createElement('div');
        item.className = 'experience-item';
        item.innerHTML = `
            
            <i class="fa-solid fa-x remove-exp"></i>
            <input type="text" name="entreprise[]" placeholder="Entreprise / Établissement" required>
            <input type="text" name="poste[]" placeholder="Poste / Diplôme" required>
            <input type="text" name="date[]" placeholder="Période (ex: 2022 - 2024)" required>
        `;
        expList.appendChild(item);

        item.querySelector('.remove-exp').addEventListener('click', () => item.remove());
    });
});