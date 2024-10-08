DROP DATABASE IF EXISTS mvc_users;
CREATE DATABASE mvc_users;
USE mvc_users;

CREATE TABLE users (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL UNIQUE,
	email VARCHAR(50) NOT NULL UNIQUE,
	password VARCHAR(50) NOT NULL ,
	active INT(1) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
