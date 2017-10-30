create database course;
use course;

show tables;
# admin
select * from thehost;

# user(sign up Or log in)
select * from theguest;

# post、comment
select * from posts;

# thehost= admin
insert into thehost values(null,'Wildboar','etchbones');

# 以上用於admin、guest登入登出，admin帳號密碼已寫死在內，之後會有:新增留言、回應和刪除留言功能。 2017/10/30
