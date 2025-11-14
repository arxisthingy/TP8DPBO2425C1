CREATE DATABASE IF NOT EXISTS tp_mvc25;
USE tp_mvc25;

CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    nidn VARCHAR(20) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    join_date DATE NULL
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10) NOT NULL UNIQUE,
    course_name VARCHAR(255) NOT NULL,
    sks INT NOT NULL,
    lecturer_id INT NULL, 
    
    FOREIGN KEY (lecturer_id) REFERENCES Lecturers(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE publications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title TEXT NOT NULL,
    journal_name VARCHAR(255) NULL,
    publication_year YEAR NOT NULL,
    lecturer_id INT NOT NULL,
    
    FOREIGN KEY (lecturer_id) REFERENCES Lecturers(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO Lecturers (name, nidn, phone, join_date) VALUES
('Dr. Budi Santoso', '1234567890', '081234567890', '2010-09-01'),
('Prof. Citra Lestari', '0987654321', '081345678901', '2005-03-15'),
('Dr. Ahmad Fauzi', '1122334455', '081567890123', '2015-01-10'),
('Dr. Dewi Anggraini', '4455667788', '081789012345', '2018-06-20');

INSERT INTO Courses (course_code, course_name, sks, lecturer_id) VALUES
('CS101', 'Basis Data', 3, 1),
('AI201', 'Kecerdasan Buatan', 3, 2),
('WEB102', 'Pemrograman Web', 3, 3),
('NET301', 'Jaringan Komputer', 4, 1),

INSERT INTO Publications (title, journal_name, publication_year, lecturer_id) VALUES
('Advanced Deep Learning Models for Image Recognition', 'IEEE Transactions', 2023, 2),
('Optimization Techniques for Relational Databases', 'Jurnal Ilmiah Komputer', 2022, 1),
('Natural Language Processing for Bahasa Indonesia', 'International Conference on AI (IJCAI)', 2024, 2),
('Comparative Analysis of Modern Web Frameworks', 'Journal of Web Technology', 2023, 3);