
SELECT * FROM produse p WHERE p.sters=0;


SELECT * FROM cantina.comenzi_produse cp WHERE cp.id_comanda = 14 GROUP BY id_produs;

SELECT *
FROM cantina.comenzi_produse cp 
LEFT JOIN produse p ON cp.id_produs = p.id
WHERE cp.id_comanda = 14;


UPDATE cantina.ingrediente AS i
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id 
SET
i.qty = i.qty - api.qty
WHERE api.id_produs = 1;

SELECT 
i.id AS ingredient_id, i.nume AS denumire, i.qty AS total_qty, i.um AS total_um, 
api.id AS assoc_prod_ing_id, api.activ_status, api.qty AS prod_ing_qty, api.um AS prod_ing_um
FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id 
WHERE api.id_produs = 1;

SELECT * FROM cantina.ingrediente as i LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id WHERE api.id_produs = 1;
SELECT * FROM cantina.ingrediente as i LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id WHERE api.id_produs = 2;
SELECT * FROM cantina.ingrediente as i LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id WHERE api.id_produs = 3;
SELECT * 

FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id 
WHERE api.id_produs = 4;

select id, (select count(1) from comenzi_produse cp where id_comanda = c.id and id_produs =1) as exista from cantina.comenzi c where trimisa = 0 and id_user = 7;
select id, (select count(1) from comenzi_produse cp where id_comanda = c.id and id_produs =2) as exista from cantina.comenzi c where trimisa = 0 and id_user = 7;
select id, (select count(1) from comenzi_produse cp where id_comanda = c.id and id_produs =4) as exista from cantina.comenzi c where trimisa = 0 and id_user = 7;

SELECT p.*, c.denumire AS categorie, i.nume AS denumire, api.activ_status FROM cantina.produse p
INNER JOIN cantina.categorii AS c ON p.id_categorie = c.id
LEFT OUTER JOIN cantina.produse_ingrediente AS api ON api.id_produs = p.id
INNER JOIN cantina.ingrediente AS i on api.id_ingrediente = i.id
WHERE  sters = 0;

SELECT * FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id;

SELECT * FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id
WHERE api.id_produs = 7;



SELECT * FROM cantina.produse;

SELECT p.* FROM cantina.produse p;

SELECT p.*, c.denumire as categorie FROM cantina.produse p
left join cantina.categorii AS C on p.id_categorie = c.id where  sters = 0;

SHOW COLLATION LIKE 'character_set_name%';


SHOW CHARACTER SET;
SELECT p.*, c.denumire as categorie, i.nume 
FROM cantina.produse p
LEFT JOIN cantina.ingrediente AS i ON i.id_produs = p.id
left join cantina.categorii AS C on p.id_categorie = c.id where  sters = 0;




SELECT p.*, c.denumire AS categorie, i.nume AS denumire, api.activ_status FROM cantina.produse p
INNER JOIN cantina.categorii AS c ON p.id_categorie = c.id
LEFT OUTER JOIN cantina.produse_ingrediente AS api ON api.id_produs = p.id
INNER JOIN cantina.ingrediente AS i on api.id_ingrediente = i.id
WHERE  sters = 0;

SELECT * FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id;


SELECT * FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id
WHERE api.id_produs = 3;

SELECT p.*, c.denumire AS categorie, i.nume AS denumire, api.activ_status FROM cantina.produse p
INNER JOIN cantina.categorii AS c ON p.id_categorie = c.id
LEFT OUTER JOIN cantina.produse_ingrediente AS api ON api.id_produs = p.id
INNER JOIN cantina.ingrediente AS i on api.id_ingrediente = i.id
WHERE  sters = 0;

SELECT * FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id;

SELECT * FROM cantina.ingrediente as i 
LEFT join cantina.produse_ingrediente AS api ON api.id_ingrediente = i.id
WHERE api.id_produs = 3;


SELECT 
  p.*, c.denumire as categorie, p.ingrediente as ingrediente, (
    select count(1) from comenzi_produse cp where id_produs= p.id and id_comanda in 
    (select id from cantina.comenzi where trimisa = 0 and id_user = 7)) as cantitate 
    from cantina.produse p produse_ingrediente
    left join cantina.categorii c on p.id_categorie = c.id where sters = 0;

SELECT * FROM produse p WHERE p.sters=0;

SELECT * FROM produse_ingrediente api;

SELECT * FROM ingrediente i;

SELECT * FROM cantina.comenzi;

SELECT * FROM produse;

SELECT * FROM categorii;
produse