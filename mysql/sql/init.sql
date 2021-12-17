DROP TABLE IF EXISTS study_languages;
CREATE TABLE study_languages (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
study_type_id INT NOT NULL,
study_language VARCHAR(225) NOT NULL
);

INSERT INTO study_languages (study_type_id, study_language) VALUES
(1,'JavaScript'),
(1,'CSS'),
(1,'PHP'),
(1,'HTML'),
(1,'Lalavel'),
(1,'SQL'),
(1,'SHELL'),
(1,'情報システム基礎知識（その他)');

DROP TABLE IF EXISTS study_contents;
CREATE TABLE study_contents (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
study_type_id INT NOT NULL,
study_content VARCHAR(225) NOT NULL
);

INSERT INTO study_contents (study_type_id, study_content) VALUES
(2,'ドットインストール'),
(2,'N予備校'),
(2,'POSSE課題');

DROP TABLE IF EXISTS colors;
CREATE TABLE colors(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
color VARCHAR(225) NOT NULL 
);

INSERT INTO colors (color) VALUES 
('1754EF'),
('1071BD'),
('20BEDE'),
('3CCEFE'),
('B29EF3'),
('6D46EC'),
('4A18EF'),
('3105C0');


DROP TABLE IF EXISTS study_data;
CREATE TABLE study_data (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
study_date datetime NOT NULL,
study_type_id INT NOT NULL,
study_id INT NOT NULL,
study_hour INT NOT NULL
);

INSERT INTO study_data (study_date, study_type_id, study_id, study_hour) VALUES
('2021-10-1', 1, 1, 2),
('2021-12-3', 2, 2, 3),
('2021-12-5', 2, 3, 6),
('2021-12-7', 1, 4, 2),
('2021-12-9', 1, 5, 1);