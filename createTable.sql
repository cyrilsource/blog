CREATE TABLE Categorie (
	id INT UNSIGNED AUTO_INCREMENT,
	nom VARCHAR(150) NOT NULL,
	description VARCHAR(150) DEFAULT NULL,
	PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE Articles (
	id INT UNSIGNED AUTO_INCREMENT,
	titre VARCHAR (40) NOT NULL,
	date_publication DATETIME NOT NULL,
	extrait VARCHAR(140) NOT NULL,
	texte TEXT NOT NULL,
	type CHAR(2) NOT NULL,
	PRIMARY KEY (id),
	INDEX ind_date_publication (date_publication),
	INDEX FULLTEXT ind_Articles (titre, texte)
)ENGINE=InnoDB;

CREATE TABLE Categorie_article (
	categorie_id INT UNSIGNED,
	article_id INT UNSIGNED,
	PRIMARY KEY (categorie_id, article_id),
	CONSTRAINT fk_categorie_id FOREIGN KEY (categorie_id) REFERENCES Categorie(id),
	CONSTRAINT fk_article_id FOREIGN KEY (article_id) REFERENCES Articles(id)
) ENGINE=InnoDB;

CREATE TABLE Pages (
	id INT UNSIGNED AUTO_INCREMENT,
	titre VARCHAR (40) NOT NULL,
	texte TEXT NOT NULL,
	position INT UNSIGNED NOT NULL,
	type CHAR(2) NOT NULL,
	PRIMARY KEY (id),
	INDEX UNIQUE ind_position (position),
	INDEX FULLTEXT ind_Pages (titre, texte)
)ENGINE=InnoDB;
