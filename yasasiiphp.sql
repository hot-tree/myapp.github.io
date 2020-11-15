create database db1;

create user dbuser1@localhost identified by '123';
grant all on db1.* to dbuser1@localhost;

use db1;

create table recipes (
  id int not null auto_increment primary key,
  recipe_name text,
  category tinyint,
  difficulty tinyint,
  budget int,
  howto text
);

insert into recipes (recipe_name, category, difficulty, budget, howto) values
('カレーライス', 3, 2, 1000, '1.玉ねぎと鶏肉を炒める 2.水800mlを加えて10分煮る 3. ルーを加えてさらに10分煮る');

update recipes set howto = '1.玉ねぎと鶏肉を炒める
                            2.水800mlを加えて10分煮る
                            3. ルーを加えてさらに10分煮る' where id = 2;
