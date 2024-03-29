/*
    @author: Massiles Ghernaout (dev-massiles)
    @motive: The diffrence between this file and the P06_AlimentationMysql.sql file
    is that this file has the correct relationships setup. This is the corrected 
    version of the two files.

    For instance: 
    In the adjacent file, P06_AlimentationMysql, PieceModele is not the table that 
    is containing the primary key of PiecePays, even though it should be the case.

    Same thing can be said for PieceTranche, PieceCaracteristique...

    TL;DR: 

    This file corrects the relationships for the database as the E/A diagram illustrates
    them. Note that this file is only use in git/dev-massiles branch.

*/
DELETE FROM p06_piece_tranche WHERE 1=1;
DELETE FROM p06_piece_pays WHERE 1=1;
DELETE FROM p06_piece_caracteristique WHERE 1=1;
DELETE FROM p06_piece_modele WHERE 1=1;
DELETE FROM p06_collectionneur WHERE 1=1;


INSERT INTO p06_piece_caracteristique (id, piece_face_commune, piece_masse, piece_taille, piece_materiau) VALUES
    (1, 'Première émission', 410, 1975, 'or nordique'),
   
    
    (2, 'Deuxieme émission', 410, 1975, 'or nordique'),

   
    (3, 'Deuxieme émission', 230, 1625, 'acier cuivré'),

    (4, 'Première émission', 306, 1875, 'acier cuivré'),
    
    
    (5, 'Deuxième émission', 306, 1875, 'acier cuivré'),

    (6, 'Première émission', 392, 2125, 'acier cuivré'),
    (7, 'Deuxième émission', 392, 2125, 'acier cuivré'),

   

    (8, 'Première émission', 750, 2325, 'maillechort/cupronickel'),


    (9, 'Première émission', 850, 2575, 'cupronickel/maillechort '),
    
    (10, 'Deuxieme émission', 850, 2575, 'cupronickel/maillechort ');

INSERT INTO p06_piece_tranche(id, piece_tranche) VALUES
    (1,'cannelures épaisses'),
    
    (2,'lisse'),
   

    (3,'lisse avec un sillon'),
   



    (4, 'sept cannelures profondes'),
    

    (5, 'cannelures épaisses'),

    (6, 'alternance de parties lisses et de parties cannelées'),

    (7, 'gravure sur cannelures fines') ;

INSERT INTO p06_piece_pays (id, pays_nom) VALUES
    (1,'France'),
 

    (2, 'Allemagne'),
    
    (3, 'Autriche'),
    

    (4, 'Finlande'),
   

    (5, 'Luxembourg') ;

INSERT INTO p06_collectionneur(id,collectionneur_nom, collectionneur_prenom) VALUES
    (1,'Ponty', 'Stefan'),
    (2,'Furet', 'Dominique'),
    (3,'Mermet', 'Jean-Luc'),
    (4,'Flambard', 'Nicholas'),
    (5,'Balev', 'Bruno'),
    (6,'Ghernaout', 'Gaële'),
    (7,'Simon', 'Yoann'),
    (8,'Lemercier', 'Laurent'),
    (9,'Pigné', 'Julien'),
    (10,'Duvallet', 'Massiles'),
    (11,'Jay', 'Claude'),
    (12,'Josephs', 'Clément'),
    (13,'Fournier', 'Dorian'),
    (14,'Amanton', 'Véronique');


