-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table mu_sp_fc.rb_analisa_hasil
CREATE TABLE IF NOT EXISTS `rb_analisa_hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table mu_sp_fc.rb_analisa_hasil: 2 rows
DELETE FROM `rb_analisa_hasil`;
/*!40000 ALTER TABLE `rb_analisa_hasil` DISABLE KEYS */;
INSERT INTO `rb_analisa_hasil` (`id`, `nama`, `alamat`, `no_telp`, `jenis_kelamin`, `penyakit`, `waktu`) VALUES
	(1, 'aa', 'carat', '082323244232', 'Laki-laki', 'PK002', '2019-07-17 18:08:26'),
	(2, 'tes user', 'carat', '+628331231334', 'Laki-laki', 'PK005', '2019-07-17 18:11:28');
/*!40000 ALTER TABLE `rb_analisa_hasil` ENABLE KEYS */;

-- Dumping structure for table mu_sp_fc.rb_gejala
CREATE TABLE IF NOT EXISTS `rb_gejala` (
  `id` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `ifyes` varchar(5) NOT NULL DEFAULT '0',
  `ifno` varchar(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table mu_sp_fc.rb_gejala: 25 rows
DELETE FROM `rb_gejala`;
/*!40000 ALTER TABLE `rb_gejala` DISABLE KEYS */;
INSERT INTO `rb_gejala` (`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES
	(4, 'Apakah Rubella kongenitalis ?', '5', '6'),
	(5, 'Apakah Infeksi sitomegalovirus bawaan ?', '6', '7'),
	(6, 'Apakah Ensefalitis ?', '7', '8'),
	(7, 'Apakah Toksoplasmosis kongenitalis ?', 'PK002', '8'),
	(8, 'Apakah Kesalahan pada jumlah kromosom (Sindroma Down)?', '9', '10'),
	(9, 'Apakah Defek pada kromosom (sindroma X yang rapuh, sindroma Angelman, sindroma Prader-Willi) ? ', '10', '11'),
	(10, 'Apakah Translokasi kromosom dan sindroma cri du chat ?', 'PK003', '11'),
	(11, 'Apakah Galaktosemia ?', '12', '13'),
	(12, 'Apakah Penyakit Tay-Sachs ?', '13', '14'),
	(13, 'Apakah Fenilketonuria ?', '14', '15'),
	(1, 'Apakah Perdarahan intrakranial sebelum atau sesudah lahir ?', '2', '3'),
	(2, 'Apakah Hipoksia (kekurangan oksigen), sebelum, selama atau sesudah lahir ?', '3', '4'),
	(14, 'Apakah Sindroma Hunter ?', '15', '16'),
	(15, 'Apakah Leukodistrofi metakromatik ?', '16', '17'),
	(16, 'Apakah Adrenoleukodistrofi ?', '17', '18'),
	(17, 'Apakah Sindroma Lesch-Nyhan ?', '18', '19'),
	(18, 'Apakah Sindroma Rett ?', 'PK004', '19'),
	(19, 'Apakah Sindroma Reye ?', '20', '21'),
	(20, 'Apakah Dehidrasi hipernatremik ?', '21', '22'),
	(21, 'Apakah Hipotiroid kongenital ?', '22', '23'),
	(22, 'Apakah Hipoglikemia ?', 'PK005', '23'),
	(23, 'Apakah Pemakaian alkohol, amfetamin dan obat lain pada ibu hamil ?', '24', '25'),
	(24, 'Apakah Keracunan metilmerkuri ?', '25', '26'),
	(25, 'Apakah Keracunan timah hitam ?', 'PK006', 'PK010'),
	(3, 'tidak ada di DB', '4', '5');
/*!40000 ALTER TABLE `rb_gejala` ENABLE KEYS */;

