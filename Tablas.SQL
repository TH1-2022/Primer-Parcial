CREATE TABLE persona(
    id int primary key auto_increment,
    nombre varchar (50),
    apellido varchar (50),
    telefono int,
    email varchar (255)
);


CREATE TABLE producto(
    id int primary key auto_increment,
    nombre varchar (50),
    descripcion varchar (150),
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