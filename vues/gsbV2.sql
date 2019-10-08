drop database if exists gsbV2;
Create database gsbV2;
use gsbV2;

create table FraisForfait (
id_FraisForfait				varchar (5) not null,
libelle						varchar(30) not null,
montant						float(10),
primary key (id_FraisForfait)
)ENGINE = InnoDB;

create table Etat (
id_Etat						varchar (5) not null,
libelle						varchar(30) not null,
primary key (id_Etat)
)ENGINE = InnoDB;

create table Visiteur (
id_Visiteur					varchar (5) not null,
nom							varchar(30) not null,
prenom						varchar(30) not null,
login						varchar(30) not null,
mdp				varchar(30) not null,
adresse 					varchar(30) ,
cp							char(10) not null,
ville						varchar(30) ,
dateEmbauche				date not null,
primary key (id_Visiteur)
)ENGINE = InnoDB;

create table FicheFrais (
id_Visiteur					varchar(5)not null,
mois						varchar(30),
nbJustificatifs				char(20),
montantValide				char(20),
dateModif					date not null,
id_Etat						varchar(30) not null,
primary key (id_Visiteur, mois )
)ENGINE = InnoDB;

create table LigneFraisForfait (
id_Visiteur					varchar(5)not null,
mois						varchar(30),
id_FraisForfait				varchar(5) not null,
quantite					int,
primary key (id_Visiteur, mois, id_FraisForfait)
)ENGINE = InnoDB;

create table LigneFraisHorsForfait (
id_FraisHorsForfait			int  auto_increment,
id_Visiteur 				varchar(5),
mois						varchar(30),
libelle						varchar(30),
dateHF						varchar(30) not null,
montant						float(30),
primary key (id_FraisHorsForfait)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
	session_id      varchar(40)    DEFAULT '0' NOT NULL,
	ip_address      varchar(16)    DEFAULT '0' NOT NULL,
	user_agent      varchar(120)   NOT NULL,
	last_activity   int(10)        unsigned DEFAULT 0 NOT NULL,
	user_data       text           NOT NULL,

	PRIMARY KEY (session_id),

	KEY `last_activity_idx` (`last_activity`)
)ENGINE = InnoDB;

alter table FicheFrais add constraint foreign key (id_Etat) references Etat(id_Etat);
alter table FicheFrais add constraint foreign key (id_Visiteur) references Visiteur(id_Visiteur);

alter table LigneFraisForfait add constraint foreign key (id_Visiteur, mois) references FicheFrais(id_Visiteur, mois);
alter table LigneFraisForfait add constraint foreign key (id_FraisForfait) references FraisForfait(id_FraisForfait);

alter table LigneFraisHorsForfait add constraint foreign key (id_Visiteur) references Visiteur(id_Visiteur);
alter table LigneFraisHorsForfait add constraint foreign key (id_Visiteur, mois) references FicheFrais(id_Visiteur, mois);


INSERT INTO `FraisForfait` (`id_FraisForfait`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', 110.00),
('KM', 'Frais Kilométrique', 0.62),
('NUI', 'Nuitée Hôtel', 80.00),
('REP', 'Repas Restaurant', 25.00);

INSERT INTO `Etat` (`id_Etat`, `libelle`) VALUES
('RB', 'Remboursée'),
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('VA', 'Validée et mise en paiement');						
	
INSERT INTO `Visiteur` (`id_Visiteur`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES
('a131', 'Villechalane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21'),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23'),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01'),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09'),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11'),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21'),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12'),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23'),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11'),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18'),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11'),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14'),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11'),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12'),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01'),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10'),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01'),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01'),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10'),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01'),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '1985-11-01');


INSERT INTO fichefrais VALUES("a55", "October 2019","","",'2019-09-01',"CR");
INSERT INTO fichefrais VALUES("a55", "November 2019","","",'2019-09-01',"CR");
INSERT INTO fichefrais VALUES("a55", "Decmeber 2019","","",'2019-09-01',"CR");
INSERT INTO fichefrais VALUES("a55", "April 2019","","",'2019-09-01',"CR");
INSERT INTO fichefrais VALUES("a55", "May 2019","","",'2019-09-01',"CR");
INSERT INTO fichefrais VALUES("a55", "June 2019","","",'2019-09-01',"CR"); 

drop user if exists Visiteurs@localhost;
drop user if exists Responsables@localhost;
drop user if exists Comptables@localhost;
drop user if exists Visiteurs@192.172.1.13;
drop user if exists Responsables@192.172.1.13;
drop user if exists Comptables@192.172.1.13;
drop user if exists admindb@192.172.1.13;

create user Visiteurs@192.172.1.13;
create user Responsables@192.172.1.13;
create user Comptables@192.172.1.13;
create user admindb@192.172.1.13;

grant all privileges on * to admindb@192.172.1.13 identified by "password" with grant option;
-- Reponsables
grant all privileges on * to Responsables@192.172.1.13 identified by "mdp" with grant option;

-- Visiteurs
grant select, delete, insert on FicheFrais to Visiteurs@192.172.1.13 identified by "mdp";

-- Comptables
grant all privileges on * to Comptables@192.172.1.13 identified by "mdp";

select * from FicheFrais;
select *from lignefraisforfait;





