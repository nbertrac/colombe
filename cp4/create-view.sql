use friends;

-- Affiche liste des contacts avec leur ville de résidence
select prenom, nom from contacts c inner join villes v using (cp);

-- Nombre de contacts par ville
select v.nom, count(c.id) from villes v join contacts c on v.cp=c.cp group by v.nom having count(id) > 1 and v.nom NOT LIKE '%a%';

-- Liste des contacts Parisiens IM
SELECT c.prenom, v.nom
from villes v join contacts c on c.cp=v.cp
where v.cp like '75%';

-- Liste des contacts Parisiens GC
SELECT c.prenom, v.nom
from villes v join contacts c on c.cp=v.cp
where substr(v.cp, 1, 2) in ('77','78','91','92','93','94','95');

-- Création objet VIEW = liste des contact Parisien GC
CREATE OR REPLACE VIEW paris_gc AS SELECT c.prenom, v.nom from villes v join contacts c on c.cp=v.cp