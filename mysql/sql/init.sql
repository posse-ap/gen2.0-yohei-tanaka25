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
date date NOT NULL,
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

