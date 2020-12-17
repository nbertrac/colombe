let Individu = function(lePrenom,leNom){
    this.prenom = lePrenom
    this.nom = leNom
}

function declareInstance(){
    let personne01 = new Individu();
    alert('Instance personne01');
    let personne02 = new Individu();
    alert('Instance personne02');
}

Individu.prototype.direBonjour = function() {
    alert("Bonjour, je suis la méthode de " + this.prenom)
}

function declarePropriete(){
    let personne01 = new Individu('Alice','');
    alert('Propriété de :' +personne01.prenom);
    let personne02 = new Individu('Antoine','');
    alert('Propriété de :' +personne02.prenom);
}

function declareMethode(){
    let personne01 = new Individu('Charlotte');
    personne01.direBonjour();
    let personne02 = new Individu('Jean');
    personne02.direBonjour();
}