USE northwind
;

ALTER TABLE categories
	-- MODIFY COLUMN code_categorie DECIMAL(6,0) AUTO_INCREMENT,
    ADD PHOTO BLOB
;

ALTER TABLE categories
	MODIFY COLUMN PHOTO MEDIUMBLOB
;

SELECT *
FROM categories
;