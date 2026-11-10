-- Activity 1 database for the LSB Sign In project

CREATE DATABASE IF NOT EXISTS activity1_db;
USE activity1_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
