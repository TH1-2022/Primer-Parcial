CREATE DATABASE supermercado;
USE supermercado;
CREATE TABLE persona(
    id int primary key auto_increment,
    name varchar,
    lastname varchar,
    cellphone int,
    email varchar
);


CREATE TABLE producto(
    id int primary key auto_increment,
    name varchar,
    description varchar,
    stock int 
);


CREATE TABLE compra(
    person_id int,
    product_id int,
    date_time datetime,
    foreign key(id_persona) references persona(id),
    foreign key(id_producto) references producto(id),
    primary key(id_persona,id_producto,fecha_hora);
)