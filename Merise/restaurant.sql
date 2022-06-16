create database restaurant;
go
use restaurant
go

create table roles(
	role_id int primary key AUTO_INCREMENT,
    role_name varchar(50)
);

insert into roles(role_name) values ('Administrator');
insert into roles(role_name) values ('Staff');
insert into roles(role_name) values ('User');

create table users(
	user_id int primary key AUTO_INCREMENT,
    firstname varchar(100),
    lastname varchar(100),
    adress varchar(150),
    email varchar(100) unique,
    registration_date date,
	username varchar(50) unique,
	password varchar(50),
	image varchar(100) default '../images/profile.png',
    role_id int DEFAULT 3 references roles(role_id)
);

insert into users(username, email, password) values('Mehdi', 'Mehdi@gmail.com', '123');
insert into users(username, email, password) values('Mohamed', 'Moha@gmail.com', '123');
insert into users(username, email, password) values('Hossam', 'Hossam@gmail.com', '123');
insert into users(username, email, password) values('Aziz', 'Aziz@gmail.com', '123');


create table tables(
	table_id int primary key AUTO_INCREMENT,
    type varchar(50),
	capacity int
);

insert into tables(type,capacity) values('indoor', 2);
insert into tables(type,capacity) values('indoor', 4);
insert into tables(type,capacity) values('outdoor', 2);
insert into tables(type,capacity) values('outdoor', 4);

create table ratings(
	rate_id int primary key AUTO_INCREMENT,
	value decimal,
	comment varchar(250),
	user_id int references users(user_id)
);

insert into ratings(value, comment, user_id) values(4.5, 'This cozy restaurant has left the best impressions! Hospitable hosts, delicious dishes, beautiful presentation, wide wine list and wonderful dessert. I recommend to everyone! I would like to come back here again and again.', 1);
insert into ratings(value, comment, user_id) values(4.2, 'It’s a great experience. The ambiance is very welcoming and charming. Amazing wines, food and service. Staff are extremely knowledgeable and make great recommendations.', 2);
insert into ratings(value, comment, user_id) values(4.5, 'We are so fortunate to have this place just a few minutes drive away from home. Food is stunning, both the tapas and downstairs restaurant. Cocktails wow, wine great and lovely selection of beers. Love this place and will continue to visit.', 3);


create table booking(
	table_id int references tables(table_id) AUTO_INCREMENT,
	user_id int references users(user_id),
	booking_date date,
	note varchar(200),
	primary key(table_id, user_id, booking_date)
);

insert into booking(table_id, user_id, booking_date, note) values (1, 1, '6/16/2022', '');
insert into booking(table_id, user_id, booking_date, note) values (1, 1, '6/17/2022', '');
insert into booking(table_id, user_id, booking_date, note) values (2, 2, '6/16/2022', '');
insert into booking(table_id, user_id, booking_date, note) values (1, 3, '6/16/2022', '');

create table category(
	category_id int primary key AUTO_INCREMENT,
	name varchar(50)
);

create table menu(
	item_id int primary key AUTO_INCREMENT,
	name varchar(50),
	details varchar(100),
	price decimal,
	image varchar(100),
	active bit,
	category_id int references category(category_id)
);

create table recipe(
	recipe_id int primary key AUTO_INCREMENT,
	instructions varchar(150),
	item_id int references menu(item_id)
);

create table ingredients(
	ingredient_id int primary key AUTO_INCREMENT,
	name varchar(50),
	stock_qty int,
	unit varchar(30)
);

create table composed(
	recipe_id int references recipe(recipe_id),
	ingredient_id int references ingredients(ingredient_id),
	qty int,
	primary key(recipe_id, ingredient_id)
);

create table payments(
	payment_id int primary key AUTO_INCREMENT,
	card_number varchar(20),
	card_date date,
	card_ccv varchar(3),
	user_id int references users(user_id)
);

create table [order](
	order_id int primary key AUTO_INCREMENT,
	type varchar(30),
	total_price decimal,
	order_time date,
	status varchar(50),
	user_id int references users(user_id)
);

create table order_line(
	item_id int references menu(item_id),
	order_id int references [order](order_id),
	qte int,
	note varchar(100),
	primary key(item_id,order_id)
);


create table shifts(
	shift_id int primary key AUTO_INCREMENT,
	username varchar(50) references users(username),
	check_in_date datetime
)