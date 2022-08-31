CREATE TABLE employee (
emp_id int unique not null primary key,
job_id int not null,
emp_name varchar (100),
job_title varchar (100),
dept_id	int, 		
super_id int,
location varchar (50),
sex	varchar (1),
address varchar (250),
birth_date	date,
salary int,
from_date date,
to_date date,
FOREIGN KEY (super_id) REFERENCES employee (emp_id) ON DELETE SET NULL
);

DROP TABLE employee;
Describe employee;

CREATE TABLE asset(
asset_id int		primary key,
asset_name	varchar(20),
emp_id	int, 	
dept_id	int,
dept_mgr_id	int,
donor_id int,
project_id	int,
brand varchar (20),
spec varchar (50),
serial varchar (20), 
buy_date date,
price int,
status varchar (100)
);