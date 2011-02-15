create table person (
		id int not null primary key auto_increment,
		employee enum('Y','N') default 'Y',
		salary decimal(8,2),
		name varchar(255),
		days_worked int not null default 0
		);

create table salary (
		id int not null primary key auto_increment,
		amount decimal(8,2),
		pay_date date,
		employee_id int
		);

