/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.3.15-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `orderpesanan` (
	`id_order` int (11),
	`id_user` int (11),
	`produkID` int (11),
	`jmlOrder` float ,
	`almtOrder` varchar (300),
	`orderStatus` varchar (60),
	`tanggal` datetime 
); 
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('18','11','1','6','Balong','Diproses','2019-12-10 16:12:45');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('19','16','4','2','Tebet','Diproses','2019-12-10 16:12:50');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('20','16','4','3','Manggarai','Diproses','2019-12-11 16:24:45');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('21','11','1','3','Salemba','Diproses','2019-12-11 13:23:29');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('23','11','1','7','Kaliurang','Diproses','2019-12-11 13:23:26');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('24','11','2','30','Bawen','Diproses','2019-12-11 13:23:23');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('27','11','13','1','Sewon','Diproses','2019-12-11 13:23:20');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('45','11','2','2','Jelambar','Diproses','2019-12-11 13:23:17');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('46','11','13','3','Jelambar','Diproses','2019-12-11 13:23:11');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('47','11','12','3','Jelambar','Diproses','2019-12-11 13:23:08');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('48','11','10','3','Brebes','Diproses','2019-12-11 17:06:02');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('49','16','4','2','Gang Rusa','Diproses','2019-12-11 17:15:14');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('50','16','5','3','Ngipik','Diproses','2019-12-11 17:15:17');
insert into `orderpesanan` (`id_order`, `id_user`, `produkID`, `jmlOrder`, `almtOrder`, `orderStatus`, `tanggal`) values('53','16','5','100','Kopeng','Diproses','2019-12-11 17:35:42');
