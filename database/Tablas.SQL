DROP DATABASE IF EXISTS `PrimerParcial_TH1_Bonilla_Agustin`;
CREATE DATABASE IF NOT EXISTS `PrimerParcial_TH1_Bonilla_Agustin`;
USE PrimerParcial_TH1_Bonilla_Agustin;

-- DROP DATABASE IF EXISTS persona; --
CREATE TABLE IF NOT EXISTS persona(
    id int(7) primary key auto_increment,
    nombre varchar(35),
    apellido varchar(35),
    telefono int(9),
    email varchar(50)
);

-- DROP DATABASE IF EXISTS producto; --
CREATE TABLE IF NOT EXISTS producto(
    id int(8) primary key auto_increment,
    nombre varchar(35),
    descripcion TEXT,
    stock int(4)
);

-- DROP DATABASE IF EXISTS compra; --
CREATE TABLE IF NOT EXISTS compra(
    id_persona int(7),
    id_producto int(8),
    fecha_hora datetime,
    stock int(4),
    primary key(id_persona,id_producto,fecha_hora),
    foreign key(id_persona) references persona(id) ON DELETE CASCADE,
    foreign key(id_producto) references producto(id) ON DELETE CASCADE
);

INSERT INTO persona (id, nombre,apellido,telefono,email) 
VALUES
('1', 'Jaime', 'Rodriguez', '26001212', 'jaime.rodriguez@persona.com.uy'),
('2', 'Juan', 'Rodriguez', '26559098', 'juan.rodriguez@persona.com.uy'),
('3', 'Benito', 'Gomez', '098765432', 'bgomez@persona.com.uy'),
('4', 'Alberto', 'Suarez', '098234567', 'asuarez@persona.com.uy'),
('5', 'Jimena', 'Eguren', '095432123', 'jeguren@persona.com.uy'),
('6', 'Luis', 'Estevez', '094321234', 'leste.vez@persona.com.uy'),
('7', 'Damian', 'Umpierrez', '08002342', 'eldamiumpierrez@persona.com.uy'),
('8', 'Silvia', 'Javier', '08002020', 'lasilvi.j@persona.com.uy'),
('9', 'Sabrina Micaela', 'Gomez', '611', 'smg20220613@persona.com.uy'),
('10', 'Agustina', 'Estevez', '099232123', 'agustinaestevez@persona.com.uy'),
('11', 'Felipe', 'Carmelo', '091283745', 'carmelofelipe@persona.com.uy');

INSERT INTO producto (id, nombre, descripcion, stock)
VALUES
(1, "Agua c/g", "Agua SALUS con gas 1L", 200),
(2, "Agua s/g", "Agua SALUS sin gas 1L", 5),
(3, "Limonada", "Limonada Rinde2 2L", 80),
(4, "Mandarina", "Mandarina Rinde2 2L", 570),
(5, "Jugo de Naranja", "Jugo de Naranja recien exprimido.
De las naranjas de Inglaterra", 99),
(6, "Chocolate", "Chocolate Aguila 90g", 348),
(7, "Mani", "Mani Lays 150g", 1),
(8, "Papas Chips (Lays)", "Papas Chips (Lays) 500g", 4820),
(9, "Doritos", "Doritos 1g", 192),
(10, "Chisitos", "Chisitos picantes [Agotado]", -1);

INSERT INTO compra (id_persona, id_producto, fecha_hora)
VALUES
(1, 1, '2021-06-13 23:59:13'),
(1, 2, '2022-05-18 15:12:20'),
(1, 3, '2023-04-23 06:30:40'),
(1, 2, '2021-03-19 06:30:40'),
(1, 2, '2022-08-30 15:03:20'),
(2, 1, '2023-07-03 14:10:00'),
(3, 6, '2021-06-05 12:33:07'),
(4, 7, '2023-02-14 01:48:35'),
(3, 6, '2023-03-18 03:09:39'),
(3, 6, '2022-03-21 09:33:12');