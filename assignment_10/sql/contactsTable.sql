########################
# Create contacts table
########################
CREATE TABLE contacts
(
  id       int          NOT NULL AUTO_INCREMENT,
  name     varchar(140)  NULL ,
  address  varchar(45)  NULL ,
  city     varchar(45)  NULL ,
  state    varchar(45)  NULL ,
  phone    varchar(45)  NULL ,
  email    varchar(45)  NULL ,
  dob      varchar(45)  NULL ,
  contacts varchar(140) NULL,
  age      int NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;