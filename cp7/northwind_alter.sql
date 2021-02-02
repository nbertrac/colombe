use northwind
;

ALTER TABLE categories
	-- MODIFY column code_categorie DECIMAL(6,0) auto_increment,
    add PHOTO BLOB
;

select * from categories;