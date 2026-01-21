create database CareerLink;

use CareerLink;

create table utilisateurs (
    id int PRIMARY key AUTO_INCREMENT,
    nom varchar(255) not null,
    email varchar(255) not null,
    mot_de_passe varchar(255) not null
);

create table compétences (
    id int PRIMARY key AUTO_INCREMENT,
    titre VARCHAR(255)
);

create table roles (
    id int PRIMARY key AUTO_INCREMENT,
    nom varchar(255) not null
);

create table offers (
    id int PRIMARY key AUTO_INCREMENT,
    post varchar(255) not null,
    salair int not null,
    lieu varchar(255) not null
);
create table tags (
    id int PRIMARY key AUTO_INCREMENT,
    titre VARCHAR(255)
);
create table categories (
    id int PRIMARY key AUTO_INCREMENT,
    titre VARCHAR(255)
);


create table candidats (
    id int PRIMARY key AUTO_INCREMENT,
    Foreign Key (id) REFERENCES utilisateurs (id)
);


create table admins (
    id int PRIMARY key AUTO_INCREMENT,
    Foreign Key (id) REFERENCES utilisateurs (id)
);

create table recruteurs (
    id int PRIMARY key AUTO_INCREMENT,
    
    nom_entreprise VARCHAR(255) not null,
    logo varchar(255),
    Foreign Key (id) REFERENCES utilisateurs (id)
);
create table postuler (
    candidat_id int,
    offer_id int,
    discription varchar(255) not null,
    cv VARCHAR(255),
    Foreign Key (candidat_id) REFERENCES candidats (id),
    Foreign Key (offer_id) REFERENCES offers (id)

);
create table candidat_compétences(
    candidat_id int,
    compétence_id int,
    Foreign Key (candidat_id) REFERENCES candidats (id),
    Foreign Key (compétence_id) REFERENCES compétences (id)
);
create table offer_tags(
    tag_id int,
    offer_id int,
    Foreign Key (tag_id) REFERENCES tags (id),
    Foreign Key (offer_id) REFERENCES offers (id)
)
