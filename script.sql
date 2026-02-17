
-- =====================================
-- TABLE USERS
-- =====================================
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    mail VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('USER','ADMIN') NOT NULL DEFAULT 'USER'
);

-- =====================================
-- TABLE AGENCES
-- =====================================
CREATE TABLE agences (
    id_agence INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
) ;

-- =====================================
-- TABLE TRAJETS
-- =====================================
CREATE TABLE trajets (
    id_trajet INT AUTO_INCREMENT PRIMARY KEY,
    id_agence_depart INT NOT NULL,
    id_agence_arrive INT NOT NULL,
    id_user INT NOT NULL,
    date_depart DATETIME NOT NULL,
    date_arrive DATETIME NOT NULL,
    places_total INT DEFAULT NULL,
    places_disponible INT DEFAULT NULL,

    CONSTRAINT fk_trajet_user
        FOREIGN KEY (id_user)
        REFERENCES users(id_user)
        ON DELETE CASCADE,

    CONSTRAINT fk_trajet_agence_depart
        FOREIGN KEY (id_agence_depart)
        REFERENCES agences(id_agence)
        ON DELETE CASCADE,

    CONSTRAINT fk_trajet_agence_arrive
        FOREIGN KEY (id_agence_arrive)
        REFERENCES agences(id_agence)
        ON DELETE CASCADE
);

-- =========================
-- INSERT AGENCES
-- =========================
INSERT INTO agences (nom) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');

-- =========================
-- INSERT USERS
-- =========================
INSERT INTO users (nom, prenom, telephone, mail, password, role) VALUES 
('Martin','Alexandre','0612345678','alexandre.martin@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Dubois','Sophie','0698765432','sophie.dubois@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Bernard','Julien','0622446688','julien.bernard@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Moreau','Camille','0611223344','camille.moreau@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Lefèvre','Lucie','0777889900','lucie.lefevre@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Leroy','Thomas','0655443322','thomas.leroy@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Roux','Chloé','0633221199','chloe.roux@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Petit','Maxime','0766778899','maxime.petit@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Garnier','Laura','0688776655','laura.garnier@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Dupuis','Antoine','0744556677','antoine.dupuis@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Lefebvre','Emma','0699887766','emma.lefebvre@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Fontaine','Louis','0655667788','louis.fontaine@email.fr','$2y$10$aqi4dYYucfLdwdPbd7rHmuDGF8HsnqVHs4Uv9.mYdEcSL1JnfLW3q','ADMIN'),
('Chevalier','Clara','0788990011','clara.chevalier@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Robin','Nicolas','0644332211','nicolas.robin@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Gauthier','Marine','0677889922','marine.gauthier@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Fournier','Pierre','0722334455','pierre.fournier@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Girard','Sarah','0688665544','sarah.girard@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Lambert','Hugo','0611223366','hugo.lambert@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Masson','Julie','0733445566','julie.masson@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER'),
('Henry','Arthur','0666554433','arthur.henry@email.fr','$2y$10$CnZN5OjGQP7tEIRZhRvAze4etx5/0cU/eVc77kQ/wDSa/c8pibQGe','USER');

-- =========================
-- INSERT TRAJETS
-- =========================
INSERT INTO trajets 
(id_agence_depart, id_agence_arrive, date_depart, date_arrive, places_total, places_disponible, id_user) 
VALUES 
(4, 6, '2025-04-19 12:30:00', '2025-04-19 16:30:00', 4, 2, 3),
(2, 4, '2025-02-15 11:00:00', '2025-02-15 16:30:00', 3, 1, 10),
(6, 3, '2025-03-07 14:15:00', '2025-03-07 18:30:00', 5, 2, 8);
