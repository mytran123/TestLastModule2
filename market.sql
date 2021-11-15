CREATE DATABASE `Market`;
USE `Market`;

CREATE TABLE `products`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name varchar (50),
    category varchar (50),
    price varchar (50),
    quantity varchar (50),
    date_create varchar (50),
    description varchar (255)
)

INSERT INTO `products`(`name`,`category`) VALUES
("Iphone X","Điện thoại"),
("Samsung Galaxy S7","Điện thoại"),
("Vinsmart Pro","Điện thoại"),
("Daikin Inverter","Điều Hòa"),
("Panasonic Inverter","Tủ lạnh"),
("Samsung Galaxy J3","Điện thoại")