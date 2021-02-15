-- Création d'un user v1
CREATE USER 'jean'@'localhost'
IDENTIFIED BY 'Neym@r'
;

-- Vérif
select * from mysql.user
;

-- Possibilité de hash
SELECT MD5('secret')
;
SELECT SHA1('secret')
;
SELECT SHA2('secret', 256)
;
-- Ajout d'un SALT
SELECT SHA2(CONCAT(SHA1('secret'), 'licorne'), 256)
;

-- Création d'un user v2
CREATE USER 'karima'@'localhost'
IDENTIFIED BY 'a127bcc947d13b145e343c704377aa2b3b2ee5f160632bd853ce37e0c66dbc7f'
;

-- Change le pass de karima
SET PASSWORD FOR 'karima'@'localhost' = 'waran'
;

-- Lecture pour jean et CRUD pour karima
GRANT SELECT
ON northwind.produits
TO jean@localhost
;

REVOKE ALL PRIVILEGES
ON northwind.produits
FROM jean@localhost
;

DESCRIBE information_schema.tables
;

SHOW GRANTS FOR karima@localhost;

REVOKE INSERT, SELECT, UPDATE, DELETE
ON northwind.*
FROM karima@localhost
;

SELECT table_name
FROM information_schema.tables
where table_schema = 'northwind'
AND table_name LIKE '%commandes%'
;

SELECT CONCAT('GRANT INSERT, SELECT, UPDATE, DELETE ON northwind', table_name,' TO karima@localhost;')
FROM information_schema.tables
where table_schema = 'northwind'
AND table_name LIKE '%commandes%'
;

GRANT INSERT, SELECT, UPDATE, DELETE ON northwind.commandes TO karima@localhost;
GRANT INSERT, SELECT, UPDATE, DELETE ON northwind.details_commandes TO karima@localhost;

GRANT INSERT, SELECT, UPDATE, DELETE
ON northwind.*
TO karima@localhost
;

-- Création des rôles
CREATE ROLE app_read, app_write, app_admin@localhost
;

SELECT *
FROM mysql.user
;

GRANT SELECT
ON northwind.*
TO app_read
;

GRANT INSERT,UPDATE, DELETE
ON northwind.*
TO app_write
;

GRANT ALL PRIVILEGES
ON northwind.*
TO app_admin@localhost
;

GRANT app_read
TO jean@localhost
;

FLUSH privileges
;

SHOW GRANTS FOR app_write
;

SET DEFAULT ROLE app_read
TO jean@localhost
;

-- Retire tous les privilège à un user
REVOKE ALL PRIVILEGES
ON *.*
FROM karima@localhost
;

-- Octroie un ou plusieurs rôles à un user
GRANT app_read, app_write
TO karima@localhost
;

SET DEFAULT ROLE ALL
TO karima@localhost
;