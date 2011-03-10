create table contact (
		id int not null primary key auto_increment,
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		company varchar(255),
		moreinfo text
	);
