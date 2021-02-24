USE northwind
;

select min(DATE_COMMANDE) , max(DATE_COMMANDE) from commandes;

-- Stats des ventes : CA annuel par vendeur
SELECT e.no_employe, e.nom, YEAR(c.date_commande) as annee, MONTH(c.date_commande) as mois, SUM((d.PRIX_UNITAIRE*d.QUANTITE)*(1-d.remise)) as ca
FROM employes e
JOIN commandes c
ON e.no_employe=c.no_employe
JOIN details_commandes d
ON c.no_commande = d.no_commande
WHERE e.NO_EMPLOYE = 5
AND YEAR(c.date_commande) = 2019
GROUP BY e.NO_EMPLOYE, e.nom, YEAR(c.date_commande), MONTH(c.date_commande)
;