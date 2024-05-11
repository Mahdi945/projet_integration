// Fonction pour afficher les icônes de validation et de refus en fonction de l'état enregistré
function afficherEtatIcones() {
    var tableRows = document.querySelectorAll('.table-data');

    tableRows.forEach(function(row) {
        var etatCell = row.cells[row.cells.length - 1];
        var etat = localStorage.getItem('etat_' + row.cells[0].innerText); // Utilisez une clé unique pour chaque ligne
    });
}

// Appel de la fonction au chargement de la page
window.addEventListener('load', afficherEtatIcones);

function afficherMessageRefusEnvoye() {
    alert("E-mail de refus envoyé avec succès");
}


 

function showRefusForm(button) {
    var idProjet = button.parentNode.parentNode.querySelector('td:first-child').innerText;
    console.log(idProjet)
    var emailEtud1 = button.parentNode.parentNode.querySelector('td:nth-child(6)').innerText;
    var emailEtud2 = button.parentNode.parentNode.querySelector('td:nth-child(7)').innerText;

    document.getElementById("idProjetRefus").value = idProjet;
    document.getElementById("emailEtud1").value = emailEtud1;
    document.getElementById("emailEtud2").value = emailEtud2;

    document.getElementById("refusForm").style.display = "block";
    updateEtatProjet(idProjet, 'refusé'); // Déplacer cette ligne ici
}

function closeRefusForm() {
    document.getElementById("refusForm").style.display = "none";
}

function afficherMessageValidation() {
    alert("Étudiants validés avec succès !");
}

function validerProjet(button) {
    var idProjet = button.parentElement.parentElement.cells[0].innerText; // Récupérer l'id du projet
    var emailEtud1 = button.parentElement.parentElement.cells[5].innerText;
    var emailEtud2 = button.parentElement.parentElement.cells[6].innerText;

    // Envoyer un e-mail de validation aux adresses e-mail des deux étudiants
    var formData = new FormData();
    formData.append('email_etud1', emailEtud1);
    formData.append('email_etud2', emailEtud2);
    formData.append('avis', 'valider');

    fetch('../controller/voirformulaire.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur lors de la requête');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Ajoutez cette ligne pour voir la réponse du serveur
            if (data.success) {
                afficherMessageValidation();
                // Mettre à jour l'état du projet dans la base de données
                updateEtatProjet(idProjet, 'validé'); // Utiliser l'id du projet au lieu de l'email
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
}

function updateEtatProjet(idProjet, etat) {
    var formData = new FormData();
    formData.append('id_projet', idProjet); // Utiliser l'id du projet au lieu de l'email
    formData.append('etat', etat);

    fetch('../controller/updateEtatProjet.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur lors de la requête');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            console.log('Etat du projet mis à jour avec succès');
        } else {
            console.log('Erreur lors de la mise à jour de l\'état du projet');
        }
    })
    .catch(error => {
        console.error('Erreur:', error.message);
    });
}

function extraireExcel() {
    var data = [
        ["Titre du Projet", "Nom Etudiant 1", "Nom Etudiant 2", "État"]
    ];

    var tableRows = document.querySelectorAll('.table-data');

    tableRows.forEach(function(row) {
        var rowData = [
            row.cells[7].innerText, // Titre du Projet
            row.cells[1].innerText, // Nom Binôme 1
            row.cells[2].innerText, // Nom Binôme 2
            getEtat(row) // État
        ];
        data.push(rowData);
    });

    var today = new Date();
    var dateStr = today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate() +
        " (" + today.getHours() + ":" + today.getMinutes() + ")";

    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.aoa_to_sheet(data);

    XLSX.utils.book_append_sheet(wb, ws, "Liste PFE (" + dateStr + ")");
    XLSX.writeFile(wb, "Liste PFE (" + dateStr + ").xlsx");
}

function getEtat(row) {
var etatCell = row.cells[row.cells.length - 1];
var checkIcon = etatCell.querySelector('.fa-check');
var crossIcon = etatCell.querySelector('.fa-times');

if (checkIcon && getComputedStyle(checkIcon).display !== 'none') {
    return "Validé";
} else if (crossIcon && getComputedStyle(crossIcon).display !== 'none') {
    return "Refusé";
} else {
    return "En attente";
}
}