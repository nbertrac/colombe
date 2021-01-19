-- Challenge 1 : Liste des employés (titre, prénom, nom) concaténés, âge et salaire(salaire + commission
select * from employes;
SELECT concat(TITRE, '   ', PRENOM, '   ', NOM) as employee, floor(datediff(now(), date_naissance)/365.25) as âge, (SALAIRE+coalesce(COMMISSION, 0)) as salaires from employes;

-- Challenge 2 : nom, prix unitaire et unites en stock des produits dont le code fournisseur n'est pas 1 ou 3 ou 5 et dont la quantité contient 'carton' ou 'bouteille' OU
-- des produit dont le code catégorie est un multiple de 2 et soit disponible
select nom_produit, prix_unitaire, coalesce(unites_stock,0) as unites_stock from produits where (no_fournisseur not in(1, 3, 5) and (quantite like'%carton%' or quantite like'%bouteille%')) or (mod(code_categorie,2)=0  and indisponible=0);

-- Challenge 3 : combien y a t-il de produits valant moin de 50 EUR qui sont livrés en bouteille

select * from produits where prix_unitaire < 50 and quantite like '%bouteille%';

-- Challenge 4 : afficher le nom des produits, leur catégorie et le nom du fournisseur pour les produits valant plus de 25 EUR et provenant d'Italie, de France et d'Allemagne
select nom_produit, nom_categorie, societe  from produits p, categories c, fournisseurs f where (p.no_fournisseur=f.no_fournisseur and p.code_categorie=c.code_categorie) and (prix_unitaire > 25 and pays in('Italie', 'France', 'Allemagne'));
select nom_produit, nom_categorie, societe  from produits p inner join categories c on p.code_categorie=c.code_categorie inner join fournisseurs f on p.no_fournisseur=f.no_fournisseur where prix_unitaire > 25 and pays in('Italie', 'France', 'Allemagne');

-- Challenge 5 : Liste des clients ayant acheté des produits fournis par des sociétés japonaises, novergiennes et brésilliennes
select distinct c.societe from clients c 
inner join commandes on c.code_client=commandes.code_client 
inner join details_commandes d on commandes.no_commande=d.no_commande 
inner join produits p on d.ref_produit=p.ref_produit 
inner join fournisseurs f on p.no_fournisseur=f.no_fournisseur 
where f.pays in('japon','norvège','brésil');

-- Challenge 6 : Qui a réalisé le meilleur CA en 2019
select e.prenom, e.nom, sum(d.prix_unitaire*d.quantite*(1-d.remise)) as ca from employes e 
inner join commandes c on e.no_employe=c.no_employe 
inner join details_commandes d on c.no_commande=d.no_commande 
where year(c.date_commande) = 2019
group by e.prenom, e.nom
order by ca desc
limit 1;

-- challenge 7 : Quel client a payé la plus grosse facture?

select cl.societe, sum(d.prix_unitaire*d.quantite*(1-d.remise))+avg(c.port) as facture from clients cl
inner join commandes c on cl.code_client=c.code_client 
inner join details_commandes d on c.no_commande=d.no_commande 
group by cl.societe
order by facture desc;
