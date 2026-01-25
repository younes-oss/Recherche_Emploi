const formConnexion = document.getElementById('formConnexion');

formConnexion.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(formConnexion);

    try {
        const response = await fetch('http://localhost/Recherche_Emploi/view/auth/loginUser', {
            method: 'post',
            body: formData
        });

        const data = await response.json();

        showAlert(data.message, data.type);

        if (data.type === 'success' && data.redirect) {
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 800);
        }

    } catch (err) {
        showAlert('Erreur serveur', 'error');
        console.error('Erreur fetch :', err);
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