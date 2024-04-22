CREATE DATABASE IF NOT EXISTS nombreDB;

USE nombreDB;

CREATE TABLE IF NOT EXISTS fruits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO fruits (name, quantity) VALUES
    ('Apple', 10),
    ('Banana', 10),
    ('Cherry', 10);