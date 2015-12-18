CREATE TABLE categories
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  cname VARCHAR(100)
);

CREATE TABLE products
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  pname VARCHAR(100) NOT NULL,
  category_id INT NOT NULL,
  price DECIMAL(8,2) NOT NULL,
  quantity INT NOT NULL,
  image VARCHAR(30) NOT NULL,
  rating INT DEFAULT 0 NOT NULL,
  description VARCHAR(500) NOT NULL,
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE users
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(50),
  email VARCHAR(100) NOT NULL,
  active CHAR(1) DEFAULT 'Y' NOT NULL,
  password VARCHAR(10) NOT NULL,
  isadmin CHAR(1) DEFAULT 'N' NOT NULL,
  createdon TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE UNIQUE INDEX email ON users (email);
CREATE UNIQUE INDEX email_2 ON users (email);
CREATE UNIQUE INDEX email_3 ON users (email);

