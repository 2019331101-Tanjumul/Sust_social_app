create table  users(
reg int PRIMARY KEY,
dept varchar(200),
password varchar(200),
name varchar(200),
email varchar(200),
phone varchar(20),
address varchar(500),
image  varchar(200),
gender  varchar(10),
blood varchar(10),
dob varchar(30),
bio varchar(1000)
);

create table posts(
    post_id int PRIMARY KEY,
    reg int,
    post varchar(500),
    post_time varchar(200)
);

create table interaction(
    post_id int,
    reg int,
    post varchar(500),
    post_time varchar(200),
    interacted_id int,
    comment varchar(500) 
);

create table chats(
    chat_id varchar(300),
    from_id varchar(300),
    to_id varchar(300),
    msg varchar(500),
    sent_time varchar(200)
);


create table verification(
    reg int,
    status varchar(100) DEFAULT "unverified"
);


create table status(
    reg int,
    status varchar(100) DEFAULT "Inactive"
);

create table blocked(
    reg int,
    blocked_id int
);

create table reports(
    report_id int,
    reporter_id int,
    target_id int,
    report_details varchar(1000),
    proof varchar(300),
    reporting_time varchar(300)
);