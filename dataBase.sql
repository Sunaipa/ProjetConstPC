CREATE TABLE ram_type(
   Id_RAM_Type INT AUTO_INCREMENT,
   name VARCHAR(15) NOT NULL,
   PRIMARY KEY(Id_RAM_Type)
);

CREATE TABLE socket(
   Id_socket INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_socket)
);

CREATE TABLE connecteur(
   Id_connecteur INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_connecteur)
);

CREATE TABLE marque(
   Id_marque INT AUTO_INCREMENT,
   name VARCHAR(50),
   PRIMARY KEY(Id_marque)
);

CREATE TABLE type_motherboard(
   Id_type_motherboard INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_type_motherboard)
);

CREATE TABLE autorisation(
   Id_autorisation INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_autorisation)
);

CREATE TABLE motherboard(
   Id_Motherboard INT AUTO_INCREMENT,
   name VARCHAR(55) NOT NULL,
   prix DECIMAL(15,2),
   chipset VARCHAR(20) NOT NULL,
   Id_type_motherboard INT NOT NULL,
   Id_marque INT NOT NULL,
   Id_RAM_Type INT NOT NULL,
   PRIMARY KEY(Id_Motherboard),
   FOREIGN KEY(Id_type_motherboard) REFERENCES type_motherboard(Id_type_motherboard),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque),
   FOREIGN KEY(Id_RAM_Type) REFERENCES ram_type(Id_RAM_Type)
);

CREATE TABLE ram(
   Id_RAM INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   prix DECIMAL(15,2) NOT NULL,
   frequence VARCHAR(50) NOT NULL,
   quantite_GO INT NOT NULL,
   Id_marque INT NOT NULL,
   Id_RAM_Type INT NOT NULL,
   PRIMARY KEY(Id_RAM),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque),
   FOREIGN KEY(Id_RAM_Type) REFERENCES ram_type(Id_RAM_Type)
);

CREATE TABLE boitier(
   Id_Boitier INT AUTO_INCREMENT,
   Name VARCHAR(60) NOT NULL,
   prix DECIMAL(15,2) NOT NULL,
   Id_type_motherboard INT NOT NULL,
   Id_marque INT NOT NULL,
   PRIMARY KEY(Id_Boitier),
   FOREIGN KEY(Id_type_motherboard) REFERENCES type_motherboard(Id_type_motherboard),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque)
);

CREATE TABLE socket_compatible(
   Id_Motherboard INT,
   Id_socket INT,
   PRIMARY KEY(Id_Motherboard, Id_socket),
   FOREIGN KEY(Id_Motherboard) REFERENCES motherboard(Id_Motherboard),
   FOREIGN KEY(Id_socket) REFERENCES socket(Id_socket)
);

CREATE TABLE connecteur_possede(
   Id_Motherboard INT,
   Id_connecteur INT,
   PRIMARY KEY(Id_Motherboard, Id_connecteur),
   FOREIGN KEY(Id_Motherboard) REFERENCES motherboard(Id_Motherboard),
   FOREIGN KEY(Id_connecteur) REFERENCES connecteur(Id_connecteur)
);

CREATE TABLE dd(
   Id_dd INT AUTO_INCREMENT,
   name VARCHAR(50),
   capacite INT NOT NULL,
   prix DECIMAL(15,2),
   Id_marque INT NOT NULL,
   Id_connecteur INT NOT NULL,
   PRIMARY KEY(Id_dd),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque),
   FOREIGN KEY(Id_connecteur) REFERENCES connecteur(Id_connecteur)
);

CREATE TABLE carte_graphique(
   Id_carte_graphique INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   prix DECIMAL(15,2) NOT NULL,
   Id_marque INT NOT NULL,
   PRIMARY KEY(Id_carte_graphique),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque)
);

CREATE TABLE processor(
   Id_processor INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   prix DECIMAL(15,2) NOT NULL,
   Id_marque INT NOT NULL,
   Id_socket INT NOT NULL,
   PRIMARY KEY(Id_processor),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque),
   FOREIGN KEY(Id_socket) REFERENCES socket(Id_socket)
);

CREATE TABLE person(
   Id_person INT AUTO_INCREMENT,
   pseudo VARCHAR(50) NOT NULL,
   mdp VARCHAR(20) NOT NULL,
   Id_autorisation INT NOT NULL,
   PRIMARY KEY(Id_person),
   FOREIGN KEY(Id_autorisation) REFERENCES autorisation(Id_autorisation)
);

CREATE TABLE configue(
   Id_configue INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   prix_total DECIMAL(15,2) NOT NULL,
   description VARCHAR(300),
   Id_person INT NOT NULL,
   Id_carte_graphique INT NOT NULL,
   Id_Motherboard INT NOT NULL,
   Id_Boitier INT NOT NULL,
   Id_processor INT NOT NULL,
   PRIMARY KEY(Id_configue),
   FOREIGN KEY(Id_person) REFERENCES person(Id_person),
   FOREIGN KEY(Id_carte_graphique) REFERENCES carte_graphique(Id_carte_graphique),
   FOREIGN KEY(Id_Motherboard) REFERENCES motherboard(Id_Motherboard),
   FOREIGN KEY(Id_Boitier) REFERENCES boitier(Id_Boitier),
   FOREIGN KEY(Id_processor) REFERENCES processor(Id_processor)
);

CREATE TABLE dd_confique(
   Id_dd INT,
   Id_configue INT,
   PRIMARY KEY(Id_dd, Id_configue),
   FOREIGN KEY(Id_dd) REFERENCES dd(Id_dd),
   FOREIGN KEY(Id_configue) REFERENCES configue(Id_configue)
);

CREATE TABLE ram_comfigue(
   Id_RAM INT,
   Id_configue INT,
   PRIMARY KEY(Id_RAM, Id_configue),
   FOREIGN KEY(Id_RAM) REFERENCES ram(Id_RAM),
   FOREIGN KEY(Id_configue) REFERENCES configue(Id_configue)
);
