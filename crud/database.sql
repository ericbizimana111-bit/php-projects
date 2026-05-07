CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



1️⃣ What ENUM is
ENUM stands for enumeration.
It’s a special data type in MySQL that lets a column only have specific values you define.
It’s like giving MySQL a menu of choices, and it won’t allow anything outside that menu.


TIMESTAMP is a data type in MySQL that stores date and time.
Example: 2026-03-23 14:52:01

CURRENT_TIMESTAMP is a function/keyword that gives the current date and time from the server.