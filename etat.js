 // Fonction pour afficher les icônes de validation et de refus en fonction de l'état enregistré
    function afficherEtatIcones() {
        var tableRows = document.querySelectorAll('.table-data');

        tableRows.forEach(function(row) {
            var etatCell = row.cells[row.cells.length - 1];
            var etat = localStorage.getItem('etat_' + row.cells[0].innerText); // Utilisez une clé unique pour chaque ligne
            if (etat === 'validerrr') {
                var checkIcon = document.createElement('i');
                checkIcon.classList.add('fas', 'fa-check');
                checkIcon.style.color = 'green';
                etatCell.appendChild(checkIcon);
            } else if (etat === 'refus') {
                var crossIcon = document.createElement('i');
                crossIcon.classList.add('fas', 'fa-times');
                crossIcon.style.color = 'red';
                etatCell.appendChild(crossIcon);
            }
        });
    }

    // Appel de la fonction au chargement de la page
   
    window.addEventListener('load', afficherEtatIcones);

    function refuserProjet(button) {
        var emailEtud1 = button.parentElement.parentElement.cells[4].innerText;
        var emailEtud2 = button.parentElement.parentElement.cells[5].innerText;
    
        // Envoyer un e-mail de refus aux adresses e-mail des deux étudiants
        var formData = new FormData();
        formData.append('email_etud1', emailEtud1);
        formData.append('email_etud2', emailEtud2);
        formData.append('avis', 'refus');
    
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
                if (data.success) {
                    // Afficher l'icône de croix rouge
                    var row = button.parentElement.parentElement;
                    var etatCell = row.cells[row.cells.length - 1];
                    var checkIcon = etatCell.querySelector('.fa-check');
                    var crossIcon = etatCell.querySelector('.fa-times');
    
                    afficherMessageRefusEnvoye();
    
                    if (!crossIcon) {
                        crossIcon = document.createElement('i');
                        crossIcon.classList.add('fas', 'fa-times');
                        crossIcon.style.color = 'red';
                        etatCell.appendChild(crossIcon);
                    }
    
                    crossIcon.style.display = 'inline';
    
                    if (checkIcon) {
                        checkIcon.style.display = 'none';
                    }
    
                    // Enregistrement de l'état de refus dans le stockage local
                    localStorage.setItem('etat_' + row.cells[0].innerText, 'refus');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    }
    // Après avoir créé et affiché l'icône rouge
localStorage.setItem('refus_' + row.cells[0].innerText, 'true');

// Lors du chargement de la page
window.onload = function() {
    var rows = document.querySelectorAll('table tr');
    rows.forEach(function(row) {
        var idProjet = row.cells[0].innerText;
        if (localStorage.getItem('refus_' + idProjet) === 'true') {
            var etatCell = row.cells[row.cells.length - 1];
            var crossIcon = etatCell.querySelector('.fa-times');
            if (!crossIcon) {
                crossIcon = document.createElement('i');
                crossIcon.classList.add('fas', 'fa-times');
                crossIcon.style.color = 'red';
                etatCell.appendChild(crossIcon);
            }
            crossIcon.style.display = 'inline';
        }
    });
};
// Appelez cette fonction pour afficher les icônes de validation et de refus lorsque vous le souhaitez

    function showRefusForm(button) {
        var idProjet = button.parentNode.parentNode.querySelector('td:first-child').innerText;
        var emailEtud1 = button.parentNode.parentNode.querySelector('td:nth-child(5)').innerText;
        var emailEtud2 = button.parentNode.parentNode.querySelector('td:nth-child(6)').innerText;

        document.getElementById("idProjetRefus").value = idProjet;
        document.getElementById("emailEtud1").value = emailEtud1;
        document.getElementById("emailEtud2").value = emailEtud2;

        document.getElementById("refusForm").style.display = "block";

        var croixIcon = button.parentNode.parentNode.querySelector('.fa-times');
        if (croixIcon) {
            croixIcon.style.display = "inline"; // Afficher l'icône de croix rouge
        }
    }

    function closeRefusForm() {
        document.getElementById("refusForm").style.display = "none";
    }

    function afficherMessageRefusEnvoye() {
        alert("E-mail de refus envoyé avec succès");
        
    }

    function afficherMessageValidation() {
        alert("Étudiants validés avec succès !");
    }

    
    function validerProjet(button) {
        var emailEtud1 = button.parentElement.parentElement.cells[4].innerText;
        var emailEtud2 = button.parentElement.parentElement.cells[5].innerText;
    
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
                if (data.success) {
                    // Afficher l'icône de check vert
                    var row = button.parentElement.parentElement;
                    var etatCell = row.cells[row.cells.length - 1];
                    var checkIcon = etatCell.querySelector('.fa-check');
                    var crossIcon = etatCell.querySelector('.fa-times');
    
                    afficherMessageValidation();
    
                    if (!checkIcon) {
                        checkIcon = document.createElement('i');
                        checkIcon.classList.add('fas', 'fa-check');
                        checkIcon.style.color = 'green';
                        etatCell.appendChild(checkIcon);
                    }
    
                    checkIcon.style.display = 'inline';
    
                    if (crossIcon) {
                        crossIcon.style.display = 'none';
                    }
    
                    // Enregistrement de l'état de validation dans le stockage local
                    localStorage.setItem('etat_' + row.cells[0].innerText, 'validerrr');
    
                    // Mettre à jour l'état du projet dans la base de données
                    updateEtatProjet(row.cells[0].innerText, 'validé');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    }
    

    function extraireExcel() {
        var data = [
            ["Titre du Projet", "Nom Etudiant 1", "Nom Etudiant 2", "État"]
        ];

        var tableRows = document.querySelectorAll('.table-data');

        tableRows.forEach(function(row) {
            var rowData = [
                row.cells[6].innerText, // Titre du Projet
                row.cells[0].innerText, // Nom Binôme 1
                row.cells[1].innerText, // Nom Binôme 2
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