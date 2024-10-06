-- Insertion de données dans la table "livres"
INSERT INTO bibliotheque.livres (titre, auteurs, maison_d_edition, nombre_de_pages, nombre_de_copies)
VALUES
  ('Harry Potter à l''école des sorciers', 'J.K. Rowling', 'Gallimard', 384, 10),
  ('Le Seigneur des Anneaux', 'J.R.R. Tolkien', 'Christian Bourgois Éditeur', 1136, 8),
  ('Les Misérables', 'Victor Hugo', 'A. Lacroix, Verboeckhoven et Cie', 1488, 12),
  ('1984', 'George Orwell', 'Secker and Warburg', 328, 6),
  ('Le Petit Prince', 'Antoine de Saint-Exupéry', 'Gallimard', 96, 15),
  ('La Peste', 'Albert Camus', 'Gallimard', 278, 4),
  ('L''Odyssée', 'Homère', 'Belles Lettres', 416, 7),
  ('Les Fourmis', 'Bernard Werber', 'Albin Michel', 444, 11),
  ('La Nuit des temps', 'René Barjavel', 'Denoël', 374, 9),
  ('La Guerre et la Paix', 'Léon Tolstoï', 'Livre de Poche', 1392, 10),
  ('Fondation', 'Isaac Asimov', 'Gallimard', 252, 8),
  ('Le Comte de Monte-Cristo', 'Alexandre Dumas', 'Ponctuation', 1280, 5),
  ('Les Trois Mousquetaires', 'Alexandre Dumas', 'LGF', 640, 12),
  ('La Chute', 'Albert Camus', 'Gallimard', 156, 6),
  ('Le Grand Meaulnes', 'Alain-Fournier', 'LGF', 304, 9),
  ('Voyage au bout de la nuit', 'Louis-Ferdinand Céline', 'Gallimard', 628, 7),
  ('Le Horla', 'Guy de Maupassant', 'LGF', 112, 13),
  ('Les Fleurs du Mal', 'Charles Baudelaire', 'LGF', 416, 10),
  ('Madame Bovary', 'Gustave Flaubert', 'LGF', 528, 11),
  ('Le Rouge et le Noir', 'Stendhal', 'Livre de Poche', 608, 8);


-- Insertion de données dans la table "usagers"
INSERT INTO bibliotheque.usagers (nom, prenom, addresse, statut, email, livres_empruntes)
VALUES
  ('Dupont', 'Luc', '3 rue des Champs', 'étudiant', 'luc.dupont@example.com', 0),
  ('Martin', 'Sophie', '21 rue des Fleurs', 'enseignant', 'sophie.martin@example.com', 0),
  ('Lefebvre', 'Marie', '7 avenue des Lilas', 'étudiant', 'marie.lefebvre@example.com', 0),
  ('Durand', 'Pierre', '12 boulevard des Sports', 'étudiant', 'pierre.durand@example.com', 0),
  ('Rousseau', 'Julie', '55 rue des Ormes', 'enseignant', 'julie.rousseau@example.com', 0),
  ('Moreau', 'François', '9 impasse des Peupliers', 'étudiant', 'francois.moreau@example.com', 0),
  ('Dubois', 'Isabelle', '37 avenue des Acacias', 'enseignant', 'isabelle.dubois@example.com', 0),
  ('Girard', 'Antoine', '16 rue de la Paix', 'étudiant', 'antoine.girard@example.com', 0),
  ('Fontaine', 'Cécile', '2 rue du Moulin', 'enseignant', 'cecile.fontaine@example.com', 0),
  ('Renard', 'Thierry', '8 chemin des Vignes', 'étudiant', 'thierry.renard@example.com', 0);


-- Insertion de données dans la table "emprunts"
INSERT INTO bibliotheque.emprunts (id_livre, id_personne, date_emprunt, date_echeance, date_retour, en_cours)
VALUES
  (1, 1, '2023-05-01', '2023-05-31', NULL, 1),
  (2, 1, '2023-05-02', '2023-06-01', NULL, 1),
  (5, 2, '2023-05-03', '2023-06-02', NULL, 1),
  (7, 3, '2023-05-04', '2023-06-03', NULL, 1),
  (10, 4, '2023-05-05', '2023-06-04', NULL, 1),
  (15, 5, '2023-05-06', '2023-06-05', NULL, 1);