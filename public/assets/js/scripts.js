function afficherParcours(parcours) {
    // Masquez toutes les divs de parcours
    document.getElementById('parcoursPro').style.display = 'none';
    document.getElementById('parcoursEtudiant').style.display = 'none';

    // Affichez la div du parcours sélectionné
    document.getElementById(parcours).style.display = 'block';
}
