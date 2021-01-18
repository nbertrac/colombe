-- Challenge 1 : Liste des employés (titre, prénom, nom) concaténés, âge et salaire(salaire + commission
select * from employes;
SELECT concat(TITRE, '   ', PRENOM, '   ', NOM) as employee, floor(datediff(now(), date_naissance)/365.25) as âge, (SALAIRE+coalesce(COMMISSION, 0)) as salaires from employes;

-- Challenge 2 : nom, prix unitaire et unites en stock des produits dont le code fournisseur n'est pas 1 ou 3 ou 5 et dont la quantité contient 'carton' ou 'bouteille' OU
-- des produit dont le code catégorie est un multiple de 2 et soit disponible
select nom_produit, prix_unitaire, coalesce(unites_stock,0) as unites_stock from produits where (no_fournisseur not in(1, 3, 5) and (quantite like'%carton%' or quantite like'%bouteille%')) or (mod(code_categorie,2)=0  and indisponible=0);

-- Challenge 3 : combien y a t-il de produits valant moin de 50 EUR qui sont livrés en bouteille

select * from produits where prix_unitaire < 50 and quantite like '%bouteille%';

-- Challenge 4 : afficher le nom des produits, leur catégorie et le nom du fournisseur pour les produits valant plus de 25 EUR et provenant d'Italie, de France et d'Allemagne
select nom_produit, nom_categorie, societe  from produits, categories, fournisseurs where prix_unitaire > 25 and pays in('Italie', 'France', 'Allemagne');