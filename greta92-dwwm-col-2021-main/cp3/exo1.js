/**
 * Branche l'événement LOAD à WINDOW (DOM-2)
 */
window.addEventListener(
    'load',
    function () {
        fillTable();
    },
    false
);

// Ou bien en DOM-0
window.onload = function () {
    fillTable();
};

/**
 * Fonction qui remplit le tableau HTML avec un array
 */
function fillTable() {
    // Vide le TBODY
    document.getElementById('tblBody').innerHTML = '';
    // Pour chaque membre de l'array MEMBERS
    let oRow, oCell;
    let iSum = 0;
    for (let i = 0; i < members.length; i++) {
        // Création du TR
        oRow = document.createElement('tr');
        // Création de la 1ère TD
        oCell = document.createElement('td');
        oCell.textContent = members[i].fname;
        oRow.appendChild(oCell);
        // Création de la 2ème TD
        iSum += members[i].age;
        oCell = document.createElement('td');
        oCell.textContent = members[i].age;
        oCell.contentEditable = true;
        oRow.appendChild(oCell);
        // Création de la 3ème TD
        oCell = document.createElement('td');
        if (members[i].married) {
            // Avec IF
            if (members[i].sex === 'F') {
                oCell.textContent = 'Mariée';
            } else {
                oCell.textContent = 'Marié';
            }
            // Ou avec TERNAIRE
            oCell.textContent = (members[i].sex === 'F' ? 'Mariée' : 'Marié');
        } else {
            oCell.textContent = 'Célibataire';
        }
        oRow.appendChild(oCell);
        // Rattache la TR au TBODY
        document.getElementById('tblBody').appendChild(oRow);
    }
    // Affiche la moyenne des âges
    document.getElementById('avgAge').textContent = (iSum / members.length).toFixed(2);
}