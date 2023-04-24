DROP TABLE IF EXISTS `contacts`;

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

INSERT INTO contacts(id, name, address, city, state, phone, email, dob, contacts, age)
VALUES(1, 'Wile E. Coyote', '200 Maple Lane', 'Detroit', 'MI', '999.999.9999', 'ylee@coyote.com', '05/15/1956', 'email', '50+');
INSERT INTO contacts(id, name, address, city, state, phone, email, dob, contacts, age)
VALUES(2, 'Jerry Mouse', '333 Fromage Lane', 'Columbus', 'OH', '999.999.9999', 'jmouse@confusethecat.com', '08/23/1937', 'email', '50+');
INSERT INTO contacts(id, name, address, city, state, phone, email, dob, contacts, age)
VALUES(3, 'Bugs Bunny', '1 Sunny Place', 'Muncie', 'IN', '999.999.9999', 'rabbit@wascally.com', '02/12/1924', 'email', '50+');
INSERT INTO contacts(id, name, address, city, state, phone, email, dob, contacts, age)
VALUES(4, 'Yosemite Sam', '829 Riverside Drive', 'Phoenix', 'AZ', '999.999.9999', 'sam@yosemite.com', '12/11/1949', 'email', '50+');
INSERT INTO contacts(id, name, address, city, state, phone, email, dob, contacts, age)
VALUES(5, 'Elmer Fudd', '4545 53rd Street', 'Chicago', 'IL', '999.999.9999', 'efudd@wabbitseason.com', '06/18/1965', 'email', '50+');