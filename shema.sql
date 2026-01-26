-- Database creation
CREATE DATABASE IF NOT EXISTS CareerLink;
USE CareerLink;

-- 1. Roles table
CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
);

-- 2. Basic users table
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- 3. Recruiter table (Extends utilisateurs)
CREATE TABLE recruteurs (
    id INT PRIMARY KEY,
    nom_entreprise VARCHAR(255) NOT NULL,
    FOREIGN KEY (id) REFERENCES utilisateurs(id) ON DELETE CASCADE
)
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

-- 4. Categories table
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description TEXT
);


-- 5. Tags table
CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL
);

-- 6. Job Offers table (Matches Offre entity and Repository)
CREATE TABLE offres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    poste VARCHAR(255) NOT NULL,
    salaire INT,
    qualifications TEXT,
    lieu VARCHAR(255) NOT NULL,
    recruteur_id INT NOT NULL,
    categorie_id INT NOT NULL,
    status TINYINT(1) DEFAULT 1, -- 1 = active, 0 = archived
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (recruteur_id) REFERENCES recruteurs(id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
)
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

-- 7. Pivot table for Offre and Tags (Many-to-Many)
CREATE TABLE offre_tag (
    offre_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (offre_id, tag_id),
    FOREIGN KEY (offre_id) REFERENCES offres(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);


-- 8. Candidats table (Extends utilisateurs)
CREATE TABLE candidats (
    id INT PRIMARY KEY,
    telephone VARCHAR(20),
    salaire_attendu DECIMAL(10,2),
    FOREIGN KEY (id) REFERENCES utilisateurs(id) ON DELETE CASCADE
);

-- 9. Applications table (Junction for Offre and Candidat)
CREATE TABLE applications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    offre_id INT NOT NULL,
    candidat_id INT NOT NULL,
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (offre_id) REFERENCES offres(id),
    FOREIGN KEY (candidat_id) REFERENCES candidats(id)
);

-- ==========================================
-- DATA FOR TESTING
-- ==========================================

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


-- Insert Roles
INSERT INTO roles (id, nom) VALUES (1, 'admin'), (2, 'recruteur'), (3, 'candidat');

-- Insert a Recruiter (User + Recruiter)
-- Note: password should be hashed in real app, here it's plain for simple test
INSERT INTO utilisateurs (id, nom, email, mot_de_passe, role_id) 
VALUES (1, 'John Recruiter', 'recruiter@example.com', '123456', 2);


INSERT INTO recruteurs (id, nom_entreprise) 
VALUES (1, 'Tech Solutions');

-- Insert Categories
INSERT INTO categories (id, titre, description) VALUES 
(1, 'Development', 'Software and web development jobs'),
(2, 'Design', 'UI/UX and Graphic design jobs'),
(3, 'Marketing', 'Digital marketing and SEO jobs');

-- Insert Tags
INSERT INTO tags (id, titre) VALUES 
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'MySQL'),
(4, 'React'),
(5, 'Tailwind CSS');

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


