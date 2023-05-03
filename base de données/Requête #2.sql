CREATE TABLE Users(
   id_user INT NOT NULL AUTO_INCREMENT,
   pseudo VARCHAR(20) NOT NULL,
   password VARCHAR(50) NOT NULL,
   inscriptionDate DATE NOT NULL,
   role VARCHAR(50) NOT NULL,
   email VARCHAR(50),
   PRIMARY KEY(id_user),
   UNIQUE(pseudo)
);

CREATE TABLE Category(
   id_category INT NOT NULL AUTO_INCREMENT,
   nom VARCHAR(20) NOT NULL,
   PRIMARY KEY(id_category)
);

CREATE TABLE Topic(
   id_topic INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(20) NOT NULL,
   actif BOOLEAN NOT NULL,
   publishDate DATE NOT NULL,
   id_category INT NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_topic),
   FOREIGN KEY(id_category) REFERENCES Category(id_category),
   FOREIGN KEY(id_user) REFERENCES Users(id_user)
);

CREATE TABLE Post(
   id_poste INT NOT NULL AUTO_INCREMENT,
   texte TEXT NOT NULL,
   postDate DATE NOT NULL,
   id_user INT NOT NULL,
   id_topic INT NOT NULL,
   PRIMARY KEY(id_poste),
   FOREIGN KEY(id_user) REFERENCES Users(id_user),
   FOREIGN KEY(id_topic) REFERENCES Topic(id_topic)
);
