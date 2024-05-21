<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../styleProfesseur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <title>La Liste de tous les étudiants</title>
</head>

<body>
    <div class="container">
        <h1>La Liste de tous les étudiants</h1>

        <form class="navbar-form navbar-left" role="search" method="post" action="">
            <div class="form-group">
                <input type="text" name="nom_entreprise" class="form-control" placeholder="nom de l'etudiant" style="width: 200px;">
                <button type="submit" class="btn btn-default">Rechercher</button>
            </div>
            <?php if (isset($n)) {
                echo "<h1>il y a $n binomes</h1>";
            } ?>
        </form>
        <?php if (!empty($search_results)) {
            echo "<table class='table' id='example'>
                <thead>
                    <tr class='table-header'>
                        <th>Nom Binôme 1</th>
                        <th>Nom Binôme 2</th>
                        <th>CIN Binôme 1</th>
                        <th>CIN Binôme 2</th>
                        <th hidden>Email Binôme 1</th>
                <th hidden>Email Binôme 2</th>
                        <th>Titre du Projet</th>
                        <th>Nom de l'Entreprise</th>
                        <th>Encadreur Entreprise</th>
                        <th>Encadreur ISET</th>
                        <th>Fiche</th>
                        <th colspan='2' class='text-center'>Decision</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($search_results as $par) {
                    echo "<tr class='table-data'>";
                    echo "<td>" . (isset($par['nom_prenom_etud1']) ? $par['nom_prenom_etud1'] : '') . "</td>";
                    echo "<td>" . (isset($par['nom_prenom_etud2']) ? $par['nom_prenom_etud2'] : '') . "</td>";
                    echo "<td>" . (isset($par['cin_etudiant1']) ? $par['cin_etudiant1'] : '') . "</td>";
                    echo "<td>" . (isset($par['cin_etudiant2']) ? $par['cin_etudiant2'] : '') . "</td>";
                    echo "<td hidden>" . (isset($par['email_etud1']) ? $par['email_etud1'] : '') . "</td>";
            echo "<td hidden>" . (isset($par['eamil_etud2']) ? $par['eamil_etud2'] : '') . "</td>";
                    
                    echo "<td>" . (isset($par['titre']) ? $par['titre'] : '') . "</td>";
                    echo "<td>" . (isset($par['nom_entreprise']) ? $par['nom_entreprise'] : '') . "</td>";
                    echo "<td>" . (isset($par['encadreur_entreprise']) ? $par['encadreur_entreprise'] : '') . "</td>";
                    echo "<td>" . (isset($par['encadreur_iset']) ? $par['encadreur_iset'] : '') . "</td>";
                    echo "<td><a href='#' class='' onclick='voirDetailss(".json_encode($par).")'>Voir</a></td>";



                    echo "<td><button type='button' class='btn' onclick='validerProjet(this)'>Valider</button></td>";
                    echo "<td><button type='button' class='btn' onclick='showRefusForm(this)'>Refuser</button></td>";

                    if($par['etat'] == 'validé'){
                        echo "<td><i class='fas fa-check' style='color: green;'></i></td>";
                    }
                    else if($par['etat'] == 'refusé'){
                        echo "<td><i class='fas fa-times' style='color: red;'></i></td>";
                    }
                    else {
                        echo "<td><i class='fas fa-hourglass' style='color: grey;'></i></td>";
                    }

                    echo "</tr>";
                }
            echo "</tbody></table>";
        } elseif (!empty($l)) {
            echo "<table class='table' id='example'>
                <thead>
                    <tr class='table-header'>
                    <th class='id-projet'>id projet</th>
                        <th>Nom Binôme 1</th>
                        <th>Nom Binôme 2</th>
                        <th>CIN Binôme 1</th>
                        <th>CIN Binôme 2</th>
                        <th>Email Binôme 1</th>
                        <th>Email Binôme 2</th>
                        <th>Titre du Projet</th>
                        <th>Nom de l'Entreprise</th>
                        <th>Encadreur Entreprise</th>
                        <th>Encadreur ISET</th>
                        <th>Fiche</th>
                        <th colspan='2' class='text-center'>Decision</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($l as $par) {
                    echo "<tr class='table-data'>";
                    echo "<td class='id-projet'>" . (isset($par[0]) ? $par[0] : '') . "</td>";
                    echo "<td>" . (isset($par[10]) ? $par[10] : '') . "</td>";
                    echo "<td>" . (isset($par[14]) ? $par[14] : '') . "</td>";
                    echo "<td>" . (isset($par[9]) ? $par[9] : '') . "</td>";
                    echo "<td>" . (isset($par[13]) ? $par[13] : '') . "</td>";
                    echo "<td>" . (isset($par[11]) ? $par[11] : '') . "</td>";
                    echo "<td>" . (isset($par[15]) ? $par[15] : '') . "</td>";
                    echo "<td>" . (isset($par[1]) ? $par[1] : '') . "</td>";
                    echo "<td>" . (isset($par[4]) ? $par[4] : '') . "</td>";
                    echo "<td>" . (isset($par[3]) ? $par[3] : '') . "</td>";
                    echo "<td>" . (isset($par[2]) ? $par[2] : '') . "</td>";
                    echo "<td><a href='#' class='' onclick='voirDetails(".json_encode($par).")'>Voir</a></td>";
                    echo "<td><button type='button' class='btn' onclick='validerProjet(this)'>Valider</button></td>";
                    echo "<td><button type='button' class='btn' onclick='showRefusForm(this)'>Refuser</button></td>";
                    
                    if($par[8] == 'validé'){
                        echo "<td><i class='fas fa-check' style='color: green;'></i></td>";
                    }
                    else if($par[8] == 'refusé'){
                        echo "<td><i class='fas fa-times' style='color: red;'></i></td>";
                    }
                    else {
                        echo "<td><i class='fas fa-hourglass' style='color: grey;'></i></td>";
                    }

                    echo "</tr>";
                }
                echo "</tbody></table>";
        } else {
            echo "Aucun résultat trouvé.";
        }
        ?>
  
        <div id="refusForm" style="display: none;">
            <span class="close-icon" onclick="closeRefusForm()"><i class="fas fa-times"></i></span>
            <h2>Raison de refus</h2>
            <form action="../controller/voirformulaire.php" method="POST">
                <input type="hidden" id="idProjetRefus" name="id_projet">
                <input type="hidden" id="emailEtud1" name="email_etud1">
                <input type="hidden" id="emailEtud2" name="email_etud2">
                <textarea name="raison_refus" id="raisonRefus" cols="30" rows="5"></textarea><br>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="detailsForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cinEtudiant1" class="form-label">CIN Binôme 1</label>
                            <input type="text" class="form-control" id="cinEtudiant1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cinEtudiant2" class="form-label">CIN Binôme 2</label>
                            <input type="text" class="form-control" id="cinEtudiant2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomPrenomEtud1" class="form-label">Nom Binôme 1</label>
                            <input type="text" class="form-control" id="nomPrenomEtud1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nomPrenomEtud2" class="form-label">Nom Binôme 2</label>
                            <input type="text" class="form-control" id="nomPrenomEtud2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="groupe_etudiant1" class="form-label">Groupe Etudiant 1</label>
                            <input type="text" class="form-control" id="groupe_etudiant1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="groupe_etudiant2" class="form-label">Groupe Etudiant 2</label>
                            <input type="text" class="form-control" id="groupe_etudiant2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="emailEtud1" class="form-label">Email Binôme 1</label>
                            <input type="email" class="form-control" id="emailEtude1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="emailEtud2" class="form-label">Email Binôme 2</label>
                            <input type="email" class="form-control" id="emailEtude2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="titreProjet" class="form-label">Titre du Projet</label>
                            <input type="text" class="form-control" id="titreProjet">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nomEntreprise" class="form-label">Nom de l'Entreprise</label>
                            <input type="text" class="form-control" id="nomEntreprise">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="encadreurEntreprise" class="form-label">Encadreur Entreprise</label>
                            <input type="text" class="form-control" id="encadreurEntreprise">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="encadreurIset" class="form-label">Encadreur ISET</label>
                            <input type="text" class="form-control" id="encadreurIset">
                        </div>
                    </div>
                </form>
                <button class="btn btn-primary" onclick="downloadPDF()">Télécharger</button>
            </div>
        </div>
    </div>
