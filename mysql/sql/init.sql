-- DROP TABLE IF EXISTS questions;
-- CREATE TABLE questions (
-- id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
-- big_question_id INT NOT NULL,
-- question_id INT NOT NULL,
-- image VARCHAR(225) NOT NULL
-- );

-- INSERT INTO questions (big_question_id, question_id, image ) VALUES
-- (1, 1, 'takanawa.png' ), 
-- (1, 2, 'kameido.png '),
-- (1, 3, 'koujimati.png '),
-- (1, 4, 'onarimon.png '),
-- (1, 5, 'todoroki.png '),
-- (1, 6, 'syakujii.png '),
-- (1, 7, 'zousiki.png '),
-- (1, 8, 'okatimati.png '),
-- (1, 9, 'sisibone.png '),
-- (1, 10, 'kogure.png '),
-- (2, 1, 'mukainada.png');

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
big_question_id INT NOT NULL,
question_id INT NOT NULL,
choice1 VARCHAR(225) NOT NULL,
choice2 VARCHAR(225) NOT NULL,
choice3 VARCHAR(225) NOT NULL,
image VARCHAR(225) NOT NULL
);

INSERT INTO choices (big_question_id, question_id, choice1, choice2, choice3, image) VALUES 
(1, 1, 'たかなわ', 'こうわ', 'たかわ', 'takanawa.png'),
(1, 2, 'かめいど', 'かめと', 'かめど', 'kameido.png'),
(1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'koujimati.png' ),
(1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', 'onarimon.png'),
(1, 5, 'とどろき', 'たたら', 'たたろき', 'todoroki.png'),
(1, 6, 'しゃくじい', 'せきこうい', 'いじい', 'syakujii.png'),
(1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', 'zousiki.png'), 
(1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう','okatimati.png'),
(1, 9, 'ししぼね', 'ろっこつ', 'しこね','sisibone.png'),
(1, 10, 'こぐれ', 'こばく', 'こしゃく','kogure.png'),
(2, 1, 'むかいなだ', 'むこうひら', 'むきひら','mukainada.png');

