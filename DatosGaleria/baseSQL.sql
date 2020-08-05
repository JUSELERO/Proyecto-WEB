DROP DATABASE LegalID;
CREATE DATABASE LegalID;
USE LegalID;

CREATE TABLE Usuario
(id_cliente int,
nombre_cliente varchar(45),
telefono_cliente varchar(45),
direccion_cliente varchar(45),
ciudad_cliente varchar(45),
correo_cliente varchar(45) primary key not null,
clave_cliente varchar(60)
);

INSERT INTO Usuario VALUES (9090,'juan','3193897599','cll 41 N-34-57','bucaramanga','correo','juan');
INSERT INTO Usuario VALUES (2132173,'sebastian','3115717400','atalaya','cucuta','juansebastianleon5@gmail.com','123456');
INSERT INTO Usuario VALUES (121232,'camilo','123456','piedecuesta','bucaramanga','corrdfdeo','123456');
INSERT INTO Usuario VALUES (434343,'leonardo dallos','4343434','brr la universidad','pegaso','correofd','juan');
