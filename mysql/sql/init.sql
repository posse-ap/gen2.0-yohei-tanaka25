DROP TABLE IF EXISTS studies;
CREATE TABLE studies (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
study_id INT NOT NULL,
study_detail VARCHAR(225) NOT NULL,
color VARCHAR(225) NOT NULL
);


DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
study_date datetime NOT NULL,
study_hour INT NOT NULL,
study_detail INT NOT NULL
);


INSERT INTO studies (study_id, study_detail, color) VALUES
(1,'ドットインストール','1754EF'),
(1,'N予備校','1071BD'),
(1,'POSSE課題','20BEDE'),
(2,'JavaScript','1754EF'),
(2,'CSS','1071BD'),
(2,'PHP','20BEDE'),
(2,'HTML','3CCEFE'),
(2,'Lalavel','B29EF3'),
(2,'SQL','6D46EC'),
(2,'SHELL','4A18EF'),
(2,'情報システム基礎知識（その他）','3105C0');


INSERT INTO posts (study_date, study_hour, study_detail) VALUES
('2021-8-5', 1, 6),
('2021-9-8', 4, 3),
('2021-9-7', 3, 4),
('2021-10-13', 2, 1),
('2021-11-26', 4, 7),
('2021-12-10', 6, 2);