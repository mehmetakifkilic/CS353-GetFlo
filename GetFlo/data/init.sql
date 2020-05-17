CREATE DATABASE test;

  use test;

  CREATE TABLE customers(
    customerID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    gender VARCHAR(255),
    phone_number VARCHAR(20) NOT NULL
    );
ALTER TABLE customers AUTO_INCREMENT=1001;