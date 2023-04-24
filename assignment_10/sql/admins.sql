DROP TABLE IF EXISTS `admins`;

########################
# Create admins table
########################
CREATE TABLE admins
(
  id            int          NOT NULL AUTO_INCREMENT,
  name      varchar(140)  NULL ,
  email     varchar(45)   NULL ,
  password  varchar(140)  NULL ,
  status    varchar(45)   NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO admins(id, name, email, password, status)
VALUES(1, 'Hope Heck', 'hheck@admins.com', 'adminpass', 'admin');
INSERT INTO admins(id, name, email, password, status)
VALUES(2, 'Hope Heck', 'hheck@staff.com', 'staffpass', 'staff');
