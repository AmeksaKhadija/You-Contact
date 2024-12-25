CREATE DATABASE youcontact;

CREATE Table contacts(
    id INT PRIMARY KEY auto_increment,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    telephone VARCHAR(255)
);