DROP DATABASE IF EXISTS christmas_list;
CREATE DATABASE christmas_list;
USE christmas_list;

CREATE TABLE users (
  userID int(11) NOT NULL AUTO_INCREMENT,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  email varchar(50) NOT NULL UNIQUE,
  password varchar(50) NOT NULL,
  PRIMARY KEY (userID)
);

INSERT INTO users (userID, firstName, lastName, email, password) VALUES
(1000, 'John', 'Doe', 'johndoe@gmail.com', 'pass123'),
(1001, 'Jane', 'Dough', 'janedough@gmail.com', 'P@$$123'),
(1002, 'Tony', 'Seidl', 'aseidl@umich.edu', 'pa55word'),
(1003, 'Frank', 'Newman', 'fnewman@gmail.com', 'BigFrank123'),
(1004, 'Bob', 'Charles', 'charlesb@yahoo.com', 'CharlesBob89'),
(1005, 'Harley', 'James', 'hjames@gmail.com', 'HarleyJammer*'),
(1006, 'Kelly', 'Sellers', 'sellersk@gmail.com', 'SellThem*Keller123'),
(1007, 'Jacob', 'Johns ', 'jj123@gmail.com', 'JacobJohnsJJ');

CREATE TABLE items (
  userID int(11) NOT NULL,
  name varchar(50) NOT NULL,
  store varchar(50) NOT NULL,
  price decimal(10,2) NOT NULL,
  priority varchar(6) NOT NULL DEFAULT 'Medium',
  link varchar(100) DEFAULT NULL,
  purchased tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (userID, name)
);

INSERT INTO items (userID, name, store, price, priority, link, purchased) VALUES
(1000, 'Toy Car', 'Amazon', '10.50', 'Medium', 'https://www.amazon.com', 0),
(1000, 'PS5', 'Best Buy', '500.00', 'High', 'https://www.bestbuy.com', 0),
(1000, 'Avengers: Endgame', 'Target', '30.00', 'Low', 'https://www.target.com', 0),
(1001, 'PS5', 'Best Buy', '500.00', 'Medium', 'https://bestbuy.com', 0),
(1001, 'Samsung TV', 'Walmart', '749.99', 'High', 'https://www.walmart.com', 0),
(1001, 'Stuffed Animal', 'Target', '35.99', 'Low', 'https://www.target.com', 0),
(1002, 'Xbox Series X', 'Best Buy', '500.00', 'High', 'https://www.bestbuy.com', 0),
(1002, 'Air Pods', 'Amazon', '149.99', 'Medium', 'https://www.amazon.com', 0);

CREATE TABLE friends (
  userID int(11) NOT NULL,
  friendID int(11) NOT NULL,
  PRIMARY KEY (userID, friendID)
);

INSERT INTO friends (userID, friendID) VALUES
(1000, 1001),
(1000, 1002),
(1000, 1003),
(1002, 1000),
(1001, 1003),
(1004, 1002),
(1004, 1003),
(1005, 1001),
(1007, 1006),
(1006, 1007),
(1005, 1007),
(1003, 1001),
(1003, 1007),
(1003, 1002),
(1003, 1006);

CREATE TABLE priorities (
  ranking tinyint(3) NOT NULL,
  priority varchar(6) NOT NULL,
  PRIMARY KEY (ranking)
);

INSERT INTO priorities (ranking, priority) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO web_user@localhost
IDENTIFIED BY 'sesame';
