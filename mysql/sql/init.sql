DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
name VARCHAR(225) NOT NULL
);

INSERT INTO questions (name) VALUES ('東京の難読地名クイズ'), ('広島県の難読地名クイズ');


DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
question_id INT NOT NULL,
name VARCHAR(225) NOT NULL,
valid INT NOT NULL
);

INSERT INTO choices (question_id, name, valid ) VALUES 
(1 ,'たかなわ',1),
(1 ,'たかわ' ,0),
(1 ,'こうわ' ,0),
(2 ,'かめと' ,0),
(2 ,'かめど' ,0),
(2 ,'かめいど',1 ),
(3 ,'もこうひら',0),
(3 ,'むきひら',0),
(3 ,'むかいなだ',1);
