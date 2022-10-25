create database testsite;
CREATE USER 'new_user'@'localhost' IDENTIFIED BY '340144024b17e6a6cb38b035f7995723';
GRANT ALL PRIVILEGES ON testsite.* TO 'new_user'@'localhost';
FLUSH PRIVILEGES;