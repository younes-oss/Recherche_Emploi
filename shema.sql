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
