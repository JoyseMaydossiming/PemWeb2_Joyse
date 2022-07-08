create table sewas (
	id INT NOT NULL AUTO_INCREMENT,
	tanggal_mulai DATE,
	tanggal_akhir DATE,
	tujuan VARCHAR(50),
	noktp VARCHAR(50),
	users_id int,
	mobil_id int,
	PRIMARY KEY (id),
	CONSTRAINT FK_Sewa_User FOREIGN KEY (users_id)
    REFERENCES users(id),
	CONSTRAINT FK_Sewa_Mobil FOREIGN KEY (mobil_id)
    REFERENCES mobils(id)
);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('5/18/2022', '12/12/2021', 'Načeradec', '52-3798279', 1, 1);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('7/16/2021', '11/5/2021', 'Reading', '99-3011405', 2, 2);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('1/22/2022', '4/24/2022', 'Beruniy', '98-5496293', 3, 3);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('3/8/2022', '8/10/2021', 'Akita', '41-1809085', 4, 4);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('1/17/2022', '5/3/2022', 'Pancheng', '07-1850113', 5, 5);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('8/18/2021', '4/2/2022', 'Timaru', '37-8721868', 6, 6);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('1/12/2022', '7/20/2021', 'Yantan', '74-1802635', 7, 7);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('1/14/2022', '10/1/2021', 'Youlongchuan', '15-7765809', 8, 8);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('12/29/2021', '11/9/2021', 'Taishanmiao', '10-8529979', 9, 9);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('10/19/2021', '1/3/2022', 'Guatire', '13-1229482', 7, 10);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('3/26/2022', '4/16/2022', 'Dniprodzerzhyns’k', '95-7886264', 1, 11);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('12/24/2021', '4/1/2022', 'Qal‘ah-ye Shāhī', '62-9251475', 10, 12);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('3/10/2022', '8/22/2021', 'Pôrto Barra do Ivinheima', '97-1197359',9, 13);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('10/10/2021', '10/20/2021', 'Zafarwāl', '96-4724127', 1, 14);
insert into sewas ( tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) values ('8/14/2021', '12/6/2021', 'Kafr Nubl', '88-2780266', 10, 15);
