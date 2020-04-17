/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.3.15-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `rating` (
	`id_rating` int (12),
	`id_user` int (12),
	`id_penjual` int (12),
	`idDetail` int (11),
	`rating` int (1)
); 
insert into `rating` (`id_rating`, `id_user`, `id_penjual`, `idDetail`, `rating`) values('2','16','11','10','3');
insert into `rating` (`id_rating`, `id_user`, `id_penjual`, `idDetail`, `rating`) values('3','16','11','10','1');
