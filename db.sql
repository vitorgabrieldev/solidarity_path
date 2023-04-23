CREATE DATABASE solidarityPath;

USE solidarityPath;

CREATE TABLE `usuarios` (
    `Id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `Username` VARCHAR(40),
    `Email` VARCHAR(200),
    `Password` VARCHAR(220),
    `TypeUser` VARCHAR(16),
    `Creation` DATE,
    `Picture` VARCHAR(1000),
    `Dob` DATE,
    `CPF` INT(11)
    `fullName` VARCHAR(65),
    `NIS` INT(11),
    `CEP` INT(12),
    `city` VARCHAR(112),
    `RAF` VARCHAR(220),
);