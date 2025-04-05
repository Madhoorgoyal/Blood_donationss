CREATE DATABASE blood_donation;
USE blood_donation;

-- Table for Donations
CREATE TABLE donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    age INT NOT NULL,
    blood_type VARCHAR(10) NOT NULL,
    last_donation_date DATE,
    preferred_date DATE,
    message VARCHAR(255)
);

-- Table for Blood Requests
CREATE TABLE requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    age INT NOT NULL,
    blood_type VARCHAR(10) NOT NULL,
    hospital_name VARCHAR(255) NOT NULL,
    reason VARCHAR(255),
    preferred_date DATE NOT NULL,
    status VARCHAR(20) DEFAULT 'pending'
);

-- Table for Deleted Donors
CREATE TABLE deleted_donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    age INT NOT NULL,
    blood_type VARCHAR(10) NOT NULL,
    last_donation_date DATE,
    preferred_date DATE,
    deletion_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Feedback
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    rating INT ,
    message VARCHAR(255)
);
