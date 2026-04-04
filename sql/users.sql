CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20)
);
INSERT INTO users (username, password, role)
VALUES ('saad', '1234', 'admin');
INSERT INTO users (username, password, role)
VALUES ('waleed', '1234', 'admin');