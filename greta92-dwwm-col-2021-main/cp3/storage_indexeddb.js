/**
 * Utilise l'objet IndexedDB pour stocker les données
 * du formulaire sous forme d'objets
 */
if (document.getElementById('saveIndexedDB')) {
    document.getElementById('saveIndexedDB').addEventListener(
        'click',
        function () {
            // Si IDB est supporté
            if (window.indexedDB) {
                // Ouvre la BDD
                let oIDB = window.indexedDB;
                let oCnn = oIDB.open('Darons-Coders', 1);

                // Définit la structure si besoin : 
                // 1er passage seulement
                oCnn.addEventListener(
                    'upgradeneeded',
                    function () {
                        // Connexion à la BDD
                        let oDb = oCnn.result;
                        // Crée ObjectStore si besoin
                        if (!oDb.objectStoreNames.contains('Repertoire')) {
                            let oStore = oDb.createObjectStore('Repertoire', { autoIncrement: true });
                            let oIdx = oStore.createIndex('IndexZip', ['zip']);
                        }
                    },
                    false
                );

                // Si connexion OK
                oCnn.addEventListener(
                    'success',
                    function () {
                        // Connexion à la BDD
                        let oDb = oCnn.result;
                        // Démarre une transaction
                        let oTx = oDb.transaction(['Repertoire'], 'readwrite');
                        // Ouvre l'ObjectStore
                        let oStore = oTx.objectStore('Repertoire');
                        // Sauvegarde les données du formulaire
                        let aElements = document.querySelectorAll('form [name]');
                        let oData = {};
                        for (let i = 0; i < aElements.length; i++) {
                            oData[aElements[i].name] = aElements[i].value;
                        }
                        // Stocke l'objet
                        let oReq = oStore.put(oData);

                        // Si stockage OK
                        oReq.addEventListener(
                            'success',
                            function () {
                                alert('Stockage IDB terminé avec succès');
                            },
                            false
                        );

                        // Si stockage KO
                        oReq.addEventListener(
                            'error',
                            function (oErr) {
                                alert('Erreur IDB : ' + oErr);
                            },
                            false
                        );

                        // Si transaction finie
                        oTx.addEventListener(
                            'complete',
                            function () {
                                oDb.close();
                            },
                            false
                        );
                    },
                    false
                );

                // Si connexion KO
                oCnn.addEventListener(
                    'error',
                    function () {
                        alert('Erreur de connexion IDB');
                    },
                    false
                );
            } else {
                alert('IDB non supporté sur ce browser');
            }
        },
        false
    );
}

/**
 * Utilise l'objet IndexedDB pour parcourir l'object store
 * et afficher son contenu dans un tableau HTML
 */
if (document.getElementById('readIndexedDB')) {
    document.getElementById('readIndexedDB').addEventListener(
        'click',
        function () {
            // Si IDB supporté
            if (window.indexedDB) {
                // Ouvre BDD
                let oCnn = window.indexedDB.open('Darons-Coders', 1);

                // Si ouverture KO
                oCnn.addEventListener(
                    'error',
                    function (evt) {
                        alert('Erreur : ' + evt);
                    },
                    false
                );

                // Si ouverture OK
                oCnn.addEventListener(
                    'success',
                    function () {
                        let oDB = oCnn.result;
                        let oTx = oDB.transaction(['Repertoire'], 'readonly');
                        let oStore = oTx.objectStore('Repertoire');
                        let oReq = oStore.openCursor();

                        // Si ouverture curseur KO
                        oReq.addEventListener(
                            'error',
                            function (evt) {
                                alert('Erreur : ' + evt);
                            },
                            false
                        );

                        // Si ouverture curseur OK
                        oReq.addEventListener(
                            'success',
                            function (evt) {
                                let oRow, oCell;
                                let oCursor = evt.target.result;
                                if (oCursor) {
                                    oRow = document.createElement('tr');
                                    oCell = document.createElement('td');
                                    oCell.textContent = oCursor.primaryKey;
                                    oRow.appendChild(oCell);
                                    oCell = document.createElement('td');
                                    oCell.textContent = JSON.stringify(oCursor.value);
                                    oRow.appendChild(oCell);
                                    document.getElementById('tblIndexedDB').appendChild(oRow);
                                    oCursor.continue();
                                }
                            },
                            false
                        );

                        // Si transaction finie
                        oTx.addEventListener(
                            'complete',
                            function () {
                                oDB.close();
                            },
                            false
                        );
                    },
                    false
                );
            }
        },
        false
    );
}