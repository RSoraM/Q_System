# Q_System
questionnaire system - 问卷系统

## 前言
这是一个课程设计，不要看源码，因为这很容易会让你精神错乱，怀疑这人是发什么神经，到底写的是啥。

这个问卷系统有很多安全方面的问题，比如：SQL注入

## 部署
1. LAMP 环境下拷贝到apache网站目录下
2. /config/dbconfig.php 修改数据库配置
3. 根据DDL创建数据库

## DDL

create table Q_System.t_questionnaire
(
	ID int auto_increment
		primary key,
	title varchar(20) not null,
	String varchar(1024) null,
	question varchar(10240) not null,
	status int(2) not null,
	constraint T_questionnaire_ID_uindex
		unique (ID)
)
;

create table Q_System.t_user
(
	login_ID varchar(50) not null
		primary key,
	password varchar(36) not null,
	username varchar(20) not null,
	creat_date timestamp default CURRENT_TIMESTAMP not null,
	constraint t_user_login_ID_uindex
		unique (login_ID)
)
;

create table Q_System.t_qnu
(
	Q_ID int not null
		primary key,
	U_ID varchar(50) not null,
	creat_date timestamp default CURRENT_TIMESTAMP not null,
	constraint t_QnU_Q_ID_uindex
		unique (Q_ID),
	constraint t_QnU_t_questionnaire_ID_fk
		foreign key (Q_ID) references Q_System.t_questionnaire (ID),
	constraint t_QnU_t_user_login_ID_fk
		foreign key (U_ID) references Q_System.t_user (login_ID)
)
;

create index t_QnU_t_user_login_ID_fk
	on t_qnu (U_ID)
;

create table Q_System.t_answer
(
	ID int auto_increment
		primary key,
	Q_ID int not null,
	answer varchar(10240) not null,
	constraint t_answer_ID_uindex
		unique (ID),
	constraint t_answer_t_questionnaire_ID_fk
		foreign key (Q_ID) references Q_System.t_questionnaire (ID)
)
;

create index t_answer_t_questionnaire_ID_fk
	on t_answer (Q_ID)
;

