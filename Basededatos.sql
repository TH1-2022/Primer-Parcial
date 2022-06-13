CREATE DATABASE COMPRAS;
USE COMPRAS;

CREATE TABLE persona(
    id int primary key AUTO_INCREMENT,
    nombre varchar(25),
    apellido varchar(25),
    telefono int,
    email varchar(25)
);

CREATE TABLE producto(
    id int primary key auto_increment,
    nombre varchar(25),
    descripcion varchar(25),
    stock int 
);

CREATE TABLE compra(
    id_persona int,
    id_producto int,
    fecha_hora datetime,
    
    foreign key(id_persona) references persona(id),
    foreign key(id_producto) references producto(id),
    primary key(id_persona,id_producto,fecha_hora)
);

INSERT INTO persona (nombre,apellido,telefono,email) 
VALUES 
    ('Pepe','Perez',43529184,'peperez@gmail.com'),
    ('Martin','Rodriguez',43533344,'mrodriguez@gmail.com'),
    ('Sol','Gonzales',091271589,'solgonzales@hotmail.com')
;

INSERT INTO producto (nombre,descripcion,stock) 
VALUES 
    ('Moto','Moto marca BMW',100),
    ('Auto','Auto marca Mercedes',50),
    ('Caballo','Caballo',50),
    ('Bicicleta','Rodado 26 marca Graciela',50)
;
