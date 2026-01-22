create database CareerLink;

use CareerLink;

create table utilisateurs (
    id int PRIMARY key AUTO_INCREMENT,
    nom varchar(255) not null,
    email varchar(255) not null,
    mot_de_passe varchar(255) not null
    id_role int not null,
    constraint FK_role foreign key (id_role) reference roles (id);
);

create table competences (
    id int PRIMARY key AUTO_INCREMENT,
    titre VARCHAR(255)
);

create table roles (
    id int PRIMARY key AUTO_INCREMENT,
    nom varchar(255) not null
);

create table utilisateurRoles (
    id int primary key auto_increment,
    idUtilisateur int,
    idRole int,
    constraint FK_utilisateurs foreign key (idUtilisateur) references utilisateurs (id),
    constraint FK_roles foreign key (idRole) references roles (id)
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
    telephone varchar(100) not null,
    salaire_attendu number(10,2) not null,
    Foreign Key (id) REFERENCES utilisateurs (id)
);
create table experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    candidat_id int not null,
    entreprise varchar(255) not null,
    poste varchar(255) not null,
    date_debut date not null,
    date_fin date not null,
    constraint fk_user_experience foreign key (candidat_id) REFERENCES candidats (id) ON DELETE CASCADE
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

create table candidat_competences (
    candidat_id int,
    compétence_id int,
    Foreign Key (candidat_id) REFERENCES candidats (id),
    Foreign Key (compétence_id) REFERENCES compétences (id)
);

create table offer_tags (
    tag_id int,
    offer_id int,
    Foreign Key (tag_id) REFERENCES tags (id),
    Foreign Key (offer_id) REFERENCES offers (id)
)