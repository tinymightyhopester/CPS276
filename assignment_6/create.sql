#CREATE DATABASE IF NOT EXISTS mydata;

#USE mydata;


########################
# Create customers table
########################
CREATE TABLE customers
(
  id            int          NOT NULL AUTO_INCREMENT,
  firstname     varchar(45)  NULL ,
  lastname      varchar(45)  NULL ,
  cust_address  varchar(45)  NULL ,
  cust_city     varchar(45)  NULL ,
  cust_state    varchar(45)  NULL ,
  cust_zip      char(5)      NULL ,
  cust_phone    varchar(45)  NULL ,
  cust_email    varchar(45)  NULL ,
  cust_password varchar(45)  NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

#########################
# Create product_group table
#########################
CREATE TABLE product_group
(
    id          int         NOT NULL AUTO_INCREMENT,
    groupname   varchar(45) NULL,
    imagefolder varchar(45) NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

#########################
# Create product table
#########################
CREATE TABLE product
(
    id              int             NOT NULL AUTO_INCREMENT,
    groupid         int             NOT NULL,
    productname     varchar(45)     NUll,
    productprice    varchar(45)     NUll,
    productimage    varchar(45)     NUll,
    productdescription varchar(45)  NUll,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

#########################
# Create orders table
#########################
CREATE TABLE orders
(
    id              int    NOT NULL AUTO_INCREMENT,
    ordertimestamp  int    NULL,
    customerid      int    NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

#########################
# Create order_info table
#########################
CREATE TABLE order_info
(
    id          int     NOT NULL AUTO_INCREMENT,
    orderid     int     NOT NULL,
    productid   int     NOT NULL,
    amount      int     NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;