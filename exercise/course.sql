create database course;
use course;

show tables;
# admin
select * from thehost;

# user(sign up Or login)
select * from theguest;

# post
select * from posts;

# thehost= admin
insert into thehost values(null,'Wildboar','etchbones');

# 以上用於admin、guest登入登出，admin帳號密碼已寫死在內，之後會有:新增留言、刪除留言功能。 2017/10/30

# 因為要執行'註冊成為會員且登入才能發表留言'，這功能
# 所以使用Log.php中的sign up(Update theguest .......)以加入會員
insert into theguest values (null,'west','mingo');
/* 
CREATE TABLE `course`.`thehost` (
  `idhost` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `password` VARCHAR(55) NOT NULL
  PRIMARY KEY (`idhost`));

CREATE TABLE `course`.`theguest` (
  `idguest` INT NOT NULL AUTO_INCREMENT,
  `guestname` VARCHAR(25) NOT NULL,
  `guestpassword` VARCHAR(55) NOT NULL,
  PRIMARY KEY (`idtheguset`));

CREATE TABLE `course`.`post` (
  `idposts` INT NOT NULL AUTO_INCREMENT,
  `body` VARCHAR(175) NOT NULL,
  `post_time` DATETIME NULL,
  `who_say` VARCHAR(65) NULL,
  PRIMARY KEY (`idposts`));
*/
