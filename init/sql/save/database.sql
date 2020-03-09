#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `campagne` CHARACTER SET 'utf8';
USE `campagne`;

#------------------------------------------------------------
# Table: 7ie1z_categories
#------------------------------------------------------------

CREATE TABLE 7ie1z_categories(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT 7ie1z_categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 7ie1z_roles
#------------------------------------------------------------

CREATE TABLE 7ie1z_roles(
        id   Int  Auto_increment  NOT NULL ,
        type Varchar (50) NOT NULL
	,CONSTRAINT 7ie1z_roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 7ie1z_clients
#------------------------------------------------------------

CREATE TABLE 7ie1z_clients(
        id             Int  Auto_increment  NOT NULL ,
        mail           Varchar (5) NOT NULL ,
        password       Varchar (100) NOT NULL ,
        id_7ie1z_roles Int NOT NULL
	,CONSTRAINT 7ie1z_clients_PK PRIMARY KEY (id)

	,CONSTRAINT 7ie1z_clients_7ie1z_roles_FK FOREIGN KEY (id_7ie1z_roles) REFERENCES 7ie1z_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 7ie1z_producers
#------------------------------------------------------------

CREATE TABLE 7ie1z_producers(
        id             Int  Auto_increment  NOT NULL ,
        name           Varchar (50) NOT NULL ,
        address        Text NOT NULL ,
        zip            Int NOT NULL ,
        mail           Varchar (5) NOT NULL ,
        password       Varchar (100) NOT NULL ,
        description    Text NOT NULL ,
        picture        Varchar (50) NOT NULL ,
        id_7ie1z_roles Int NOT NULL
	,CONSTRAINT 7ie1z_producers_PK PRIMARY KEY (id)

	,CONSTRAINT 7ie1z_producers_7ie1z_roles_FK FOREIGN KEY (id_7ie1z_roles) REFERENCES 7ie1z_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 7ie1z_products
#------------------------------------------------------------

CREATE TABLE 7ie1z_products(
        id                  Int  Auto_increment  NOT NULL ,
        name                Varchar (50) NOT NULL ,
        description         Text NOT NULL ,
        price               Float NOT NULL ,
        weight              Float NOT NULL ,
        picture             Varchar (50) NOT NULL ,
        id_7ie1z_producers  Int NOT NULL ,
        id_7ie1z_categories Int NOT NULL
	,CONSTRAINT 7ie1z_products_PK PRIMARY KEY (id)

	,CONSTRAINT 7ie1z_products_7ie1z_producers_FK FOREIGN KEY (id_7ie1z_producers) REFERENCES 7ie1z_producers(id)
	,CONSTRAINT 7ie1z_products_7ie1z_categories0_FK FOREIGN KEY (id_7ie1z_categories) REFERENCES 7ie1z_categories(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 7ie1z_orders
#------------------------------------------------------------

CREATE TABLE 7ie1z_orders(
        id     Int  Auto_increment  NOT NULL ,
        date   Date NOT NULL ,
        status Varchar (100) NOT NULL ,
        number Int NOT NULL
	,CONSTRAINT 7ie1z_orders_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 7ie1z_items
#------------------------------------------------------------

CREATE TABLE 7ie1z_items(
        id                Int  Auto_increment  NOT NULL ,
        quantity          Int NOT NULL ,
        id_7ie1z_products Int NOT NULL ,
        id_7ie1z_clients  Int NOT NULL ,
        id_7ie1z_orders   Int NOT NULL
	,CONSTRAINT 7ie1z_items_PK PRIMARY KEY (id)

	,CONSTRAINT 7ie1z_items_7ie1z_products_FK FOREIGN KEY (id_7ie1z_products) REFERENCES 7ie1z_products(id)
	,CONSTRAINT 7ie1z_items_7ie1z_clients0_FK FOREIGN KEY (id_7ie1z_clients) REFERENCES 7ie1z_clients(id)
	,CONSTRAINT 7ie1z_items_7ie1z_orders1_FK FOREIGN KEY (id_7ie1z_orders) REFERENCES 7ie1z_orders(id)
)ENGINE=InnoDB;

