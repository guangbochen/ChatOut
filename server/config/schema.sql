DROP DATABASE checkoutdb;
CREATE DATABASE IF NOT EXISTS checkoutdb;
USE checkoutdb;

CREATE TABLE IF NOT EXISTS users(
    id       INTEGER NOT NULL AUTO_INCREMENT,
    name     VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
    role     VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO users(name,password,role) VALUES('admin', 'admin','admin');
INSERT INTO users(name,password,role) VALUES('user1', 'user1','user');
INSERT INTO users(name,password,role) VALUES('user2', 'user2','user');
