USE northwind
;

-- Stats des ventes : CA annuel par vendeur
SELECT e.no_employe, e.nom, YEAR(c.date_commande) as annee, MONTH(c.date_commande) as mois
FROM employes e
JOIN commandes c
ON e.no_employe=c.no_employe
JOIN details_commandes d
ON c.no_commande = d.no_commande