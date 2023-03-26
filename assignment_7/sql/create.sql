#CREATE DATABASE IF NOT EXISTS mydata;

#USE mydata;


########################
# Create file_locations table
########################
CREATE TABLE file_locations
(
  id            int          NOT NULL AUTO_INCREMENT,
  file_name     varchar(45)  NULL ,
  file_path     varchar(45)  NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;