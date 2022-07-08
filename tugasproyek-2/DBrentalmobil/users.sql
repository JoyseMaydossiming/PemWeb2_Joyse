create table users (
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(50),
	password VARCHAR(50),
	email VARCHAR(50),
	created_at DATE,
	last_login DATE,
	status INT,
	role VARCHAR(5),
	PRIMARY KEY (id)
);
insert into users (id, username, password, email, created_at, last_login, status, role) values (1, 'sfinicj0', '6b6UUrKh', 'smoyce0@thetimes.co.uk', '11/14/2021', '10/9/2021', 0, 'admin');
insert into users (id, username, password, email, created_at, last_login, status, role) values (2, 'nhumpatch1', 'oicP8R', 'gwinckworth1@disqus.com', '10/8/2021', '4/15/2022', 0, 'admin');
insert into users (id, username, password, email, created_at, last_login, status, role) values (3, 'kwillmot2', 'raVyLm5', 'mmathieson2@amazon.co.jp', '1/5/2022', '7/27/2021', 2, 'user');
insert into users (id, username, password, email, created_at, last_login, status, role) values (4, 'vbenzi3', 'Qi6H46xA', 'cchastel3@ca.gov', '1/6/2022', '5/17/2022', 0, 'user');
insert into users (id, username, password, email, created_at, last_login, status, role) values (5, 'ldradey4', 'JtpM2BSiTPGw', 'afollis4@t.co', '8/28/2021', '1/8/2022', 2, 'user');
insert into users (id, username, password, email, created_at, last_login, status, role) values (6, 'fmcmurty5', 'LSdl0SOrx', 'lruppertz5@phoca.cz', '11/17/2021', '9/8/2021', 2, 'user');
insert into users (id, username, password, email, created_at, last_login, status, role) values (7, 'tdive6', 'EDo7nf', 'jableson6@bbc.co.uk', '12/27/2021', '12/4/2021', 0, 'user');
insert into users (id, username, password, email, created_at, last_login, status, role) values (8, 'kgush7', '3vqHGS2d', 'zstockport7@bbb.org', '12/21/2021', '10/29/2021', 0, 'admin');
insert into users (id, username, password, email, created_at, last_login, status, role) values (9, 'smote8', 'xKAERvUQt', 'drogliero8@guardian.co.uk', '10/23/2021', '7/31/2021', 0, 'user');
insert into users (id, username, password, email, created_at, last_login, status, role) values (10, 'rturbefield9', 'uIALU9fhvq', 'cruddock9@booking.com', '1/23/2022', '8/8/2021', 0, 'user');
