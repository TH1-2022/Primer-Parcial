CREATE TABLE persona(
    id int primary key auto_increment, 
    nombre varchar(20), 
    apellido varchar(20), 
    telefono int, 
    email varchar(50)
);


CREATE TABLE producto(
    id int primary key auto_increment,
    nombre varchar(20),
    descripcion varchar(200),
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
