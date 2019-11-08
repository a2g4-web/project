#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: categories
#------------------------------------------------------------

CREATE TABLE categories(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (255) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: articles
#------------------------------------------------------------

CREATE TABLE articles(
        id                  Int  Auto_increment  NOT NULL ,
        article_name        Varchar (255) NOT NULL ,
        article_description Text NOT NULL ,
        price               Int NOT NULL ,
        id_categories       Int NOT NULL
	,CONSTRAINT articles_PK PRIMARY KEY (id)

	,CONSTRAINT articles_categories_FK FOREIGN KEY (id_categories) REFERENCES categories(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: events
#------------------------------------------------------------

CREATE TABLE events(
        id                Int  Auto_increment  NOT NULL ,
        event_name        Varchar (255) NOT NULL ,
        location          Varchar (255) NOT NULL ,
        date              Date NOT NULL ,
        event_description Text NOT NULL ,
        price             Int NOT NULL ,
        recurrent         Bool NOT NULL
	,CONSTRAINT events_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: campus
#------------------------------------------------------------

CREATE TABLE campus(
        id       Int  Auto_increment  NOT NULL ,
        location Varchar (255) NOT NULL
	,CONSTRAINT campus_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: images
#------------------------------------------------------------

CREATE TABLE images(
        id        Int  Auto_increment  NOT NULL ,
        url       Varchar (255) NOT NULL ,
        id_events Int NOT NULL
	,CONSTRAINT images_PK PRIMARY KEY (id)

	,CONSTRAINT images_events_FK FOREIGN KEY (id_events) REFERENCES events(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: usertypes
#------------------------------------------------------------

CREATE TABLE usertypes(
        id   Int  Auto_increment  NOT NULL ,
        type Varchar (255) NOT NULL
	,CONSTRAINT usertypes_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id           Int  Auto_increment  NOT NULL ,
        last_name    Varchar (255) NOT NULL ,
        first_name   Varchar (255) NOT NULL ,
        email        Varchar (255) NOT NULL ,
        password     Varchar (255) NOT NULL ,
        id_campus    Int NOT NULL ,
        id_usertypes Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_campus_FK FOREIGN KEY (id_campus) REFERENCES campus(id)
	,CONSTRAINT users_usertypes0_FK FOREIGN KEY (id_usertypes) REFERENCES usertypes(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sells
#------------------------------------------------------------

CREATE TABLE sells(
        id       Int  Auto_increment  NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT sells_PK PRIMARY KEY (id)

	,CONSTRAINT sells_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaries
#------------------------------------------------------------

CREATE TABLE commentaries(
        id         Int  Auto_increment  NOT NULL ,
        commentary Text NOT NULL ,
        id_images  Int NOT NULL ,
        id_users   Int NOT NULL
	,CONSTRAINT commentaries_PK PRIMARY KEY (id)

	,CONSTRAINT commentaries_images_FK FOREIGN KEY (id_images) REFERENCES images(id)
	,CONSTRAINT commentaries_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: likes
#------------------------------------------------------------

CREATE TABLE likes(
        id        Int  Auto_increment  NOT NULL ,
        id_images Int NOT NULL ,
        id_users  Int NOT NULL
	,CONSTRAINT likes_PK PRIMARY KEY (id)

	,CONSTRAINT likes_images_FK FOREIGN KEY (id_images) REFERENCES images(id)
	,CONSTRAINT likes_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sold
#------------------------------------------------------------

CREATE TABLE sold(
        id          Int NOT NULL ,
        id_articles Int NOT NULL
	,CONSTRAINT sold_PK PRIMARY KEY (id,id_articles)

	,CONSTRAINT sold_sells_FK FOREIGN KEY (id) REFERENCES sells(id)
	,CONSTRAINT sold_articles0_FK FOREIGN KEY (id_articles) REFERENCES articles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participate
#------------------------------------------------------------

CREATE TABLE participate(
        id       Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT participate_PK PRIMARY KEY (id,id_users)

	,CONSTRAINT participate_events_FK FOREIGN KEY (id) REFERENCES events(id)
	,CONSTRAINT participate_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;