-- add autoincrement for the ids, since the dataset does not specify the id
-- ALTER TABLE `p06_piece_modele` CHANGE COLUMN `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;

INSERT INTO p06_piece_modele (id, piece_pays_id, piece_tranche_id , piece_caracteristique_id , piece_version, piece_valeur, piece_date_frappee, piece_quantite_frappee) VALUES
    (1,1,1,1,'La Semeuse', 10, '1999-01-01', 447300000 ),
    (2,1,1,1,'La Semeuse', 10, '2000-01-01', 297400000 ),
    (3,1,1,1,'La Semeuse', 10, '2001-01-01', 144500000 ),
    (4,1,1,1,'La Semeuse', 10, '2002-01-01', 206600000 ),
    (5,1,1,1,'La Semeuse', 10, '2003-01-01', 180700000 ),
    (6,1,1,1,'La Semeuse', 10, '2004-01-01', 1500000   ),
    (7,1,1,1,'La Semeuse', 10, '2005-01-01', 45000000  ),
    (8,1,1,1,'La Semeuse', 10, '2006-01-01', 60200000  ),
    (9,1,1,1,'La Semeuse', 10, '2007-01-01', 90095000  ),
    (10,1,1,1,'La Semeuse', 10, '2008-01-01', 178706000 ),
   

    (11,2,2,2,'Marianne', 1, '1999-01-01', 454291200 ),
    (12,1,2,2,'Marianne', 1, '2000-01-01', 148953600 ),
    (13,1,2,2,'Marianne', 1, '2001-01-01', 256307108 ),
    (14,1,2,2,'Marianne', 1, '2002-01-01', 191996000 ),
    (15,1,2,2,'Marianne', 1, '2007-01-01', 40157600 ),
    (16,1,2,2,'Marianne', 1, '2008-01-01', 25537600 ),
    (17,1,2,2,'Marianne', 1, '2009-01-01', 82660000 ),
    (18,1,2,2,'Marianne', 1, '2010-01-01', 108024000 ),
    (19,1,2,2,'Marianne', 1, '2011-01-01', 54936000 ),
   

    (21,1,2,3,'Marianne', 2, '1999-01-01', 454291200 ),
    (22,1,2,3,'Marianne', 2, '2000-01-01', 148953600 ),
    (23,1,2,3,'Marianne', 2, '2001-01-01', 256307108 ),
    (24,1,2,3,'Marianne', 2, '2002-01-01', 191996000 ),
    (25,1,2,3,'Marianne', 2, '2007-01-01', 40157600 ),
    (26,1,2,3,'Marianne', 2, '2008-01-01', 25537600 ),
   

    (28,1,2,4,'Marianne', 5, '1999-01-01', 454291200 ),
    (29,1,2,4,'Marianne', 5, '2000-01-01', 148953600 ),
    (30,1,2,4,'Marianne', 5, '2001-01-01', 256307108 ),
    (31,1,2,4,'Marianne', 5, '2002-01-01', 191996000 ),
    (32,1,2,4,'Marianne', 5, '2007-01-01', 40157600 ),

    (33,1,2,6,'La Semeuse', 20, '1999-01-01', 454291200 ),
    (34,1,2,6,'La Semeuse', 20, '2000-01-01', 148953600 ),
    (35,1,2,6,'La Semeuse', 20, '2001-01-01', 256307108 ),
    (36,1,2,6,'La Semeuse', 20, '2002-01-01', 191996000 ),
    (37,1,2,6,'La Semeuse', 20, '2007-01-01', 40157600  ),
    (38,1,2,6,'La Semeuse', 20, '2008-01-01', 25537600 ),

    (39,1,2,5,'La Semeuse', 50, '1999-01-01', 105753600 ),
    (40,1,2,5,'La Semeuse', 50, '2000-01-01', 179496000 ),
    (41,1,2,5,'La Semeuse', 50, '2001-01-01', 276252274 ),

    (42,2,2,4,'Arbre', 100, '1999-01-01', 301050000 ),
    (43,2,2,4,'Arbre', 100, '2000-01-01', 297270000 ),
    (44,2,2,4,'Arbre', 100, '2001-01-01', 150216624 ),
    (45,2,2,4,'Arbre', 100, '2002-01-01', 129324000 ),

    (46,2,2,4,'Arbre', 200, '1999-01-01', 56695000 ),
    (47,2,2,4,'Arbre', 200, '2000-01-01',   171120000 ),
    (48,2,2,4,'Arbre', 200, '2001-01-01', 237915793 ),
    (49,2,2,4,'Arbre', 200, '2002-01-01', 153606500 ),
    (50,2,2,4,'Arbre', 200, '2011-01-01', 36024000  ),
    (51,2,2,4,'Arbre', 200, '2012-01-01', 36936000  ),


    (52,3,4,6,'Présidence du Schleswig-Holstein au Bundesrat', 200, '2006-02-03', 30000000),
    (53,3,4,6,'Présidence du Mecklembourg-Poméranie-Occidentale au Bundesrat', 200, '2007-02-02', 30000000),
    (54,3,4,6,'50e anniversaire du traité de Rome', 200, '2007-03-25', 30000000),
    (55,4,2,6,'Présidence de Hambourg au Bundesrat', 200, '2008-02-01', 30000000),
    (56,1,2,5,'10e anniversaire de l`Union économique et monétaire', 200, '2009-01-01', 30000000),
    (57,1,2,4,'Présidence de la Sarre au Bundesrat', 200, '2009-02-06', 30000000),
    (58,1,2,5,'Présidence de Brême au Bundesrat', 200, '2010-01-29', 30000000),
    (59,4,2,6,'Présidence de la Rhénanie-du-Nord-Westphalie au Bundesrat', 200, '2011-01-28', 30000000),
    (60,3,4,6,'10e anniversaire de la mise en circulation des billets et des pièces en euro', 200, '2012-01-02', 30000000),
    (61,3,4,6,'Présidence de la Bavière au Bundesrat', 200, '2012-02-03', 30000000),
    (62,4,2,6,'50e anniversaire du Traité de l`Élysée', 200, '2013-01-01', 11000000),
    (63,3,4,6,'Présidence du Bade-Wurtemberg au Bundesrat', 200, '2013-02-01', 30000000),
    (64,1,2,5,'Présidence de la Basse-Saxe au Bundesrat', 200, '2014-02-07', 30000000),
    (65,1,2,5,'Présidence de Hesse au Bundesrat', 200, '2015-01-30', 30000000),
    (66,4,2,6,'25e anniversaire de la réunification allemande', 200, '2015-01-30', 30000000),
    (67,3,4,6,'30e anniversaire du drapeau européen', 200, '2015-04-17', 30000000),
    (68,4,2,6,'Présidence de la Saxe au Bundesrat', 200, '2016-02-05', 30000000),
    (69,3,4,6,'Présidence de la Rhénanie-Palatinat au Bundesrat', 200, '2017-02-03', 30000000),
    (70,4,2,6,'100e anniversaire de la naissance du Chancelier fédéral d`Allemagne Helmut Schmidt', 200, '2018-01-30', 30000000),
    (71,3,4,6,'1275e anniversaire de Charlemagne', 200, '2023-03-30', 20000000),
    (72,3,4,6,'Présidence de Berlin au Bundesrat', 200, '2018-01-30', 30000000),
    (73,4,2,6,'70e anniversaire de la fondation du Bundesrat', 200, '2019-01-29', 30000000),
    (74,1,2,4,'30e anniversaire de la chute du Mur de Berlin', 200, '2019-09-10', 30000000),
    (75,4,2,6,'Présidence du Brandebourg au Bundesrat', 200, '2020-01-28', 30000000),
    (76,4,2,6,'50e anniversaire de l`agenouillement de Willy Brandt à Varsovie', 200, '2020-10-08', 30000000),
    (77,3,4,6,'Présidence de la Saxe-Anhalt au Bundesrat', 200, '2021-01-26', 666),
    (78,3,4,6,'Présidence de la Thuringe au Bundesrat', 200, '2022-01-25', 666),
    (79,1,2,4,'35e anniversaire du programme Erasmus', 200, '2022-07-01', 20000000),
    (80,3,4,6,'Présidence de Hambourg au Bundesrat', 200, '2023-01-24', 30500000);

-- remove the autoincrement for the ids, (reset) 
-- ALTER TABLE `p06_piece_modele` CHANGE COLUMN `id` `id` INT(10) UNSIGNED NOT NULL;

