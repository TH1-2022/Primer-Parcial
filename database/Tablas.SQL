DROP DATABASE IF EXISTS `PrimerParcial_TH1_Bonilla_Agustin`;
CREATE DATABASE IF NOT EXISTS `PrimerParcial_TH1_Bonilla_Agustin`;
USE PrimerParcial_TH1_Bonilla_Agustin;

CREATE TABLE persona(
    id int(7) primary key auto_increment,
    nombre varchar(35),
    apellido varchar(35),
    telefono int(9),
    email varchar(50)
);


CREATE TABLE producto(
    id int(8) primary key auto_increment,
    nombre varchar(35),
    descripcion varchar(35),
    stock int(4)
);


CREATE TABLE compra(
    id_persona int(7),
    id_producto int(8),
    fecha_hora datetime,
    primary key(id_persona,id_producto,fecha_hora),
    foreign key(id_persona) references persona(id),
    foreign key(id_producto) references producto(id)
);
