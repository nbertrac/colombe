/**
 * Stockage avec l'interface WebSQL
 * Google Chrome, Opera, Safari et le navigateur mobile d'Android seulement
 */
if (document.getElementById('saveSQL')) {
    document.getElementById('saveSQL').addEventListener(
        'click',
        function () {
            if (navigator.userAgent.indexOf('Chrome') > 0) {
                // Récupère les valeurs à stocker
                let aValues = [];
                let aElements = document.querySelectorAll('form [name]');
                for (let i = 0; i < aElements.length; i++) {
                    aValues.push(aElements[i].value);
                }

                // Ecriture avec WebSQL
                var oDb = openDatabase('Darons-Coders', '1.0', 'Stockage WebSQL', 2 * 1024 * 1024);
                oDb.transaction(function (oTx) {
                    oTx.executeSql('CREATE TABLE IF NOT EXISTS repertoire (fname, land, zip, city, dob, age)');
                    oTx.executeSql('INSERT INTO repertoire (fname, land, zip, city, dob, age) VALUES (?,?,?,?,?,?)', aValues);
                });
                alert('Stockage SQL terminé avec succès');
            } else {
                alert('Ce navigateur ne supporte pas Web SQL');
            }
        },
        false
    );
}

/**
 * Lecture d'une BDD Web SQL
 * Google Chrome, Opera, Safari et le navigateur mobile d'Android seulement
 */
if (document.getElementById('readSQL')) {
    document.getElementById('readSQL').addEventListener(
        'click',
        function () {
            if (navigator.userAgent.indexOf('Chrome') > 0) {
                // Lecture avec WebSQL
                document.getElementById('tblSQL').innerHTML = '';
                let oDb = openDatabase('Darons-Coders', '1.0', 'Stockage WebSQL', 2 * 1024 * 1024);
                oDb.transaction(function (oTx) {
                    oTx.executeSql('SELECT * FROM repertoire', [], function (oTx, oData) {
                        let oRow, oCell;
                        for (let i = 0; i < oData.rows.length; i++) {
                            oRow = document.createElement('tr');
                            oCell = document.createElement('td');
                            oCell.textContent = oData.rows.item(i).fname;
                            oRow.appendChild(oCell);
                            oCell = document.createElement('td');
                            oCell.textContent = oData.rows.item(i).land;
                            oRow.appendChild(oCell);
                            oCell = document.createElement('td');
                            oCell.textContent = oData.rows.item(i).zip;
                            oRow.appendChild(oCell);
                            oCell = document.createElement('td');
                            oCell.textContent = oData.rows.item(i).city;
                            oRow.appendChild(oCell);
                            oCell = document.createElement('td');
                            oCell.textContent = oData.rows.item(i).dob;
                            oRow.appendChild(oCell);
                            oCell = document.createElement('td');
                            oCell.textContent = oData.rows.item(i).age;
                            oRow.appendChild(oCell);
                            document.getElementById('tblSQL').appendChild(oRow);
                        }
                    }, null);
                });
            } else {
                alert('Ce navigateur ne supporte pas Web SQL');
            }
        },
        false
    );
}
