/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.3.15-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `ta_detailorder` (
	`idDetail` int (11),
	`id_order` int (11),
	`statusPembayaran` varchar (150),
	`statusPengiriman` varchar (150),
	`detailJml` int (11),
	`tanggal` timestamp 
); 
insert into `ta_detailorder` (`idDetail`, `id_order`, `statusPembayaran`, `statusPengiriman`, `detailJml`, `tanggal`) values('7','18','Belum Bayar','Akan dikirim','6','2019-12-11 13:59:38');
insert into `ta_detailorder` (`idDetail`, `id_order`, `statusPembayaran`, `statusPengiriman`, `detailJml`, `tanggal`) values('9','19','Sudah Bayar','Sudah Sampai tujuan','2','2019-12-11 17:15:45');
insert into `ta_detailorder` (`idDetail`, `id_order`, `statusPembayaran`, `statusPengiriman`, `detailJml`, `tanggal`) values('10','53','Sudah Bayar','Sudah Sampai tujuan','100','2019-12-11 17:35:50');
insert into `ta_detailorder` (`idDetail`, `id_order`, `statusPembayaran`, `statusPengiriman`, `detailJml`, `tanggal`) values('11','50','Belum Bayar','Akan dikirim','3','2019-12-19 19:19:46');
