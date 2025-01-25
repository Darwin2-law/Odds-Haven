-- Create users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255),
  second_name VARCHAR(255),
  last_name VARCHAR(255),
  password VARCHAR(255)
);

-- Create notifications table
CREATE TABLE notifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  message TEXT,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a sample user
INSERT INTO users (first_name, second_name, last_name, password)
VALUES ('John', 'Doe', 'Smith', 'password123');

-- Insert a sample notification
INSERT INTO notifications (message)
VALUES ('New match odds available!');
