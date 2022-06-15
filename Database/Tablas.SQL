CREATE DATABASE supermercado;
USE supermercado;
CREATE TABLE person(
    id INTEGER auto_increment,
    name VARCHAR(50),
    lastname VARCHAR(50),
    cellphone INTEGER,
    email VARCHAR(50),
    PRIMARY KEY(id)
);


CREATE TABLE product(
    id INTEGER auto_increment,
    name VARCHAR(50),
    description VARCHAR(50),
    stock INTEGER,
    PRIMARY KEY (id)
);


CREATE TABLE buyout(
    person_id INTEGER,
    product_id INTEGER,
    date_time datetime,
    foreign key(person_id) references person(id),
    foreign key(product_id) references product(id),
    primary key(person_id,product_id,date_time)
)