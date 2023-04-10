#CREATE DATABASE IF NOT EXISTS mydata;

#USE mydata;


########################
# Create date_notes table
########################
CREATE TABLE date_notes
(
  id            int          NOT NULL AUTO_INCREMENT,
  file_date     int    NULL ,
  file_note     varchar(120)  NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;