########################
# Create admins table
########################
CREATE TABLE admins
(
  id            int          NOT NULL AUTO_INCREMENT,
  name     varchar(140)  NULL ,
  email    varchar(45)  NULL ,
  password    varchar(140)  NULL ,
  status    varchar(45)  NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;