CREATE TABLE user(
   id_user INT NOT NULL AUTO_INCREMENT,
   pseudo VARCHAR(20) NOT NULL,
   password VARCHAR(50) NOT NULL,
   inscriptionDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   role VARCHAR(50) NOT NULL,
   email VARCHAR(50),
   PRIMARY KEY(id_user),
   UNIQUE(pseudo)
);


CREATE TABLE Topic(
   id_topic INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(20) NOT NULL,
   actif BOOLEAN NOT NULL,
   publishDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   category_id INT NOT NULL,
   user_id INT NOT NULL,
   PRIMARY KEY(id_topic),
   FOREIGN KEY(category_id) REFERENCES Category(id_category),
   FOREIGN KEY(user_id) REFERENCES User(id_user)
);

CREATE TABLE Post(
   id_poste INT NOT NULL AUTO_INCREMENT,
   texte TEXT NOT NULL,
   postDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
   user_id INT NOT NULL,
  topic_id INT NOT NULL,
   PRIMARY KEY(id_poste),
   FOREIGN KEY(user_id) REFERENCES User(id_user),
   FOREIGN KEY(topic_id) REFERENCES Topic(id_topic)
);


CREATE TABLE Category(
   id_category INT NOT NULL AUTO_INCREMENT,
   nom VARCHAR(20) NOT NULL,
   PRIMARY KEY(id_category)
);

