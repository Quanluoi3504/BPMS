create schema final_project;
use final_project;
create table tbl_user (
	user_id int(11) primary key auto_increment,
    username varchar(50) not null,
    user_pass varchar(100) not null,
    email varchar(50) not null unique key,
    full_name varchar(100),
--     customer_address varchar(255),
--     customer_phone int(10) unique key,
--     customer_email varchar(50) unique key,
--     customer_message text,
    is_accessible int default 1
);

create table tbl_category (
	cate_id int(11) primary key auto_increment,
    cate_name varchar(255)
);


create table tbl_product(
	prd_id int(11) primary key auto_increment,
    prd_name varchar(255) not null,
    prd_price decimal(8,0) not null,
    prd_image varchar(255),
    cate_id int(11) not null,
    prd_color varchar(255) not null,
    prd_title varchar(255) not null,
    prd_material varchar(255) not null,
    prd_weight int not null,
    prd_size varchar(255) not null,
    is_displayed int default 1,
    foreign key(cate_id) references tbl_category(cate_id)
);
    
-- create table tbl_order (
-- 	ord_id int(11) primary key auto_increment,
--     customer_id int(11) not null,
--     prd_id int(11),
--     ord_amount int(5) not null,
--     ord_buy_date DATETIME not null,
--     ord_total_price DECIMAL(8,0) not null,
--     ord_status varchar(50) not null,
--     foreign key(prd_id) references tbl_product(prd_id),
-- 	foreign key(customer_id) references tbl_user(user_id)
-- );

insert into tbl_category(cate_name)
values
('Balo Nam'),
('Balo Nữ'),
('Balo Du lịch'),
('Balo Da'),
('Balo Laptop');

insert into tbl_product(prd_name,prd_price,prd_image,cate_id,prd_color,prd_title,prd_material,prd_weight,prd_size)
values
('Sakos',639.000,'macbook.jpg',1,"red,blue,black","Balo laptop 14 inch Sakos Frontier","Polyester, Nylon, PE, PU kháng nước","0.5","27x15x40");
