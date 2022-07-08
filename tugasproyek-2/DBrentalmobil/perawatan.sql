create table perawatans (
	id INT NOT NULL AUTO_INCREMENT,
	tanggal DATETIME,
	biaya INT,
	km_mobil INT,
	deskripsi varchar(255),
	mobil_id int,
	jenis_perawatan_id int,
	PRIMARY KEY (id),
	CONSTRAINT FK_Perawatan_Jenis FOREIGN KEY (jenis_perawatan_id)
    REFERENCES jenis_perawatans(id),
	CONSTRAINT FK_Perawatan_Mobil FOREIGN KEY (mobil_id)
    REFERENCES mobils(id)
);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('10/27/2021', 155849, 654, 'adipiscing elit proin risus praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum', 1, 1);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('1/20/2022', 192462, 818, 'accumsan tellus nisi eu orci mauris lacinia sapien quis libero', 2, 2);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('3/25/2022', 620225, 894, 'odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit', 3, 1);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('4/20/2022', 984829, 24, 'etiam justo etiam pretium iaculis justo in hac habitasse platea', 4, 2);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('11/18/2021', 137120, 83, 'urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius', 5, 2);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('9/20/2021', 654155, 371, 'sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer', 6, 3);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('4/22/2022', 615297, 205, 'lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat', 7, 3);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('7/9/2021', 641881, 610, 'semper sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed', 8, 1);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('5/10/2022', 997933, 392, 'ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 9, 2);
insert into perawatans (tanggal, biaya, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) values ('8/25/2021', 715677, 57, 'venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue', 10, 1);