</div>


    <script>


       function voirDetails(details) {
     
        document.getElementById('cinEtudiant1').value = details[9] || '';
    document.getElementById('cinEtudiant2').value = details[13] || '';
    document.getElementById('nomPrenomEtud1').value = details[10] || '';
    document.getElementById('nomPrenomEtud2').value = details[14] || '';
   
    document.getElementById('groupe_etudiant1').value = details[12] || '';
    document.getElementById('groupe_etudiant2').value = details[16] || '';
    document.getElementById('emailEtude1').value = details[11] || '';
    document.getElementById('emailEtude2').value = details[15] || '';
    document.getElementById('titreProjet').value = details[1] || '';
    document.getElementById('nomEntreprise').value = details[4] || '';
    document.getElementById('encadreurEntreprise').value = details[3] || '';
    document.getElementById('encadreurIset').value = details[2] || '';

    

    var detailsModal = new bootstrap.Modal(document.getElementById('detailsModal'), {});
    detailsModal.show();
}
    function voirDetailss(details) {
        document.getElementById('cinEtudiant1').value = details.cin_etudiant1 || '';
        document.getElementById('cinEtudiant2').value = details.cin_etudiant2 || '';
        document.getElementById('nomPrenomEtud1').value = details.nom_prenom_etud1 || '';
        document.getElementById('nomPrenomEtud2').value = details.nom_prenom_etud2 || '';
        document.getElementById('groupe_etudiant1').value = details.groupe_etud1 || '';
        document.getElementById('groupe_etudiant2').value = details.groupe_etud2 || '';
        document.getElementById('emailEtude1').value = details.email_etud1 || '';
        document.getElementById('emailEtude2').value = details.eamil_etud2 || '';
        document.getElementById('titreProjet').value = details.titre || '';
        document.getElementById('nomEntreprise').value = details.nom_entreprise || '';
        document.getElementById('encadreurEntreprise').value = details.encadreur_entreprise || '';
        document.getElementById('encadreurIset').value = details.encadreur_iset || '';

        var detailsModal = new bootstrap.Modal(document.getElementById('detailsModal'), {});
        detailsModal.show();
    }



