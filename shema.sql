create database CareerLink;

use CareerLink;

create table utilisateurs (
    id int PRIMARY key AUTO_INCREMENT,
    nom varchar(255) not null,
    email varchar(255) not null,
    mot_de_passe varchar(255) not null,
    id_role INT NOT NULL,
    CONSTRAINT FK_role FOREIGN KEY (id_role) REFERENCES roles (id)
);

create table competences (
    id int PRIMARY key AUTO_INCREMENT,
    titre VARCHAR(255),
    id_candidat int,
     constraint FK_utilisateur foreign key (id_candidat) references candidats (id)
);

drop table competences;

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
    id_recruteur int not null,
    post varchar(255) not null,
    salair int not null,
    lieu varchar(255) not null,
    constraint FK_recruteur Foreign Key (id_recruteur) REFERENCES recruteurs (id)
);

drop table offers;

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
    salaire_attendu decimal(10, 2) not null,
    Foreign Key (id) REFERENCES utilisateurs (id)
);

create table experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    candidat_id int not null,
    entreprise varchar(255) not null,
    poste varchar(255) not null,
    date varchar(50) not null,
    constraint fk_user_experience foreign key (candidat_id) REFERENCES candidats (id) ON DELETE CASCADE
);

drop table experiences;

create table admins (
    id int PRIMARY key AUTO_INCREMENT,
    Foreign Key (id) REFERENCES utilisateurs (id)
);

create table recruteurs (
    id int PRIMARY key AUTO_INCREMENT,
    nom_entreprise VARCHAR(255) not null,
    Foreign Key (id) REFERENCES utilisateurs (id)
);
drop table recruteurs;

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

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS offer_tags,
candidat_competences,
postuler,
recruteurs,
admins,
experiences,
candidats,
categories,
tags,
offers,
utilisateurRoles,
competences,
utilisateurs,
roles;

SET FOREIGN_KEY_CHECKS = 1;

use CareerLink;
select * from utilisateurs;



select *
from utilisateurs u
join candidats cd on u.id = cd.id
join competences c on cd.id = c.id_candidat;

select *
from utilisateurs u
join utilisateurRoles ur on u.id = ur.idUtilisateur 
join roles r on ur.idRole = r.id;

select * from recruteurs;

select *
from candidats cd
join competences c on cd.id = c.id_candidat
join experiences exp on cd.id = exp.candidat_id;

select *
from experiences;
insert into roles (nom)
values('candidat'),('admin'),('recruteur');


INSERT INTO utilisateurs (nom, email, mot_de_passe, id_role)
VALUES
('Ayoub El Idrissi', 'ayoub@techcorp.ma', '$2y$10$hash1', 3),
('Sara Bennani', 'sara@softplus.ma', '$2y$10$hash2', 3);

INSERT INTO recruteurs (id, nom_entreprise)
VALUES
(26, 'TechCorp'),
(27, 'SoftPlus');

INSERT INTO utilisateurRoles (idUtilisateur, idRole)
VALUES
(26, 3),
(27, 3);

INSERT INTO offers (id_recruteur, post, salair, lieu)
VALUES
(26, 'Développeur Full Stack', 8000, 'Casablanca'),
(26, 'Développeur Backend PHP', 7000, 'Rabat'),
(27, 'Frontend Developer', 7500, 'Marrakech');

INSERT INTO offers (id_recruteur, post, salair, lieu)
VALUES
(26, 'Ingénieur Logiciel Java', 9000, 'Casablanca'),
(26, 'Développeur Symfony', 8500, 'Rabat'),
(26, 'UI/UX Designer', 6500, 'Agadir'),
(27, 'Développeur Mobile Flutter', 8000, 'Tanger'),
(27, 'Data Analyst Junior', 7000, 'Casablanca');

SELECT o.id, o.post, o.salair, o.lieu, r.nom_entreprise
FROM offers o
JOIN recruteurs r ON o.id_recruteur = r.id;



