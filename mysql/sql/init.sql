DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
big_question_id INT NOT NULL,
question_id INT NOT NULL,
choice0 VARCHAR(225) NOT NULL,
choice1 VARCHAR(225) NOT NULL,
choice2 VARCHAR(225) NOT NULL,
image VARCHAR(225) NOT NULL
);

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
big_question_id INT NOT NULL,
question_title VARCHAR(225) NOT NULL
);



INSERT INTO choices (big_question_id, question_id, choice0, choice1, choice2, image) VALUES 
(1, 1, 'たかなわ', 'こうわ', 'たかわ', 'Tokyo1.png'),
(1, 2, 'かめいど', 'かめと', 'かめど', 'Tokyo2.png'),
(1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'Tokyo3.png' ),
(1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', 'Tokyo4.png'),
(1, 5, 'とどろき', 'たたら', 'たたろき', 'Tokyo5.png'),
(1, 6, 'しゃくじい', 'せきこうい', 'いじい', 'Tokyo6.png'),
(1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', 'Tokyo7.png'), 
(1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう','Tokyo8.png'),
(1, 9, 'ししぼね', 'ろっこつ', 'しこね','Tokyo9.png'),
(1, 10, 'こぐれ', 'こばく', 'こしゃく','Tokyo10.png'),
(2, 1, 'むかいなだ', 'むこうひら', 'むきひら','Hiroshima1.png'),
(2, 2, 'みつぎ', 'みよし', 'おしらべ','Hiroshima2.png'),
(2, 3, 'かなやま', 'ぎんざん', 'きやま','Hiroshima3.png'),
(2, 4, 'とよひ', 'とよか', 'としか','Hiroshima4.png'),
(2, 5, 'いしぐろ', 'いしあぜ', 'しゃくぜ','Hiroshima5.png'),
(2, 6, 'みよし', 'みかた', 'みつぎ','Hiroshima6.png'),
(2, 7, 'うずい', 'もみち', 'くもおり','Hiroshima7.png'),
(2, 8, 'すもも', 'ぽんかん', 'でこぽん','Hiroshima8.png'),
(2, 9, 'おおちごとうげ', 'おうちごとうげ', 'おおちごえとうげ','Hiroshima9.png'),
(2, 10, 'よおろほよばら', 'ていぼよはら', 'てっぽよばら','Hiroshima10.png');

INSERT INTO questions (big_question_id, question_title) VALUES
(1, '東京の難読地名クイズ'),
(2, '広島の難読地名クイズ');