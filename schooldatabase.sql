CREATE DATABASE schooldb;

CREATE TABLE schooldb.student(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(50) NULL UNIQUE,
    fullname VARCHAR (50) NOT NULL,
    birthdate DATE NOT NULL,
    is_active TINYINT NOT NULL
);

CREATE TABLE schooldb.subject(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(50) NOT NULL UNIQUE,
    is_active TINYINT NOT NULL
);

CREATE TABLE schooldb.teacher(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(50) NOT NULL,
    birthdate DATE NOT NULL,
    is_active TINYINT NOT NULL
);

CREATE TABLE schooldb.year(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    year VARCHAR(50) UNIQUE,
    is_active TINYINT NOT NULL
);

CREATE TABLE schooldb.subject_year(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    star_date VARCHAR(45) NULL,
    end_date VARCHAR(45) NULL,
    subject_id INT NOT NULL,
    year_id INT NOT NULL,
    teacher_id INT NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subject(id),
    FOREIGN KEY (year_id) REFERENCES year(id),
    FOREIGN KEY (teacher_id) REFERENCES teacher(id),
    UNIQUE (year_id, subject_id, teacher_id)
);


CREATE TABLE schooldb.student_subject_year(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    score INT NULL,
    student_id INT NOT NULL,
    subject_year_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES student(id),
    FOREIGN KEY (subject_year_id) REFERENCES subject_year(id),
    UNIQUE (student_id, subject_year_id)
);

CREATE TABLE schooldb.sequence(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL UNIQUE,
  current_value INT NOT NULL,
  is_active TINYINT NOT NULL
);

INSERT INTO schooldb.year (year, is_active) VALUES ("2017", 0);
INSERT INTO schooldb.year (year, is_active) VALUES ("2018", 0);
INSERT INTO schooldb.year (year, is_active) VALUES ("2019", 1);

INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0001","Matematica", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0002","Quimica", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0003","Ciencias Sociales", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0004","Ciencias Naturales", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0005","Fisica Fundamental", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0006","Productividad y Desarrollo", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0007","Comunicacion y Lenguaje", 1);
INSERT INTO schooldb.subject (codigo, name, is_active) VALUES ("0008","Fisica", 1);

INSERT INTO schooldb.teacher (fullname, birthdate, is_active) VALUES ("Ervin Rolando Ramirez Rivera", "1990-03-13", 1);
INSERT INTO schooldb.teacher (fullname, birthdate, is_active) VALUES ("Juan Pablo Lopez Mantar", "1993-05-10", 1);
INSERT INTO schooldb.teacher (fullname, birthdate, is_active) VALUES ("Marilin Rosalin Revolorio Leiva", "1991-10-20", 1);
INSERT INTO schooldb.teacher (fullname, birthdate, is_active) VALUES ("Mario Rene Casasola Leiva", "1992-06-28", 1);
INSERT INTO schooldb.teacher (fullname, birthdate, is_active) VALUES ("Claudia Marisol Nova Rivera", "1989-01-03", 1);

INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (1,2,1);
INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (2,2,2);
INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (3,2,3);

INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (4,3,4);
INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (5,3,5);
INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (6,3,1);
INSERT INTO schooldb.subject_year (subject_id, year_id, teacher_id) VALUES (8,3,2);
