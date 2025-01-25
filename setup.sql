-- Create Database
CREATE DATABASE IF NOT EXISTS your_database;

-- Use the created database
USE your_database;

-- Create members table
CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- Unique identifier for each member
    first_name VARCHAR(50) NOT NULL,          -- Member's first name
    last_name VARCHAR(50) NOT NULL,           -- Member's last name
    username VARCHAR(50) NOT NULL UNIQUE,     -- Member's unique username
    password VARCHAR(255) NOT NULL,           -- Encrypted password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp for when the user is created
);
