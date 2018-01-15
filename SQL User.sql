#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE USER(
        id           int (11) Auto_increment  NOT NULL ,
        userName     Varchar (255) NOT NULL ,
        email        Varchar (255) NOT NULL ,
        password     Varchar (255) NOT NULL ,
        biography    Text ,
        profilePic   Varchar (255) ,
        id_USERGROUP Int NOT NULL ,
        id_RANK      Int NOT NULL ,
        id_STATUS    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USERGROUP
#------------------------------------------------------------

CREATE TABLE USERGROUP(
        id        int (11) Auto_increment  NOT NULL ,
        groupName Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RANK
#------------------------------------------------------------

CREATE TABLE RANK(
        id       int (11) Auto_increment  NOT NULL ,
        rankName Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: STATUS
#------------------------------------------------------------

CREATE TABLE STATUS(
        id         int (11) Auto_increment  NOT NULL ,
        statusName Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;

ALTER TABLE USER ADD CONSTRAINT FK_USER_id_USERGROUP FOREIGN KEY (id_USERGROUP) REFERENCES USERGROUP(id);
ALTER TABLE USER ADD CONSTRAINT FK_USER_id_RANK FOREIGN KEY (id_RANK) REFERENCES RANK(id);
ALTER TABLE USER ADD CONSTRAINT FK_USER_id_STATUS FOREIGN KEY (id_STATUS) REFERENCES STATUS(id);