async function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const cinEtudiant1 = document.getElementById('cinEtudiant1').value || '';
    const cinEtudiant2 = document.getElementById('cinEtudiant2').value || '';
    const nomPrenomEtud1 = document.getElementById('nomPrenomEtud1').value || '';
    const nomPrenomEtud2 = document.getElementById('nomPrenomEtud2').value || '';
    const groupe_etudiant1 = document.getElementById('groupe_etudiant1').value || '';
    const groupe_etudiant2 = document.getElementById('groupe_etudiant2').value || '';
    const emailEtude1 = document.getElementById('emailEtude1').value || '';
    const emailEtude2 = document.getElementById('emailEtude2').value || '';
    const titreProjet = document.getElementById('titreProjet').value || '';
    const nomEntreprise = document.getElementById('nomEntreprise').value || '';
    const encadreurEntreprise = document.getElementById('encadreurEntreprise').value || '';
    const encadreurIset = document.getElementById('encadreurIset').value || '';

    doc.setFontSize(16);
    doc.setTextColor(51, 51, 255);
    doc.text('Détails du formulaire', 10, 20);

    doc.setFontSize(12);
    doc.setTextColor(0);
    doc.text(`CIN Binôme 1: ${cinEtudiant1}`, 10, 30);
    doc.text(`CIN Binôme 2: ${cinEtudiant2}`, 10, 40);
    doc.text(`Nom Binôme 1: ${nomPrenomEtud1}`, 10, 50);
    doc.text(`Nom Binôme 2: ${nomPrenomEtud2}`, 10, 60);
    doc.text(`Groupe Etudiant 1: ${groupe_etudiant1}`, 10, 70);
    doc.text(`Groupe Etudiant 2: ${groupe_etudiant2}`, 10, 80);
    doc.text(`Email Binôme 1: ${emailEtude1}`, 10, 90);
    doc.text(`Email Binôme 2: ${emailEtude2}`, 10, 100);
    doc.text(`Titre du Projet: ${titreProjet}`, 10, 110);
    doc.text(`Nom de l'Entreprise: ${nomEntreprise}`, 10, 120);
    doc.text(`Encadreur Entreprise: ${encadreurEntreprise}`, 10, 130);
    doc.text(`Encadreur ISET: ${encadreurIset}`, 10, 140);

    const fileName = `${nomPrenomEtud1.replace(/ /g, '_')}_${nomPrenomEtud2.replace(/ /g, '_')}.pdf`;
    doc.save(fileName);
}



    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src ="../etat.js"></script>
</body>

</html>
