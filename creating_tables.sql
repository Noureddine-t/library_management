
CREATE DATABASE bibliotheque;

CREATE TABLE bibliotheque.livres (
  id_livre INTEGER AUTO_INCREMENT,
  titre VARCHAR(255),
  auteurs VARCHAR(255),
  maison_d_edition VARCHAR(255),
  nombre_de_pages INT,
  nombre_de_copies INT,
  PRIMARY KEY (  id_livre )
);

CREATE TABLE bibliotheque.usagers (
  id_personne INTEGER AUTO_INCREMENT,
  nom TEXT NOT NULL,
  prenom TEXT NOT NULL,
  addresse TEXT NOT NULL,
  statut TEXT NOT NULL,
  email TEXT NOT NULL,
  livres_empruntes INTEGER DEFAULT 0,
  PRIMARY KEY (  id_personne )
);

CREATE TABLE bibliotheque.emprunts (
  id INTEGER AUTO_INCREMENT,
  id_livre INTEGER NOT NULL,
  id_personne INTEGER NOT NULL,
  date_emprunt DATE NOT NULL,
  date_echeance DATE NOT NULL,
  date_retour DATE,
  en_cours BOOLEAN DEFAULT 0,
  PRIMARY KEY (  id ),
  FOREIGN KEY (id_personne) REFERENCES usagers(id_personne),
FOREIGN KEY (id_livre) REFERENCES livres(id_livre)
);