-- Dumping structure for table mu_sp_fc.rb_penyakit
CREATE TABLE IF NOT EXISTS `rb_penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `penyakit` text NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table mu_sp_fc.rb_penyakit: 10 rows
DELETE FROM `rb_penyakit`;
/*!40000 ALTER TABLE `rb_penyakit` DISABLE KEYS */;
INSERT INTO `rb_penyakit` (`id_penyakit`, `penyakit`, `keterangan`, `solusi`) VALUES
	('PK010', '<center>Penyakit Tidak Ditemukan, silahkan berkonsultasi langsung dengan pakar.</center>', 'Tidak ada Keterangan,..', 'Tidak Di temukan solusi...'),
	('PK009', 'Marasmik', 'Marasmik adalah gangguan saluran pencernaan, keadaan kurang gizi yang disebabkan rendahnya konsumsi energi dan protein dalam makanan sehari-hari sehingga tidak memenuhi Angka Kecukupan Gizi', 'Solusinya adalah dengan menkonsumsi makanan yang memiliki protein tinggi.'),
	('PK005', 'Metabolik', 'Penyakit metabolik adalah penyakit medis yang berkaitan dengan produksi energi di dalam sel manusia (atau hewan). Kebanyakan penyakit metabolik adalah penyakit genetik atau penyakit keturunan, meski sebagian di antaranya disebabkan makanan, racun, infeksi, dan sebagainya. Penyakit metabolik genetik dikenal juga dengan sebutan gangguan metabolisme sejak lahir.\r\nSalah satu penyakit metabolik yang terkenal dan banyak penderitanya adalah penyakit gula atau diabetes mellitus. Namun banyak di antaranya merupakan penyakit langka.', 'Tanaman obat atau obat-obatan tradisional lebih cocok untuk pengobatan penyakit metabolik dan degeneratif itu karena efek samping yang ditimbulkan relatif kecil sehingga dianggap lebih aman.'),
	('PK006', 'Keracunan', 'Keracunan adalah masuknya suatu zat dalam tubuh dalam jumlah tertentu dapat menyebabkan reaksi tubuh yang tidak diinginkan bahkan dapat menimbulkan kematian. Keracunan juga bisa dikatakan sebagai reaksi kimia yang merusak jaringan tubuh atau mengganggu fungsi tubuh. ', '1. Jika racun tertelan, encerkan racun tsb, plus halangi penyerapan menggunakan air biasa, susu atau telur mentah, norit 2 sdt dalam 1 gelas air ( roti dibakar), teh pekat, antasida (promag).\r\n\r\n2. Kosongkan lambung untuk memutahkan jika kurang dari 4 jam dengan merangsang tenggorokan dengan jari.\r\n\r\n3. Beri oksigen murni.'),
	('PK007', 'Kwashiorkor', ' kwashiorkor adalah sebuah fenomena penyakit di Indonesia bisa diakibatkan karena kekurangan protein kronis pada anak-anak yang sering disebabkan beberapa hal, antara lain anak tidak cukup mendapat makanan bergizi, anak tidak mendapat asuhan gizi yang memadai dan anak mungkin menderita infeksi penyakit.', 'Memerlukan tindakan secepat mungkin dengan restorasi volume darah dan mengkontrol tekanan darah. Pada tahap awal, kalori diberikan dalam bentuk karbohidrat, gula sederhana, dan lemak. Protein diberikan setelah semua sumber kalori lain telah dapat menberikan tambahan energi. Vitamin dan mineral dapat juga diberikan.'),
	('PK008', 'Marasmus', 'Marasmus adalah salah satu bentuk kekurangan gizi yang buruk paling sering ditemui pada balita penyebabnya antara lain karena masukan makanan yang sangat kurang, infeksi, pembawaan lahir, prematuritas, penyakit pada masa neonatus serta kesehatan lingkungan.', 'Cara mengobati penyakit busung lapar harus kepada akar permasalahnnya, dimana tindakan preventif yang harus dilakuikan melalui, peran keluarga, masyarakat, dan khususnya pemerintah, semuanya merupakan peran penting untuk menanggulangi penyakit busung lapar, agar tidak terjadi kekurangan gizi.\r\n\r\nJika sudah terjadi, tindakan yang harus dilakukan adalah tindakan medis, dimana untuk memenuhi gizi pun sangat susah apalagi harus berobat kedokter dengan biaya mahal. obat herballah solusinya, sebagai cara mengobati penyakit busung lapar, yang ekonomis.\r\n\r\nObat herbal yang ekonomis, aman, cepat dan bergizi adalah gamat gold g, insya alloh gamat gold g dapat menyembuhkan penyakit busung lapar.'),
	('PK001', 'Trauma (sebelum dan sesudah lahir)', 'Trauma psikologis adalah jenis kerusakan jiwa yang terjadi sebagai akibat dari peristiwa traumatik. Ketika trauma yang mengarah pada gangguan stres pasca trauma, kerusakan mungkin melibatkan perubahan fisik di dalam otak dan kimia otak, yang mengubah respon seseorang terhadap stres masa depan.', 'Berbagai model psikoterapi telah dikembangakan untuk mengatasi PTSD, seperti, terapi perilaku, desensitisasi, hipnoterapi, semuanya cukup efektif asal penderita juga mendapatkan dukungan dari masyarakat lingkunganya dan juga orang terdekatnya.\r\n\r\nPerlu untuk dibedakan, apakah seseorang sudah mengarah pada PTSD atau masih PTS (post traumatic sympton). Kalaupun masih PTS tidak akan sampai menimbulkan gangguan berat, masih dapat ditangani oleh psikolog yang terlatih. Yang perlu dilakukan adalah jangan sampai PTS menjadi PTSD.'),
	('PK002', 'Infeksi (bawaan dan sesudah lahir)', 'Infeksi adalah kolonalisasi yang dilakukan oleh spesies asing terhadap organisme inang, dan bersifat pilang membahayakan inang. Organisme penginfeksi, atau patogen, menggunakan sarana yang dimiliki inang untuk dapat memperbanyak diri, yang pada akhirnya merugikan inang. Patogen mengganggu fungsi normal inang dan dapat berakibat pada luka kronik, gangrene, kehilangan organ tubuh, dan bahkan kematian. Respons inang terhadap infeksi disebut peradangan. Secara umum, patogen umumnya dikategorikan sebagai organisme mikroskopik, walaupun sebenarnya definisinya lebih luas, mencakup bakteri, parasit, fungi, virus, prion, dan viroid.', 'Sama dengan penyakit akibat infeksi lainnya, pengobatan infeksi pada umumnya dilakukan dokter dengan pemberian antibiotik. Jangan minum antibiotik sembarangan, ikuti resep dan pengobatan dokter hingga tuntas. Sebaiknya Anda segera memeriksakan diri ke dokter, jika merasakan gejala penyakit infeksi.'),
	('PK003', 'Kelainan kromosom', 'merupakan peristiwa hilangnya sebagian kromosom karena kromosom tersebut patah. Potongan kromosom yang tidak memiliki sentromer akan tertinggal dalam anafase dan hancur dalam plasma. Kromosom dapat patah di satu tempat dekat ujung kromosom sehingga bagian ujung kromosom terbuang (delesi terminal) atau dapat terjadi kepatahan di dua tempat , dan mengakibatkan hilangnya suatu segmen di bagian tengah kromosom (delesi interkalar)', 'Menjaga kesehatan janin tidak hanya dilakukan dengan menghindari teratogen, tetapi juga dengan mengkonsumsi gizi yang baik.\r\n      Salah satu zat yang penting untuk pertumbuhan janin adalah asam folat. Kekurangan asam folat bisa meningkatkan resiko terjadinya spina bifida atau kelainan tabung saraf lainnya. Karena spina bifida bisa terjadi sebelum seorang wanita menyadari bahwa dia hamil, maka setiap wanita usia subur sebaiknya mengkonsumsi asam folat minimal sebanyak 400 mikrogram/hari.'),
	('PK004', 'Kelainan genetik dan kelainan metabolik yang diturunkan.', 'Penyakit genetik atau kelainan genetik adalah sebuah kondisi yang disebabkan oleh kelainan oleh satu atau lebih gen yang menyebabkan sebuah kondisi fenotipe klinis.', 'Pada kasus hamil kosong, embrio tidak dapat berkembang sempurna menjadi janin, sehingga dapat keluar sendiri. Dokter ahli kandungan akan melakukan tindakan suction atau evakuasi berupa kuretase. Dianjurkan kuretase dilakukan sebelum usia kehamilan 14 minggu untuk mengurangi komplikasi, seperti: perdarahan, infeksi, perforasi uterus (berlubangnya rahim), dsb. Teknik kuretase dapat menggunakan kuret tajam atau vakum.');
/*!40000 ALTER TABLE `rb_penyakit` ENABLE KEYS */;

-- Dumping structure for table mu_sp_fc.rb_setting
CREATE TABLE IF NOT EXISTS `rb_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mu_sp_fc.rb_setting: ~0 rows (approximately)
DELETE FROM `rb_setting`;
/*!40000 ALTER TABLE `rb_setting` DISABLE KEYS */;
INSERT INTO `rb_setting` (`id`, `nama`, `id_pertanyaan`) VALUES
	(1, 'pertanyaan_pertama', 1);
/*!40000 ALTER TABLE `rb_setting` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
