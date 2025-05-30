-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3307
-- Üretim Zamanı: 29 Nis 2025, 22:49:49
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphaneee`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favori`
--

CREATE TABLE `favori` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `favori`
--

INSERT INTO `favori` (`id`, `kullanici_id`, `kitap_id`) VALUES
(12, 13, 26),
(14, 13, 31),
(15, 13, 30),
(16, 13, 37),
(17, 13, 68),
(18, 13, 29),
(19, 13, 75),
(20, 13, 32),
(21, 48, 71),
(22, 47, 9),
(23, 47, 11),
(24, 48, 47),
(25, 47, 71),
(26, 47, 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `isim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `isim`) VALUES
(53, 'Roman'),
(55, 'Şiir'),
(56, 'Felsefe'),
(60, 'Bilim Kurgu'),
(61, 'Korku Gerilim'),
(62, 'Polisiye'),
(63, 'Fantastik'),
(64, 'Bilim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kiralama`
--

CREATE TABLE `kiralama` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `kira_tarihi` date NOT NULL,
  `son_teslim_tarihi` date NOT NULL,
  `teslim_edilme_tarihi` date NOT NULL,
  `aktiflik` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kiralama`
--

INSERT INTO `kiralama` (`id`, `kullanici_id`, `kitap_id`, `kira_tarihi`, `son_teslim_tarihi`, `teslim_edilme_tarihi`, `aktiflik`) VALUES
(113, 13, 10, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(114, 13, 11, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(115, 13, 11, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(116, 13, 9, '2023-05-08', '2023-05-03', '2023-05-08', 0),
(117, 13, 10, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(118, 13, 10, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(119, 13, 10, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(120, 13, 11, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(121, 13, 10, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(122, 13, 10, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(123, 13, 9, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(124, 13, 9, '2023-05-08', '2023-05-28', '2023-05-08', 0),
(125, 13, 23, '2023-05-09', '2023-05-29', '2023-05-09', 0),
(126, 13, 15, '2023-05-10', '2023-05-30', '2023-05-10', 0),
(127, 13, 15, '2023-05-10', '2023-05-30', '2023-05-10', 0),
(128, 13, 31, '2023-05-11', '2023-05-31', '2023-05-11', 0),
(129, 13, 27, '2023-05-11', '2023-05-31', '2023-05-11', 0),
(130, 13, 28, '2023-05-11', '2023-05-31', '2023-05-22', 0),
(131, 13, 25, '2023-05-11', '2023-05-31', '2023-05-22', 0),
(132, 13, 27, '2023-05-11', '2023-05-31', '2023-05-18', 0),
(133, 13, 74, '2023-05-18', '2023-06-07', '2023-05-18', 0),
(134, 13, 74, '2023-05-22', '2023-06-11', '0000-00-00', 1),
(135, 13, 32, '2023-05-23', '2023-06-12', '2023-05-23', 0),
(136, 13, 32, '2023-05-23', '2023-06-12', '2023-05-23', 0),
(137, 13, 75, '2023-05-23', '2023-06-12', '0000-00-00', 1),
(138, 13, 73, '2023-05-23', '2023-06-12', '0000-00-00', 1),
(139, 46, 67, '2023-06-30', '2023-07-20', '2023-06-30', 0),
(140, 46, 74, '2023-06-30', '2023-07-20', '2023-06-30', 0),
(141, 46, 57, '2023-06-30', '2023-07-20', '2023-06-30', 0),
(142, 47, 75, '2025-04-06', '2025-04-26', '2025-04-06', 0),
(143, 47, 9, '2025-04-07', '2025-04-27', '2025-04-08', 0),
(144, 48, 47, '2025-04-08', '2025-04-28', '2025-04-08', 0),
(145, 47, 75, '2025-04-08', '2025-04-28', '0000-00-00', 1),
(146, 47, 72, '2025-04-28', '2025-05-18', '2025-04-28', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap`
--

CREATE TABLE `kitap` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `isim` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `sayfa_sayisi` int(11) NOT NULL,
  `ozet` text NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `yayinevi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kapak` varchar(30) NOT NULL,
  `ucret` decimal(10,2) DEFAULT 10.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kitap`
--

INSERT INTO `kitap` (`id`, `isbn`, `isim`, `stok`, `sayfa_sayisi`, `ozet`, `yazar_id`, `yayinevi_id`, `kategori_id`, `kapak`, `ucret`) VALUES
(9, '9789750719387', 'Hayvan Çiftliği', 18, 152, 'İngiliz yazar George Orwell (1903-1950), ülkemizde daha çok 1984 adlı kitabıyla tanınır. Hayvan Çiftliği, onun çağdaş klasikler arasına girmiş ikinci ünlü yapıtıdır. 1940\'lardaki \'reel sosyalizm\'in eleştirisi olan bu roman, dünya edebiyatında \'yergi\' türünün başyapıtlarından biridir. Hayvan Çiftliği\'nin kişileri hayvanlardır.\r\nGeorge Orwell, bu romanında tarihsel bir gerçeği eleştirmektedir. Romandaki önder domuzun, düpedüz Stalin\'i simgelediği açıkça görülecektir. Öbür kişiler bire bir belli olmasalar da, bir diktatörlük ortamında yer alabilecek kişilerdir. Romanın alt başlığı Bir Peri Masalı\'dır. Küçükleri eğlendirecek bir peri masalı değildir; ama roman, bir masal anlatımıyla yazılmıştır.', 17, 3, 53, '..\\img\\kitap\\1743959186.jpeg', 30.00),
(10, '9789750718533', '1984', 33, 352, 'George Orwell’in kült kitabı Bin Dokuz Yüz Seksen Dört, yazarın geleceğe ilişkin bir kâbus senaryosudur. Bireyselliğin yok edildiği, zihnin kontrol altına alındığı, insanların makineleşmiş kitlelere dönüştürüldüğü totaliter bir dünya düzeni, romanda inanılmaz bir hayal gücüyle, en ince ayrıntısına kadar kurgulanmıştır. Geçmişte ve günümüzde dünya sahnesinde tezgâhlanan oyunlar düşünüldüğünde, ütopik olduğu kadar gerçekçi bir romandır Bin Dokuz Yüz Seksen Dört. Güncelliğini hiçbir zaman yitirmeyen bir başyapıttır; yalnızca yarına değil, bugüne de ilişkin bir uyarı çığlığıdır.', 17, 3, 53, '..\\img\\kitap\\1743959212.jpeg', 10.00),
(11, '9786053757818', 'Fahrenheit 451', 1, 208, 'Guy Montag bir itfaiyeciydi. Televizyonun hüküm sürdüğü bu dünyada kitaplar ise yok olmak üzereydi zira itfaiyeciler yangın söndürmek yerine ortalığı ateşe veriyordu. Montag’ın işi ise yasadışı olanların en tehlikelisini yakmaktı: Kitapları. \r\nMontag yaptığı işi tek bir gün dahi sorgulamamıştı ve tüm gününü televizyonla kaplı odalarda geçiren eşi Mildred’la beraber yaşıyordu. Ancak yeni komşusu Clarisse’le tanışmasıyla tüm hayatı değişti. Kitapların değerini kavramaya başlayan Montag artık tüm bildiklerini sorgulayacaktı.\r\nİnsanların uğruna canlarını feda etmeyi göze aldığı bu kitapların içinde ne vardı? Gerçeklerin farkına vardıktan sonra bu karanlık toplumda artık yaşanabilir miydi?', 18, 7, 60, '..\\img\\kitap\\1743959870.jpeg', 10.00),
(14, '9789750726439', 'Simyacı', 14, 184, 'Simyacı, Brezilyalı eski şarkı sözü yazarı Paulo Coelho\'nun, yayınlandığı 1988 yılından bu yana dünyayı birbirine katan, eleştirmenler tarafından bir `fenomen\' olarak değerlendirilen üçüncü romanı. Simyacı, altı yılda kırk iki ülkede yedi milyondan fazla sattı. Bu, Gabriel Garcia Marquez\'den bu yana görülmemiş bir olay. Yüreğinde, çocukluğunu yitirmemiş olan okurlar için bir `klasik\' kimliği kazanan Simyacı\'yı Saint-Exupery\'nin Küçük Prens\'i ve Richard Bach\'ın Martı Jonathan Livingston\'u ile karşılaştıranlar var (Publishers Weekly). Simyacı, İspanya\'dan kalkıp Mısır Piramitlerinin eteklerinde hazinesini aramaya giden Endülüslü çoban Santiago\'nun masalsı yaşamının felsefi öyküsü. Sanki bir `nasihatnâme\': `Yazgına nasıl egemen olacaksın, mutluluğunu nasıl kuracaksın?\' sorularına yanıt arayan bir hayat ve ahlak kılavuzu. Mistik bir peri masalına benzeyen romanın altı yılda, yedi milyondan fazla okur bulmasının gizi, kuşkusuz, onun bu kılavuzluk niteliğinden kaynaklanıyor. Simyacı\'yı okumak, herkes daha uykudayken, güneşin doğuşunu seyretmek için şafak vakti uyanmaya benziyor.', 19, 3, 53, '..\\img\\kitap\\1743959919.jpeg', 10.00),
(15, '9789750730153', 'Veronika Ölmek İstiyor', 22, 198, 'Veronika, her istediğine sahip görünen, renkli bir yaşam süren, yakışıklı erkeklerle gezip tozan genç bir kadın olmasına karşın, mutlu değildir. Yaşamında bir şeylerin eksikliğini hissetmektedir. Başarısız bir intihar girişiminin ardından, kendine geldiği zaman bir akıl hastanesindedir. Üstelik çok kısa bir ömrü kaldığını öğrenir. Zaten ölmek isteyen Veronika bu süreçte, başka dünyaların insanlarını tanırken kendisini de keşfetmeye başlar…\r\nPaulo Coelho’nun ülkemize yakın bir coğrafyada, Bosna ve Slovenya’da geçen Veronika Ölmek İstiyor adlı romanı, var oluşumuzun her dakikasına yaşam ile ölüm arasında bir seçim olarak yaklaşıyor. Toplumun alışılmış kalıplarının dışına çıkan, farklı düşünceleri yüzünden önyargıları göğüslemek zorunda kalan insanları anlatıyor.', 19, 3, 53, '..\\img\\kitap\\1743959964.jpeg', 10.00),
(16, '9789750758126', 'Akra\'da Bulunan Elyazması', 22, 152, 'Düşman onlardan çok daha üstün, ertesi sabah saldırıya geçecekti.\r\nHalkın çoğunluğu, yenileceklerini bildiği halde, şehirde kalmayı seçti.\r\nO akşam, her yaştan kadınlı erkekli bir grup, Kıpti dedikleri Yunanlı’yı dinlemek için meydanda toplandı.\r\nKıpti, hiçbir dine mensup değildi; sadece bütün duyduklarını, yarına aktarabilmek için aklında tutmuştu.\r\nKıpti, yalnızca içinde bulunduğu âna ve Moira denen varlığa inanırdı.\r\nYarından itibaren şu anda ahenk olarak gördüğümüz şey ahenksizliğe dönüşecek. Mutluluğun yerini matem alacak,” dedi Kıpti.\r\n“Şehrimizi talan edebilirler, ama burada öğrendiklerimizi silemezler. İşte bu yüzden ilmimizin surlarımız, evlerimiz ve sokaklarımızla aynı kaderi paylaşmasına izin veremeyiz… Peki ilim derken neyi kastediyorum?\r\nİlimle, gündelik yaşamın karşımıza çıkardığı zorlukların üstesinden gelerek hayatta kalmamızı sağlayan şeyi kastediyorum.', 19, 3, 53, '..\\img\\kitap\\1743960001.jpeg', 10.00),
(17, '9786052650950', 'Güneşin Altın Elmaları', 33, 392, 'Bir kupa dolusu güneş ışığı için roketle Güneş’e giden bir kaptan, deniz fenerine âşık olan bir deniz canavarı, sevildiğini hissetmek isteyen bir cadı, kişisel cennetlerini keşfeden astronotlar…\r\nSıradan yaşamın tuhaf, gizemli ve büyülü yanlarını, bilimkurgu ve fantazinin arasındaki sınırları esneterek anlatan öyküler içeren Güneşin Altın Elmaları’nda Bradbury aile, iktidar, hayal gücü, yalnızlık ve uygarlık gibi temaları kendine has dili ve üslubuyla işleyerek insanlık tarihinin dramatik bir özetini çıkarıyor âdeta.\r\nİnsanlık başka dünyalara hasret olmaya mahkûm mudur? Yoksa tüm arzularımızı karşılayan bir dünya mümkün mü?', 18, 7, 60, '..\\img\\kitap\\1743960080.jpeg', 10.00),
(18, '9786258475128', 'Topraktan Dönenler', 53, 144, 'Fahrenheit 451, Mars Yıllıkları ve Uğursuz Bir Şey Geliyor Bu Yana gibi kitaplarıyla spekülatif kurgunun her alanında ölümsüz klasiklere imza atan Ray Bradbury’nin 2001’de yayımlanan eseri Topraktan Dönenler, kısa öykülerin bir araya getirilmesiyle inşa edilmiş bir korku romanı. Bradbury, Sonbahar Ülkesi’yle de akraba metinlere ev sahipliği yapan bu kitabında, ruhumuzu donduran öyküleri kendine has sıcaklığıyla kaleme almaya devam ediyor.\r\nÖnce “Ev” vardı, ardından asil kedi Anuba geldi. Onu, başka zihinlere, başka bedenlere yolculuk yapabilen Cecy izledi. Sonra bir örümcek ve bir fare. Ve elbette, o evdeki Aile üyelerine hiç benzemeyen, ölüm soluyan hortlak ahalisinin ortasına yaşam dolu bir aziz gibi düşen Timothy... Ardından anlaşıldı ki dünya değişiyordu, ölüm ve korkularla kurulan ilişkiler sarsılıyordu. Ölümsüz varlıkların bu hayattaki yeri neresi olmalıydı?\r\nTopraktan geldi insan, peki toprağa döndü mü?', 18, 7, 61, '..\\img\\kitap\\1743960118.jpeg', 10.00),
(20, '9786254054891', 'Olağanüstü Bir Gece', 5, 80, 'Olağanüstü Bir Gece, seçkin bir burjuva olarak rahat ve tasasız varoluşunu sürdürürken giderek duyarsızlaşan bir adamın hayatındaki dönüştürücü deneyimin hikâyesidir. Sıradan bir pazar gününü at yarışlarında geçirirken, belki de ilk kez burjuva ahlakından saparak “suç” işler. Böylece yeniden “hissetmeye” başladığını, kötücül ve ateşli hazları olan gerçek bir insan olduğunu fark eder. İçindeki haz dolu esrime, aynı günün akşamında onu gece âleminin son atıklarının arasına, “hayatın en dibindeki lağımlara” sürükleyecek, varış noktası ise ruhani bir uyanış olacaktır.\r\n', 20, 5, 53, '..\\img\\kitap\\1743960208.jpeg', 10.00),
(21, '9786254055515', 'Satranç', 12, 88, 'Stefan Zweig, çok geniş bir psikoloji birikimini eserlerinde bütünüyle kullanmış ender yazarlardandır. Onun dünya edebiyatında bir biyografi yazarı olarak kazandığı haklı ünün temelinde de bu özelliği, yani yazarlığının yanı sıra çok usta bir psikolog olması yatar. Satranç, Zweig’ın psikolojik birikimini bütünüyle devreye soktuğu bir öyküdür ve bu öykünün baş kişileri, tamamen yazarın biyografilerinde ele aldığı kişileri işleyiş biçimiyle sergilenmiştir. Zweig ölümünden hemen önce tamamladığı birkaç düzyazı metinden biri olan Satranç’ı kaleme aldığı sırada, karısı Lotte Zweig ile birlikte göç ettiği Brezilya’da yaşamaktaydı. Satranç’ta da, olay yeri olarak New York’tan Buenos Aires’e gitmekte olan bir yolcu gemisini seçmiştir. Bu gemide tamamen rastlantı sonucu karşılaşan üç kişi; yeni dünya satranç şampiyonu Mirko Czentovic, sıradan bir satranç oyuncusu olan anlatıcı ve bir zamanlar çok usta bir satranç oyuncusu olan, ama hayli zamandır satrançtan uzak kalmış bulunan Dr. B., öykünün aktörleridir.', 20, 5, 53, '..\\img\\kitap\\1743960265.jpeg', 10.00),
(22, '9786254290237', 'Karmaşık Duygular', 33, 264, 'Zweig insani duyguları büyük bir ustalıkla çözümleyebilmesini keskin gözlemciliğine ve psikolojik derinliğine borçludur. Benzersiz maceralar, büyük sırlar, marazi saplantılar, duygusal ikilemler ve gerilimler, bu sayede çağları aşarak, her devrin okuruna hitap edebilen anlatılara dönüşür. Bu derlemedeki novella ve öykülerinde de, duygudaşlığı elden bırakmadan insan doğasının en iyi ve en kötü yanlarını gözler önüne serer. Bunlar sevgiye, ölüme, yitirilen ve yeniden canlanan umuda, yeniden kazanılan inanca, gençliğe ve insanın kendini keşfine dair yapıtlardır.', 20, 5, 53, '..\\img\\kitap\\1743960311.jpeg', 10.00),
(23, '9789753638036', 'İçimizdeki Şeytan', 14, 267, '\"İsteyip istemediğimi doğru dürüst bilmediğim, fakat neticesi aleyhime çıkarsa istemediğimi iddia ettiğim bu nevi söz ve fiillerimin daimi bir mesulünü bulmuştum: Buna içimdeki şeytan diyordum, müdafaasını üzerime almaktan korktuğum bütün hareketlerimi ona yüklüyor ve kendi suratıma tüküreceğim yerde, haksızlığa, tesadüfün cilvesine uğramış bir mazlum gibi nefsimi şefkat ve ihtimama layık görüyordum. Halbuki ne şeytanı azizim, ne şeytanı? Bu bizim gururumuzun, salaklığımızın uydurması... İçimizdeki şeytan pek de kurnazca olmayan bir kaçamak yolu... İçimizdeki şeytan yok... İçimizdeki aciz var... Tembellik var... İradesizlik, bilgisizlik ve bunların hepsinden daha korkunç bir şey: hakikatleri görmekten kaçmak itiyadı var...\" Bu romanında, toplumsal gündemin kişilikler üzerindeki baskısını ve güçsüz insanın \"kapana kısılmışlığını\" gösteriyor Sabahattin Ali. Aydın geçinenlerin karanlığına, \"insanın içindeki şeytan\"a keskin bir bakış.', 21, 8, 53, '..\\img\\kitap\\1743960378.jpeg', 10.00),
(24, '9789753638029', 'Kürk Mantolu Madonna', 14, 160, '\"Her gün, daima öğleden sonra oraya gidiyor, koridorlardaki resimlere bakıyormuş gibi ağır ağır, fakat büyük bir sabırsızlıkla asıl hedefine varmak isteyen adımlarımı zorla zapt ederek geziniyor, rastgele gözüme çarpmış gibi önünde durduğum \"Kürk Mantolu Madonna\"yı seyre dalıyor, ta kapılar kapanıncaya kadar orada bekliyordum.\" Kimi tutkular rehberimiz olur yaşam boyunca. Kollarıyla bizi sarar. Sorgulamadan peşlerinden gideriz ve hiç pişman olmayacağımızı biliriz. Yapıtlarında insanların görünmeyen yüzlerini ortaya çıkaran Sabahattin Ali, bu kitabında güçlü bir tutkunun resmini çiziyor. Düzenin sildiği kişiliklere, yaşamın uçuculuğuna ve aşkın olanaksızlığına (?) dair, yanıtlanması zor sorular soruyor.', 21, 8, 53, '..\\img\\kitap\\1743960415.jpeg', 10.00),
(25, '9789753639019', 'Bütün Şiirleri - Sabahattin Ali', 21, 161, '\"Aşkını candan duymuşum\r\nCanım yoluna koymuşum\r\nTam dokuz yaşındaymışım\r\nDünyaya geldiğin zaman.\r\n\r\nKimbilir nasıl güzeldin,\r\nGöklerden yere süzüldün\r\nBenim alnıma yazıldın\r\nDünyaya geldiğin zaman.\"\r\n\r\nDağlar ve Rüzgar, Kurbağanın Serenadı ve öteki şiirler...', 21, 8, 55, '..\\img\\kitap\\1743960466.jpeg', 10.00),
(26, '9789750814068', 'Henüz Vakit Varken Gülüm', 42, 112, 'Henüz vakit varken, gülüm,\r\nParis yanıp yıkılmadan,\r\nhenüz vakit varken, gülüm,\r\nyüreğim dalındayken henüz,\r\nben bir gece, şu Mayıs gecelerinden biri\r\nVolter Rıhtımı’nda dayayıp seni duvara\r\nöpmeliyim ağzından\r\nsonra dönüp yüzümüzü Notrdam’a\r\nçiçeğini seyretmeliyiz onun,\r\nbirden bana sarılmalısın, gülüm,\r\nkorkudan, hayretten, sevinçten\r\nve de sessiz sessiz ağlamalısın,\r\nyıldızlar da çiselemeli\r\nincecikten bir yağmurla karışarak.', 22, 8, 55, '..\\img\\kitap\\1743960521.jpeg', 10.00),
(27, '9789750804465', 'Yaşamak Güzel Şey Be Kardeşim', 12, 169, 'Nazım Hikmet\'in sayısı sadece üç olan romanları yaratıcı çalışmaları içinde daha sınırlı sayıda olsa da, yazarı bütüncül olarak tanımak için vazgeçilmez bir okuma oluşturuyor. Genelde Nazım Hikmet\'in bireye, topluma, olaylara ve olgalara \"tarihsel diyalektik\" açıdan bakışını veren bu romanlar, aynı zamanda, özellikle Yaşamak Güzel Şey Be Kardeşim\'de gizli bir otobiyografi niteliği de taşıyor.\r\n\"Nazım Hikmet Külliyatı\" bu romanlarsız düşünülemez..', 22, 8, 53, '..\\img\\kitap\\1743960560.jpeg', 10.00),
(28, '9786053754794', 'Dune', 42, 712, '“Yüzüklerin Efendisi dışında bu kitapla kıyaslanacak başka bir kitap yok.” –Arthur C. Clarke “Güçlü, inandırıcı ve usta işi.” –Robert A. Heinlein “Modern bilimkurgunun mihenk taşlarından biri.” –Chicago Tribune En İyi Roman kategorisinde Hugo Ödülü En İyi Roman kategorisinde Nebula Ödülü Okurlar tarafından 20. yüzyılın en iyi bilimkurgu yapıtı seçilen Dune serisi, yepyeni kapakları ve gözden geçirilmiş çevirileriyle 50. yılında İthaki’de. Modern edebiyatın en epik mesih anlatılarından biri sayılan Dune, genç Paul Atreides’in hikâyesini anlatır. Atreides’in ailesi, evrendeki en önemli ve en değerli madde olan melanj ‘baharatının’ tek kaynağı olarak bilinen Arrakis gezegeninin kontrolünü kabul etmiştir. İmpatorluğun güçleri Arrakis’in kontrolü için birbirlerinin boğazına sarılırken, politika, din, ekoloji, teknoloji ve insani duyguların çok katmanlı, karmaşık etkileşiminden benzersiz bir hikâye doğacaktır. Frank Herbert’ın yarattığı evren, yıllar boyunca milyonlarca okurun zihninde gerçekliğini kabul ettirdi ve bugün de ayakta. İyi bir bilimkurgu ve iyi bir edebiyat yapıtı okumak isteyen herkesin yolu Dune serisinde birleşiyor… İthaki’nin yepyeni “Bilimkurgu Klasikleri” dizisi Dune efsanesiyle başlıyor…', 23, 7, 60, '..\\img\\kitap\\1743960601.jpeg', 10.00),
(29, '9786053755319', 'Dune Mesihi', 123, 296, 'Bir edebiyat klasiği olan, dünyanın en çok satan bilimkurgu serisi muhteşem Dune efsanesi, ikinci kitabı Dune Mesihi’yle macerasına devam ediyor.\r\nPaul Muad’dib, gezegenlerin hakimi, kutsal savaşın görkemli galibi, prensken devrimci olan bir lider, fanatik bir dini kardeşliğin mesihi…\r\nFremenlerin başına geçip Dune adıyla bilinen Arrakis gezegenini kontrol etmeye başlamakla kalmayıp evrenin hükümdarı olan Paul, çağlar süren bir düzene son vermiş, bir halkın kurtuluşu olmuş ve bir gezegenin en büyük ütopyasını gerçekleştirmeye ant içmiştir. Ancak zaferinden on iki yıl sonra, tüm bu güçlere sahip olmasının sebebi olan etkenler onun için bir tehlikeye dönüşür. Paul ise öngörülerine rağmen, felaket getireceğini düşündüğü geleceği değiştirmeye kararlıdır.', 23, 7, 60, '..\\img\\kitap\\1743960666.jpeg', 10.00),
(30, '9786053756026', 'Dune Çocukları', 32, 553, 'Paul’ün çöle gidişinin üzerinden dokuz sene geçmiş, çöl gezegeni artık yeşillenmeye başlamıştı. Baharat üretimi de giderek artıyordu. Bu değişimlerle beraber çöl terk ediliyor, kök salmış âdetlerden sapılıyordu.\r\nBaharatın sağladığı geleceği görme gücünden yoksun kalan Alia, İmparatorluk’u kaybetmemek adına elinden geleni yaparken, karşısında geçmişinden hesaba katmadığı rakipler bulacaktı. Çölün derinliklerinden çıkagelen Vaiz, Paul’ün dinine karşı vaazlar veriyordu. Unutulmayan kan davaları tekrar gün yüzüne çıkacaktı.\r\nPaul’ün ikizleri, II. Leto ve Ganimet ise İmparatorluk’un yeni mehdileri olarak yetiştirilmekteydi. Fakat onların da kendi planları vardı.', 23, 7, 60, '..\\img\\kitap\\1743960712.png', 10.00),
(31, '9786257737593', 'Dune Rahibeler Meclisi', 22, 544, 'Dune adıyla bilinen Arrakis gezegeni yok edilmişti. Maderşahi örgüt Saygın Analar, Eski İmparatorluk’tan geriye kalanları yakıp kül ediyordu. Mutlak fetihlerinin önünde duran tek bir güç kalmıştı geriye: Bene Gesserit.\r\nBaşrahibe Ana Darwi Odrade’nin önderlik ettiği Bene Gesseritler, yeşilliklerle dolu Rahibeler Meclisi gezegeni adım adım bir çöle dönüştürüyordu. Amaçları, kumsolucanları için ideal bir ortam yaratmak ve evrendeki en önemli maddenin üretimini kontrol etmekti – melanjın.\r\nSaygın Analar ise, önlerine çıkan her gezegeni yok ederek Rahibeler Meclisi’ne yaklaşıyordu. Bene Gesserit’ten güçlü olan, Dağılış’tan dönen bu acımasız tarikat karşısında çaresiz durumdaki Rahibeler Birliği’nin elinde tek bir silah vardı artık. Paul Muad’Dib’e ve Tanrı İmparator’a hizmet etmiş biri: Duncan Idaho.', 23, 7, 60, '..\\img\\kitap\\1743960757.jpeg', 10.00),
(33, '9786052650691', 'Ölüm Yapayalnız Bir İştir', 33, 272, '1949. Venice, Kaliforniya. Sevgilisinden uzakta, daktilosunun başında, öyküleriyle bezediği bir dünyada ayakta kalmaya uğraşan, üstünde çalıştığı romanında tıkandığını düşünen genç yazar, kendisini aniden gizemli bir cesedin karşısında bulur. Esrarengiz birinin gelip kulağına, “Ölüm yapayalnız bir iştir,” diye fısıldamasıyla başlayan tuhaf olaylar silsilesinin sırrını amatör bir dedektif gibi çözmeye çalışan yazarın en büyük yardımcısı ise amatör bir yazar olan Dedektif Elmo Crumley’dir.\r\nÖlüm Yapayalnız Bir İştir, sadece belalı ve kederli başlığından bile tahmin edilebileceği üzere, Bradbury’nin şiirsel üslubundan nasibini alan bir noir örneği.', 18, 7, 62, '..\\img\\kitap\\1743960809.jpeg', 10.00),
(35, '9786057762160', 'Sonbahar Ülkesi', 23, 288, '\"Ama ölüm nedir? Başka bir oda mı? Mavi bir oda, yeşil bir oda, şimdiye kadarki bütün odalardan daha büyük bir oda! Ama anahtarı nerede?\" Bu kitaptaki öyküler ya ölümle başlıyor ya da ölümle bitiyor.\r\nRay Bradbury, korkunun, içimizdeki karanlığın, yıllarca birlikte yaşadığımız ama henüz farkına varmadığımız arzuların ve bunların davet ettiği dehşetlerin, \"hepimizin bağrındaki cinayet\"in, saflığın ve şeytaniliğin birlikte nefes alan öykülerini anlatıyor bize. Haritasını hep yanımızda taşısak da ziyaretimizi sürekli ertelediğimiz bir ülkeyi, sonbahar ülkesini anlatıyor. Mehmet Moralı\'nın Türkçeye çevirdiği Sonbahar Ülkesi, ölüm hakkında okunabilecek en hayati kitaplardan biri.\r\nFantazi, korku ve bilimkurgu edebiyatına damga vuran yazarlardan biri olan Ray Bradbury, 1920\'de doğdu. Uzun yaşamına Fahrenheit 451 gibi bir distopyanın yanında sayısız öykü sığdırdı. Tüm hayatını kitaplara ve yazmaya adayan Amerikalı yazar, 5 Haziran 2012\'de öldüğünde, arkasında Mars Yıllıkları, Resimli Adam ve Sonbahar Ülkesi gibi başucu kitabı olmaya aday birçok unutulmaz eser bıraktı. Stephen King ve Neil Gaiman gibi ustalar ondan ilham aldı. Uygarlığa yön veren toplumsal meseleler ile modern insanın bireysel sorunlarını bir arada işleyebilmesi ve insanın ruhunu donduran öyküleri eşsiz bir sıcaklıkla kaleme alması, Bradbury\'nin en önemli özelliği oldu.', 18, 7, 63, '..\\img\\kitap\\1743960879.jpeg', 10.00),
(37, '9786053758112', 'Uğursuz Bir Şey Geliyor Bu Yana', 53, 280, 'Düzyazının şairi Ray Bradbury’den sizi kendinizle yüzleştirecek, cesaretin ve korkunun bir araya geldiği karanlık bir karnaval.\r\nVücudunu baştan sona saran dövmelerle zamana hükmetmeyi başaran Resimli Adam’ın avuçlarında iki tanıdık isim vardır: William ve Jim. 14 yaşındaki hemen her çocuk gibi bir an önce büyümek isteyen Will ve Jim’in önünde iki seçenek belirir: Ya Resimli Adam’ın büyüsüne kapılıp zamanı ileriye saran o atlıkarıncaya binecek ve tüm kasabayı bir günahkârlar karnavalına hapsedeceklerdir ya da Will’in ihtiyar babasıyla birlikte karnavalı belki de bir başka ekime kadar kasabadan uzaklaştıracaklardır.', 18, 7, 61, '..\\img\\kitap\\1743960949.jpeg', 10.00),
(38, '9789750748837', 'Bir İdam', 42, 120, 'İnsanların çoğu aşırı bencil değildir. Yaklaşık otuz yaşından sonra bireysel hırslarından vazgeçip –hatta çoğu durumda neredeyse birey olduklarını unutup– temelde başkaları için yaşamaya başlar, hayatın yükünün altında ezilirler. Ama sonuna kadar kendi hayatını yaşamayı kafaya koymuş yetenekli, inatçı bir azınlık da vardır; yazarlar da bu gruba mensuptur.\r\nGeorge Orwell, 1984 ve Hayvan Çiftliği romanlarında ortaya koyduğu romancı yönünün yanı sıra döneminin düzyazı ustalarındandı. Bir İdam, yazarın bu yönünü sergileyen biri kitap uzunluğunda dört makaleyi bir araya getiriyor.\r\n\"Yazma Sebebim\"de Orwell yazarlık serüvenine nasıl başladığını anlatırken, \"Sanat ve Propagandanın Sınırları\"nda savaş çağında sanatın ve edebiyatın konumu üzerine düşüncelerini paylaşıyor. İngiltere’de Nazi işgalinin her an gerçekleşebilecek bir ihtimal olduğu, Londra’nın üstüne bombalar yağdığı bir dönemde yazılan \"Aslan ile Tek Boynuzlu At\"ta Orwell, sosyalist devrim gerekliliğini vatansever duygularıyla ve ülkesinin kimliğiyle uzlaştırmaya çalışıyor. Kitaba adını veren “Bir İdam”sa, Burma’da görev yaptığı sırada tanıklık ettiği bir idamın etrafında gelişenleri anlatan kısa bir yazı. Bir İdam, bir yazarın ve bir vatanseverin düşünce dünyasından bir seçki.', 17, 3, 53, '..\\img\\kitap\\1743960981.jpeg', 10.00),
(39, '9789750732867', 'Wigan İskelesi Yolu', 33, 208, 'Büyük Buhran yıllarında Britanya’daki işsizliğe ve emekçi sınıfın yaşamına ışık tutan Wigan İskelesi Yolu, İngiltere’nin sanayi bölgelerindeki kömür madenciliğinin sosyoekonomik koşulları üzerine derinlemesine bir inceleme sunuyor. \r\n1930’lu yıllarda bir sosyalist kitap kulübü tarafından İngiltere’nin kuzeyindeki sanayi bölgesinde muazzam boyutlara varan işsizliği incelemeye gönderilen George Orwell, çalışanları da inceleyerek araştırma amacının ötesine geçer. Kömür madencilerinin hayatını, berbat konutlardaki yaşamlarını, yetersiz beslenmelerini, kömür ocaklarının cehennemine inişlerine varıncaya kadar anlattığı romanını yazar.\r\nWigan İskelesi Yolu; sosyal adaletsizlik, varoş yaşamı, madencilik koşulları, sefalet, açlık ve gittikçe artan işsizliğe dair ayrıntılı tasvirlerle, gözünü budaktan sakınmayan bir dürüstlük, hiddet ve müthiş bir insancıllıkla yazılmıştır.', 17, 3, 53, '..\\img\\kitap\\1743961025.jpeg', 10.00),
(41, '9786053325536', 'Yakıcı Sır', 24, 108, 'Kısa bir tatil için Avusturya Alplerine giden bir baron, zamanını zararsız bir flörtle renklendirmenin yollarını aramaktadır. Kendine fazlasıyla güvenen ve gönül maceralarına her zaman açık olan bu müzmin kadın avcısı, kısa sürede kendisine bir av bulmakta hiç zorlanmayacaktır. Tanışıp yakınlaşmak istediği kadının on iki yaşındaki oğluyla ahbaplık kurarak işe koyulur. Yakıcı Sır annesini elde etmek isteyen bu narsist çapkın tarafından kullanılan bir çocuğun hikâyesidir aslında. Ne var ki, yetişkin dünyası bazen masum çocuklara büyüklere göründüğünden çok daha berrak görünmektedir…', 20, 5, 53, '..\\img\\kitap\\1743961079.jpeg', 10.00),
(42, '9786052953440', 'Geçmişe Yolculuk', 23, 108, 'Zweig’ın 1920’li yıllarda yazdığı tahmin edilen bu novellanın el yazması ölümünden sonra oldukça geç bir tarihte, 1970’lerde gün ışığına çıkarıldı. Ve aşkın sınır tanımazlığı üzerine yazılmış en yoğun, en etkileyici metinler arasında yerini aldı. Geçmişe Yolculuk, zamana, mekâna ve değişen koşullara direnen yasak ve tutkulu bir aşkın hikâyesidir. Bu çılgın aşk önce okyanusun ve daha sonra da Birinci Dünya Savaşı’nın araya girmesiyle dokuz yıllık bir kesintiye uğrar. Yıllar sonra yeniden buluşan iki sevgilinin hayatları büyük bir değişime uğramıştır. Önlerinde uzanan belirsiz geleceğe, geçmişin sürekli aralarına giren gölgesine rağmen, aşk doludizgin sürmektedir...', 20, 5, 53, '..\\img\\kitap\\1743961115.jpeg', 10.00),
(44, '9786257999502', 'Hayatın Mucizeleri', 24, 80, 'Zweig’ın 23 yaşındayken yayımladığı Hayatın Mucizeleri, daha o zamandan tarihe duyduğu ilgiyi gözler önüne serer. 16. Yüzyılda Anvers’de geçen ve yolları tesadüfen kesişen Yahudi bir genç kızla yaşlı bir Hıristiyan ressam arasındaki dostluğu anlatan öykünün arka planında Hollanda’nın İspanyol yönetimine karşı isyanı vardır. Çocukken Hıristiyanların şiddet eylemlerine hedef olan ve iyi yürekli bir asker tarafından kurtarılan Esther adlı Yahudi kız, bir Katolik kilisesine asılacak dini bir tabloya modellik eder. Hayatın ve dinin anlamı, sanat ve sanatçının yaratma edimi gibi temalara eşlik eden “beklenmedik karşılaşma” motifi ve Anvers’in tarihsel detaylarla betimlenen atmosferi, Zweig’ın sonraki yapıtlarının habercisidir.', 20, 5, 53, '..\\img\\kitap\\1743961169.jpeg', 10.00),
(45, '9786254053610', 'Sahaf Mendel', 24, 72, 'Zweig bu derlemede yer alan iki novellasında kitaplara, edebiyata ve sanata bağlılıklarını saplantı haline getirmiş insanların hikâyelerini anlatır. Her iki yapıtın da arka planında I. Dünya Savaşı, değişen kültürel hayat, yozlaşmış Avrupa, ekonomik bunalım ve yoksunluklar vardır. Ancak Zweig\'ın karakterleri bütün dikkatlerini öyle mutlak bir coşkunlukla kendi ilgi alanlarına yöneltmişlerdir ki savaşın ve vahim sonuçlarının farkına bile varmazlar. Sahaf Mendel, eşsiz belleği ve bilgisiyle Viyanalı entelektüellerin gözbebeği sahaf Jakob Mendel\'in trajik hikâyesidir. Sadece kitapların dünyasında var olabilen bu adamın başına savaş sırasında talihsiz bir olay gelir. Sonrasında ne Mendel eski Mendel\'dir artık ne de Viyana eski Viyana. Görülmeyen Koleksiyon\'da, Zweig bizi hiperenflasyonun hüküm sürdüğü 1920\'lerin Almanya\'sına götürür. Yeni zenginlerin sanat eserlerine gösterdiği yoğun ilgi yüzünden dükkânı tamtakır kalan saygın bir antikacı, sanat koleksiyonundan birkaç değerli parçayı ucuza kapatmak umuduyla eski bir müşterisini ziyaret eder. Ancak hiç beklemediği bir tabloyla karşılaşır. Unutulmayacak Bir İnsan ise yazarın mutlu yaşamın formülünün servet yerine dost biriktirmek olduğuna işaret ettiği, yüreklerimizi ısıtan bir öyküsüdür.', 20, 5, 53, '..\\img\\kitap\\1743961228.jpeg', 10.00),
(47, '9789750800016', 'Kuyucaklı Yusuf', 24, 221, '\"Bu manasız ve yabancı hayatta bir tek şeye hakikaten sarılmış, hakikaten inanır gibi olmuştu. Bu da karısı idi. Muazzez\'in varlığı Yusuf için büyük boşlukları dolduracak mahiyette bir şey değildi, fakat onun yokluğu müthişti. Onun bu kadar sebepsiz yere, bu kadar insafsızca Yusuf\'un hayatından koparılması çıldırtacak kadar acı idi. Hayatında asıl aradığı şeyin Muazzez olmadığını biliyordu, fakat Muazzez olmadan bunu aramaya muktedir olmayacağını sanıyordu.\"\r\nKuyucaklı Yusuf Türk edebiyatının belki de en romantik kahramanıdır. Hayatın ve insanların zalimliği karşısındaki naif duruşu ile bir yandan trajik bir sona ilerlerken, bir yandan da yaşadığı lirik aşk hikayesinin kahramanı olarak edebiyat tarihinde yerini almıştır.', 21, 8, 53, '..\\img\\kitap\\1743961291.jpeg', 10.00),
(48, '9789750822971', 'Piraye\'ye Mektuplar', 24, 784, '“Nâzım’ın, 1933’ten 1950’ye kadar, on yedi yıl boyunca, çeşitli cezaevlerinden kendisine yazdığı mektupları, Piraye bir tahta bavulda saklardı. Ceviz ağacından yapılmış, 41 x 26 x 14 cm boyutlarında küçük bir tahta bavul. Küçük olduğu için, belki “çanta” demek daha doğru. Bu ceviz çantayı ona Nâzım sanırım Çankırı Cezaevi’ndeyken yapmıştı.\r\n(...)\r\nBu kitaptakiler, Nâzım’ın Piraye’ye yazdığı mektupların hepsi mi? Çantadakilerin hepsi...\r\nBelki bir gün başka yerlerden de bir şeyler çıkar, bilemem.”\r\nMemet Fuat', 22, 8, 53, '..\\img\\kitap\\1743961325.jpeg', 10.00),
(49, '9789750803758', 'Kuvayi Milliye', 54, 234, 'Türk şiirinin çizgisini değiştirmişi çok yönlü, evrensel boyutlu bir şair ve yazarın bu basım için yeniden gözden geçirilmiş, kaynak metinler esas alınarak düzeltilmiş \"külliyatı\"...', 22, 8, 55, '..\\img\\kitap\\1743961367.jpeg', 10.00),
(50, '9789750803741', 'Benerci Kendini Niçin Öldürdü?', 54, 284, 'Türk şiirinin çizgisini değiştirmiş, çok yönlü, evrensel boyutlu bir şair ve yazarın bu basım için yeniden gözden geçirilmiş, kaynak metinler esas alınarak düzeltilmiş \"külliyatı\"...', 22, 8, 55, '..\\img\\kitap\\1743961413.jpeg', 10.00),
(51, '9789750803772', 'Memleketimden İnsan Manzaraları ', 52, 537, 'Türk şiirinin çizgisini değiştirmişi çok yönlü, evrensel boyutlu bir şair ve yazarın bu basım için yeniden gözden geçirilmiş, kaynak metinler esas alınarak düzeltilmiş \"külliyatı\"...', 22, 8, 55, '..\\img\\kitap\\1743961454.jpeg', 10.00),
(52, '9789750854491', 'Bir Aşk Masalı', 53, 256, 'Bir varmış bir yokmuş, dünyada acayiplikler çokmuş. Bir gece beş farklı ülkede, beş prens aynı rüyayı görmüşler: Bir genç kız, kadim bir kentin alacakaranlık sokaklarında ışıktan bir güzellik halinde dolaşıyormuş. İşte o kızı gördükten sonra, artık ne eski hayatları kalmış ne de eski hakikatleri.\r\nAhmet Ümit’ten insanlığın en yüce duygusu olan aşkın doğasına dair bir hikâyat.\r\nBir Aşk Masalı, beş prensin sevda uğruna revan oldukları bir yol ve hal macerası. Kaf Dağı’ndan ıssız çöllere, ücra hanlardan savaşçı kabilelerin çadırlarına, devlerden denizkızlarına, balinalardan devasa yılanlara, cümle tabiatın ve mahlukatın geçiş yaptığı bir hayal perdesi.\r\n“Yolculukların en çilelisi aşk için yapılandır. Ve zorluk ne kadar artarsa aşk o kadar kıymete biner, o kadar anlam kazanır, o kadar vazgeçilmez bir hal alır…”', 24, 8, 53, '..\\img\\kitap\\1743961532.jpeg', 10.00),
(53, '9789750847141', 'Aşk Köpekliktir', 51, 224, 'Ben de en az aşk kadar saçmayım… Aşkın kaç yüzü, kaç hali vardır? Stefan’la Ayşe’nin aşkı gibi bir çeşit köpeklik midir, yoksa ancak rüyalarda rastlanılan bir mucize mi? Profesör Numan’ın inandığı gibi çözümsüz bir problem midir, yoksa Ceren’in sandığı gibi bir yanılsama mı? Belki iki âşığın giriştiği bir düello ya da hiçbir zaman gerçekleşmeyecek bir ütopyadır! Hem hastalık hem direniş, hem av hem de avcı olmaktır aşk…\r\nAşk rüzgârın söylediği bir şarkıdır Polisiye romanlarıyla tanınan Ahmet Ümit, bu kez Aşk Köpekliktir’de “katil kim?” yerine, binlerce yıllık “aşk nedir?” sorusuna yanıt arıyor. Kitapta bir araya gelen dokuz öykü, bu eskimeyen soruya kendi cevaplarını ararken, bir yandan da her bir hikâye farklı kurguları, kahramanları, mekânları ve Ahmet Ümit’in bildik “gizem”li üslubuyla okuru peşinden sürüklemeyi başarıyor.\r\nZaman insanla oynamayı seven, hem zalim hem de merhametli bir tanrıdır. Ona karşı çıkamazsın, yapman gereken beklemek. Onun, derin bir unutuşla bizi rahatlatacak örtüsünü üzerimize örtmesini beklemek...', 24, 8, 53, '..\\img\\kitap\\1743961590.jpeg', 10.00),
(54, '9789750846229', 'Agathanın Anahtarı', 72, 152, 'Tasarlanmış cinayet iyi bir organizasyonu gerektirir\r\nDünyaca ünlü polisiye yazarı Agatha Christie İstanbul’da gizemli şekilde ortadan kaybolur. Yazarın on bir gün boyunca yaşadıkları günümüzde dahi esrarını korumaktadır. Christie’nin sırra kadem bastığı günlerde kimlerle, nerede olduğunu açıklamaksa yine bir polisiye yazarına nasip oluyor; Ahmet Ümit –kurgu olsa da– bu sırrı ifşa ediyor. Agatha Christie’nin “kusursuz bir cinayetin olamayacağına” dair inancıysa belki de sonsuza dek değişiyor. \r\nKim başka birinin yerine ölmek ister ki?\r\nAgatha Christie öyküsüyle açılan kitap, gücünü enerji yüklü kısa öykülerden alıyor. Başkomser Nevzat’ı daha çok sahada gördüğümüz, iyi bir polisiyeye has tüm incelikleri ve yüksek heyecanı bir arada barındıran Agatha’nın Anahtarı, belki de Ahmet Ümit’in en enerjik, deli dolu eseri.', 24, 8, 62, '..\\img\\kitap\\1743961621.jpeg', 10.00),
(55, '9789750846298', 'Beyoğlu\'nun En Güzel Abisi', 92, 418, 'Yılbaşı gecesi işlenen bir cinayet... Tarlabaşı’nın arka sokaklarında bulunan bir erkek cesedi. Öldürülmüş erkeklerin en yakışıklısı, belki de en kötüsü. Karanlık sırların ortaya çıkardığı utanç verici bir gerçek. Gururlarının kurbanı olmuş erkekler, onların hayatlarını yaşamak zorunda olan kadınlar. Bu cinayetler yatağında, bu kötülükler bahçesinde, bu insan eti satılan can pazarında masumiyetini korumaya çalışan bir adam. Bir zamanlar İstanbul’un en gözde yeri olan Beyoğlu’nun hazin hikâyesi. Karanlık... Soğuk havayla iyice ağırlaşan bir karanlık. Uzaklardan şarkılar geliyor kulağına, neşeli kadın çığlıkları, ayarını yitirmiş sarhoş naraları, biri küfrediyor belki ana avrat, belki ağlıyor biri hıçkıra hıçkıra, belki biri sessizce ölüyor bu gürültünün, bu hengâmenin ortasında. Umurunda değil. Hepsinden sıyrılmış, sadece öfke... Nereye gittiğini bilmeden yürüyor, nefret tarafından kuşatılmış olarak. Kıskançlık denen o canavar, çelikten pençesine almış yüreğini, habire sıkıyor. “Kadınlar,” diyor bir ses zihninin derinliklerinden... “Kadınlar, onlarla oynayamazsın... Oynadığını zannedersin ama bir de bakmışsın, asıl oyuncak sen olmuşsun.” Hayatına giren kadınların yüzleri beliriyor sokağın zemininde. Birer birer düşüyor görüntüleri ayaklarının dibine. Hepsinin boynu bükük, hepsinin gözlerinde keder. Hepsi üzgün... Aldırmıyor, bir su birikintisiymiş gibi basıp geçiyor üzerlerinden ama yeniden düşüyor görüntüler zemine. “Kadınlar,” diyor o ses yine, “Kadınlardan asla kurtulamazsın, hayaletleri hayatın boyunca seni takip eder.”', 24, 8, 62, '..\\img\\kitap\\1743961661.jpeg', 10.00),
(56, '9789750846311', 'Bir Ses Böler Geceyi', 51, 140, 'Dolunayın ışığında bir köy mezarlığı... Mezarlığın duvarına çarpan bir cip. Gecenin karanlığında uçuşan düşler. Issız köyün ortasında kocaman bir cem evi. Konuğunu yitirmiş bir mezar. Cem töreninde arınmayı bekleyen bir ölü. Bu olanların sessiz tanığı, bir araştırma görevlisi. Yıkılan idealleriyle, sürüp giden yaşamı arasında sıkışıp kalmış bir adam. Alevi inancına farklı bir bakış. Mistik bir gerilim romanı...\r\n\"Gözüne kestirdiği dal parçasını çekerken çalılığın arkasında bir karartı fark etti. Feneri oraya doğru tuttu. Yanılmamıştı, az ilerde yeşil renkli bir mezar taşı mahzun bir edayla onu süzüyordu. Bu defa korkmadı, hatta içinde, \'Bu mezar neden mezarlığın dışında?\' diye merak bile uyandı. Bir-iki adım daha yaklaştı. Ama bu mezar bozulmuştu, iki yanında toprak birikintileri yığılıydı. Yeni bir ürperti dalgası sardı bedenini. Mezarın içini görmemesine karşın, upuzun yatan ölünün yer yer etleri dökülmüş yüzü geldi gözlerinin önüne. Öte yandan aklı hâlâ mantıklı bir açıklamanın peşindeydi. Belki de bu mezar henüz ölmemiş biri için kazılmıştı. Neden olmasın? insanların ölmeden önce de mezarlarını hazırladıklarını biliyordu; iyi de, kazmakla hazırlamak arasında büyük fark vardı. Belki yeri alınır, hazırlıklar yapılırdı ama ölmeden mezar kazdırılır mıydı? Belki de bu mezarı aç kalmış vahşi bir hayvan açmıştı. Eğer öyleyse mezardaki ölüyü paramparça etmiş demekti. Doğrusu, böyle bir görüntüyle karşılaşmak istemezdi. Yine de merakı ağır bastı; cesaretini toplayıp el fenerini mezarın içine doğrulttu. Mezar gerçekten de boştu.\"', 24, 8, 62, '..\\img\\kitap\\1743961698.jpeg', 10.00),
(57, '9789750850417', 'Kayıp Tanrılar Ülkesi', 25, 504, 'Ahmet Ümit’ten polisiyeyi arkeoloji ve mitolojiyle harmanlayan usta işi bir roman.\r\nBerlin Emniyet Müdürlüğü’nün cevval başkomiseri Yıldız Karasu ve yardımcısı Tobias Becker, göçmenlerin, işgal evlerinin ve sokak sanatçılarının renklendirdiği Berlin sokaklarından Bergama’ya uzanan bir macerada, hayatı ve insanları yok etmeye muktedir sırların peşinde bir seri cinayetler dizisini çözmeye çalışıyor. Soruşturmanın Türkiye ayağında sürpriz bir ismin olaya dahil olmasıyla heyecanın dozu gitgide artıyor.\r\nKayıp Tanrılar Ülkesi, Zeus Altarı ve Pergamon Tapınağı’nın gölgesinde mitlere günümüzde yeniden hayat verirken, suçun çağlar ve kültürler boyu değişmeyen doğasını bir tokat gibi yüzümüze çarpıyor.\r\n“O yüzden unuttuk dediğiniz yerden başlayacağım. Unutmanın bedelini ödeyecek unutanlar. Cezaların en şiddetlisiyle ödüllendirilecek saygısızlık yapanlar, kalbi yerinden çıkarılacak beni kalbinden çıkaranların, yüzlerinin derisi yüzülecek benden yüz çevirenlerin…”', 24, 8, 62, '..\\img\\kitap\\1743961732.jpeg', 20.00),
(58, '9789750846076', 'Sultanı Öldürmek', 24, 528, 'Ahmet Ümit\'in romanı Sultanı Öldürmek bu satırlarla başlıyor. Yıllardır aynı kadını bekleyen bir tarihçinin hikâyesi bu. Şahane bir aşk için harcanmış bir ömrün hikâyesi... Serhazinlerin son temsilcisi Müştak Serhazin\'in başından geçen dört günlük tuhaf bir serüven. Sapında Fatih Sultan Mehmed\'in tuğrası bulunan mektup açacağıyla öldürülmüş bir tarih profesörü... Bir aşk cinayeti mi? Yoksa kökleri \"Ulu Hakan\"ın şüpheli ölümüne uzanan bir entrika mı? Osmanlı devletinin bir imparatorluğa dönüştüğü o zaferler ve ihanetlerle dolu günlere yapılan sıradışı bir yolculuk. Ve bu heyecan verici yolculuk boyunca kulaklardan eksik olmayan o kadim soru: Tarih, geçmişte yaşananlar mıdır, yoksa tarihçilerin anlattıkları mı?\r\n\"...Ve Sultan Mehmed Han. Mehmed Han oğlu Murad Han oğlu Fatih Sultan Mehmed Han. İki karanın ve iki denizin hâkimi. Allah\'ın yeryüzündeki gölgesi. Kostantiniyye\'yi zapt eden padişah. Roma İmparatorluğu\'nun doğal varisi, farklı dinlerden, farklı dillerden, farklı ırklardan yepyeni bir millet yaratma aşkıyla yanıp tutuşan kudretli hükümdar. Uçsuz bucaksız ovalarda at koşturan ordular. Kılıç sesleri, savaş naraları, korku çığlıkları. Ardı ardına düşen şehirler, ardı ardına yıkılan devletler, ardı ardına el değiştiren kaleler. Kırk dokuz yaşında dünyaya nam salmış bir hükümdar. Ve değişmez kader. Akşama kavuşan gün. Ecel şerbetini içen insan. Ve Fatih Sultan Mehmed\'in şüpheli ölümü. Ve onun iki şehzadesi. İkiye bölünen saray, ikiye bölünen devlet, hiçbir şeyden haberi olmayan bir halk. Ve iki şehzadenin kanlı boğazlaşması sürerken saray odasında unutulan Fatih Sultan Mehmed Han\'ın cansız bedeni...\"', 24, 8, 62, '..\\img\\kitap\\1743961762.jpeg', 10.00),
(59, '9786053607021', 'Sokrates\'in Savunması', 62, 200, 'Platon (MÖ yaklaşık 428-MÖ yaklaşık 348): Bugünkü üniversitenin atası sayılan Akademia’nın kurucusu ve hocası Sokrates’i konuşturduğu diyaloglarla felsefeyi yazıya en iyi aktarmış ustalardan biridir. Bu kitapta birbirini tamamlayan dört diyalog yer almaktadır. İlk diyalog olan Euthyphron’da yargılanışının öncesi anlatılır ve dinsizlikle suçlanan Sokrates’in inançları hakkında bilgi verilir. Sokrates’in Savunması’nda ise yargı süreci anlatılmaktadır. Kriton’da hüküm sonrası anlatılır, bir yurttaşın saygı duyması gereken ilkeler tartışılır. Platon’un en şiirsel eserlerinden biri olan Phaidon’daysa Sokrates’in son günü anlatılırken ruh hakkındaki düşünceleri yansıtılmaktadır.', 25, 5, 56, '..\\img\\kitap\\1743961801.jpeg', 10.00),
(60, '9789754587173', 'Devlet', 63, 372, 'M.Ö. 427-347 yılları arasında yaşamış olan Eflatun düşlediği en iyi devleti, Sokrates\'le birlikte, bu kitapta anlatır.\r\nDevlet\'te iki düşüncenin çatışmasına tanık oluruz:\r\n1) İnsanlar doğuştan iyi ve eşittirler; toplumun kötü düzeni onları bozuyor, güçlüler güçsüzleri eziyor. Kanunlar güçlülerin elinde güçsüzlere karşı silah okuyor.\r\n2) İnsanlar doğuştan ne iyi ne de eşittirler. Yalnızca güçlü ve güçsüzler vardır. Güçlünün güçsüzü yönetmesi, doğa gereğidir ve doğrudur. İnsan haklı olmaya değil, güçlü olmaya bakmalıdır.\r\nBuradan yola çıkarak Devlet\'in, bugün \"insan değerler\" başlığında ele aldığımız birikimin kaynaklarından biri olduğunu rahatlıkla söyleyebiliriz.', 25, 5, 56, '..\\img\\kitap\\1743961982.jpeg', 10.00),
(62, '9786254290657', 'Protagoras', 21, 120, 'Platon (MÖ 428/9-348/7): Atina’nın aristokrat gençlerinin gramer, müzik ve beden eğitiminden oluşan temel eğitimini aldıktan sonra filozof Kratylos’un öğrencisi olmuş, onun sayesinde Sokrates öncesi filozofların eserlerini tanımıştır. Bununla birlikte Platon’u en çok etkileyen düşünür Sokrates’tir, ancak tarihin en meşhur öğretmen öğrenci ikilisinin nerede ve nasıl karşılaştığına dair bilgiler çelişkilidir. Eserlerindeki atıflardan tanıştıkları sırada hocasının altmış, kendisinin de yirmi yaşlarında olduğu anlaşılmaktadır. Siyasetle de ilgilenen Platon, Sokrates’in ölüme mahkûm edilişinin ardından bu uğraşından vazgeçip hocasının düşüncelerini geliştirmeye ve kendi felsefe sistemini kurmaya yönelmiştir. Bu diyalogda Sokrates ile Protagoras kalabalık bir izleyici topluluğunun önünde erdemin öğretilebilir olup olmadığını tartışırlar.', 25, 5, 56, '..\\img\\kitap\\1743962063.jpeg', 10.00),
(63, '9786050200706', 'Devlet Adamı', 21, 120, 'Platon, hiç kuşku yok ki düşünce tarihinin en önemli ve etkili filozoflarından biridir. Felsefenin kurumsallaşmasına ve felsefede yazılı geleneğin oluşmasına katkıda bulunmuş, iki dünyalı metafiziğiyle bütün bir Ortaçağ düşüncesini belirleyecek olan idealist felsefe geleneğinin başlatıcısı olmuştur. Hıristiyan Ortaçağ felsefesine ve İslam düşüncesine etkisi bakımından da ayrıca önem taşıyan Platon, düşünce tarihi boyunca tartışılan tüm problemleri yüzlerce yıl öncesinden ele almış ve ilk büyük felsefi sistemi inşa etmiştir.\r\nDevlet Adamı, Platon’un siyaset ve hukuk felsefesini ortaya koyduğu üç temel diyalogdan birisidir. Devlet ve Yasalar diyalogları ile birlikte bir üçlü meydana getirir. Bu üçlünün tam ortasında bulunan Devlet adamı siyaset felsefesi açısından, “gökyüzünden yeryüzüne indirilmiş bir felsefe “ anlayışını temsil eder. Başka bir deyişle, Devlet’te ideal bir devlet tasarımıyla mükemmeliyetçiliği ve ütopyacılığını olabilecek en açık şekilde ifade eden Platon, burada biraz da Sicilya ziyaretlerinden gereken dersi çıkarmış alarak, politika ve hukuk felsefesinde çok daha gerçekçi bir tavır sergiler. Dolayısıyla da insani düzeyde iyi bir yönetimin ilkelerini ve temellerini ortaya koyar.', 25, 9, 56, '..\\img\\kitap\\1743962089.jpeg', 10.00),
(64, '9789754685398', 'Sokrates\'in Savunması', 31, 200, 'Platon\'un Sokrates\'in savunması adlı eseri Yunan felsefesinin en eski belgesidir, ondan öncekileri ancak daha sonraki eserler sayesinde öğrenmekteyiz. Platon\'un Diyaloglar kapsamındaki bütün eserlerinin baş karakteri Sokrates esasında felsefeyi baştan kurmuştur vekendini savunuşunun anlatıldığı bu eser hala Batı felsefesine giriş için en uygun kaynak olmayı sürdürmektedir.\r\nBilindiği üzere Sokrates, Savunma\'da, gençlerin aklını çeldiği ve tanrılara inanmadığı iddiasıyla yargılanır, soru sorma yöntemiyle suçsuzluğunu ispatlamaya çalışır, ne var ki jüri tarafından suçlu bulununca baldıran zehri içerek ölmeye mahkum edilir.\r\n\"Eserdeki sohbet havası, düzenlemedeki eksiklik, ironik basitlik, bize Sokrates\'in portresini sunan mükemmel bir sanat eserinin ortaya çıkmasını sağlıyor.\"\r\n- Benjamin Jowett-', 25, 9, 56, '..\\img\\kitap\\1743962217.png', 10.00),
(65, '9789754689129', 'Mektuplar', 12, 104, 'Platon, hiç kuşku yok ki düşünce tarihinin en önemli ve etkili filozoflarından biridir. Felsefenin kurumsallaşmasına ve felsefede yazılı geleneğin oluşmasına katkıda bulunmuş, iki dünyalı metafiziğiyle bütün bir Ortaçağ düşüncesini belirleyecek olan idealist felsefe geleneğinin başlatıcısı olmuştur. Hıristiyan Ortaçağ felsefesine ve İslam düşüncesine etkisi bakımından da ayrıca önem taşıyan Platon, düşünce tarihi boyunca tartışılan tüm problemleri yüzlerce yıl öncesinden ele almış ve ilk büyük felsefi sistemi inşa etmiştir.\r\nPlaton’un Bütün Yapıtları’nın ilk kitabı olan ve filozofun Sicilya’da geçirdiği günleri konu alan Mektuplar, Platon felsefesinin yansıtılması ve Diyaloglar’da ileri sürülen görüşlerin savunulması açısından eşsiz bir öneme sahiptir.\r\nMektuplar, filozofun diğer eserlerinde neredeyse hiç söz etmediği hayatının en azından bir bölümüne ışık tutması, politik faaliyetleriyle ilgili bilgiler içermesi nedeniyle de okunmaya değerdir. Mektuplar Eski Yunancadan çevirisiyle dilimizde ilk kez yayımlanıyor.', 25, 9, 56, '..\\img\\kitap\\1743961916.jpeg', 10.00),
(66, '9786050208276', 'Yasalar', 24, 480, 'Platon, hiç kuşku yok ki düşünce tarihinin en önemli ve etkili filozoflarından biridir. Felsefenin kurumsallaşmasına ve felsefede yazılı geleneğin oluşmasına katkıda bulunmuş, iki dünyalı metafiziğiyle bütün bir Ortaçağ düşüncesini belirleyecek olan idealist felsefe geleneğinin başlatıcısı olmuştur. Hıristiyan Ortaçağ felsefesine ve İslam düşüncesine etkisi bakımından da ayrıca önem taşıyan Platon, düşünce tarihi boyunca tartışılan tüm problemleri yüzlerce yıl öncesinden ele almış ve ilk büyük felsefi sistemi inşa etmiştir.\r\nPlaton’un en uzun diyaloglarından biri olan Yasalar sadece Platon’un düşüncesinde siyasi teori ve pratik arasındaki ilişkinin sorunlarını yansıtmakla kalmıyor; aynı zamanda onun aile, kadınların statüsü, mülkiyet hakları, ceza hukuku ile din ve güzel sanatların gündelik hayattaki rolü hakkındaki kapsamlı düşüncelerini de ortaya koyuyor.', 25, 9, 56, '..\\img\\kitap\\1743962281.jpeg', 10.00),
(67, '9786050205770', 'Phaidros', 42, 104, 'Platon, hiç kuşku yok ki düşünce tarihinin en önemli ve etkili filozoflarından biridir. Felsefenin kurumsallaşmasına ve felsefede yazılı geleneğin oluşmasına katkıda bulunmuş, iki dünyalı metafiziğiyle bütün bir Ortaçağ düşüncesini belirleyecek olan idealist felsefe geleneğinin başlatıcısı olmuştur. Hıristiyan Ortaçağ felsefesine ve İslam düşüncesine etkisi bakımından da ayrıca önem taşıyan Platon, düşünce tarihi boyunca tartışılan tüm problemleri yüzlerce yıl öncesinden ele almış ve ilk büyük felsefi sistemi inşa etmiştir. Platon’un uzun zaman boyunca ilk diyaloğu olduğu düşünülen daha sonralarıysa son diyaloğu olduğu iddiasında bulunulan Phaidros aşk, sevgi, güzellik, delilik ve retorik üzerine sıra dışı bir eser olmakla kalmıyor aynı zamanda Platon’un yazı hakkındaki yergilerini de görmemizi sağlıyor. Phaidros diyaloğu Sokrates ve onun genç dostu Phaidros arasında geçmektedir. Phaidros hatiplerin konuşmalarını, özellikle de Lysias’ın konuşmalarını dinlemeyi çok sever. Bu konuşmalardan bazılarının metinlerini Sokrates’e okur ve bunun üzerine tartışmaya başlarlar. Lysias’ın, kişinin kendisine âşık olan ve ona ilgi gösterenden ziyade başkasına ilgi göstermesi gerektiğini savunduğu konuşması ise bu tartışmanın merkezinde yer almaktadır.', 25, 9, 56, '..\\img\\kitap\\1743962307.jpeg', 10.00),
(69, '9786050208801', 'İzafiyet Teorisi', 24, 280, 'Albert Einstein genel görelilik kuramı üzerindeki çalışmasını 1915 yılında tamamladıktan sonra İzafiyet Teorisi adlı kitabını kaleme aldı. Sıradan okura hitap eden İzafiyet Teorisi özel ve genel görelilik kuramları üzerine şimdiye dek yazılmış en açıklayıcı kitap olma unvanını koruyor. Ünlü kitabın elinizdeki basımı ise Einstein’ın düşüncesinin ve eserinin evrimini günümüz bağlamında değerlendiren yorumlar içeriyor. 100. Yıldönümü Basımı, Einstein’ın eserine en son bilimsel gelişmelerin ışığı altında göz atmak isteyen okur için ideal bir tercih. \r\n“Einstein’ın özel ve genel görelilikle ilgili kitabının bu yeni basımını okumak büyük bir zevk. Görelilik yüz yıldır kitaplara, köşe yazılarına, makalelere konu oldu, ama en iyi açıklamayı yine usta bizzat yapıyor.”\r\n− BRIAN GREENE, Columbia Üniversitesi \r\n“Bu kitap önemli bir tarihsel belge olmakla kalmıyor, aynı zamanda Einstein’ın düşünce üslubunu ve berraklığını geniş bir okur kitlesine tanıtıyor.”\r\n− MARTIN REES, Cambridge Üniversitesi', 26, 9, 64, '..\\img\\kitap\\1743962363.jpeg', 10.00),
(70, '9786051060606', 'Benim Gözümden Dünya', 53, 115, 'Benim Gözümden Dünya\'da, Albert Einstein\'ın hayata, yaşadığı dünyaya ve bilimsel çalışmalarına dair görüşlerini bulacaksınız. Büyüleyici, esprili ve zekice gözlemler, büyük bir kalbi ve az rastlanır bir aklı açığa vuran samimi itiraflar...Benim Gözümden Dünya, bu özel kişiliği, kendi yazdığı ya da başkası tarafından kaleme alınan hiçbir kitapla kıyaslanmayacak bir açıklıkta gözler önüne seriyor. Einstein insanlığa, yardımlaşmanın hakim olduğu barış dolu bir dünyaya ve bilimin yüce amaçlarına inanıyordu. \"İyi ve Kötü\", \"Din ve Bilim\", \"Aktif Pasifizm\", \"Hıristiyanlık ve Yahudilik\" , \"Azınlıklar\" ve \"Bir Arap\'a Mektup\" gibi farklı konu başlıklarının ele alındığı Benim Gözümden Dünya, işte bu inançların savunması niteliğindedir.', 26, 10, 64, '..\\img\\kitap\\1743962404.jpeg', 10.00),
(71, '9786254492501', 'Fikirler ve Görüşler', 0, 376, 'Fikirler ve Görüşler, Einstein\'ın yazılarının en kapsamlı derlemesidir. Kitabın Birinci Bölümünde Einstein\'ın toplum üzerine düşünceleri, din ile bilim karşılaştırmaları, Amerika incelemeleri ve son olarak bazı popüler fizik konuşmaları yer alıyor. İkinci Bölümde daha politik yazıları bulunuyor: Silahsızlanma sorunu, üretim ilişkileri, barış ve sosyalizm üzerine özgün görüşleri. Üçüncü Bölümde Yahudi sorunu işleniyor. Dördüncü Bölümde Almanya ve faşizm üzerine yazılar yer alıyor. Beşinci Bölüm ise, Türkçe hiçbir kaynakta yer almayan bilim yazılarından oluşuyor ve Einstein\'ın bilim felsefesinin geniş bir özetini içeriyor. Einstein bu bölümde kuramsal fiziğin temellerinden göreliliğe, kuantum kuramı hakkındaki çekincelerinden genel kütleçekim kuramına kadar en önemli fizik problemlerini masaya yatırıyor.', 26, 10, 64, '..\\img\\kitap\\1743962438.jpeg', 10.00),
(72, '9786051715513', 'Kara Delikler', 42, 75, '2016 yılının BBC Reith derslerinde Stephen Hawking, bütün bir ömür süren araştırmalarını on beş dakika içinde aktarma gibi gerçekten zorlu bir meydan okumayı kabul etti. Bu çok kısa süren derslerde Hawking, evrenin gizemlerini ortaya sererken, kara delikleri anladığımız takdirde uzayzamanın sırlarına erişebileceğimizi vurguluyor.\r\n“Kozmolojinin karmaşıklığını herkesin anlayacağı yalın bir açıklıkla ortaya seriyor.”\r\n- Observer\r\n“Böyle büyük problemleri araştıran bir dehâyı izlemek heyecan verici.”\r\n- Sunday Times\r\n“Einstein’dan bu yana en büyük bilimsel zekâ.”\r\n- Daily Express\r\n“Büyük Patlamanın ve evrenin başlangıcının tutarlı ve akla uygun bir kuramının oluşması için Einstein’dan bu yana en fazla katkıyı sunuyor.”\r\n- Newsday', 27, 10, 64, '..\\img\\kitap\\1743962469.jpeg', 10.00);
INSERT INTO `kitap` (`id`, `isbn`, `isim`, `stok`, `sayfa_sayisi`, `ozet`, `yazar_id`, `yayinevi_id`, `kategori_id`, `kapak`, `ucret`) VALUES
(73, '9786051067582', 'Zamanın Kısa Tarihi', 41, 255, 'Yaklaşık kırk dile çevrilen ve dünya üzerindeki her 750 kişiden birinin edindiği Zamanın Kısa Tarihi çağımızın en büyük zihinlerinden biri olan Stephen Hawking’in sorularına yanıt aradığı bir kitap:\r\n“Evren nasıl başladı ve başlamasını olanaklı kılan şey neydi?\r\nZaman her daim ileri doğru mu akar?\r\nEvrenin bir sonu ya da sınırı var mı? \r\nUzayda başka boyutlar var mı?\r\nHer şey sona erdiğinde ne olacak?” \r\n \r\nElinizdeki bu baskı Hawking’in 2016 yılında kitabını son kez gözden geçirdiği ve bir Ek yazdığı genişletilmiş baskıdan dilimize kazandırılmıştır. Hawking’in bu ekte de belirttiği gibi, evrenin başlangıcından 300.000 yıl sonrasını araştıran ve Hawking’in varlığını ileri sürdüğü uzayzaman dokusundaki kırışıklıkları tespit eden kozmik mikrodalga ardalan ışınımı uydularının (WMAP ve Planck) verileri ve LIGO deneyinin kütleçekim dalgalarını saptaması gibi yeni gelişmeler ışığında Zamanın Kısa Tarihi güncelliğini koruyor.', 27, 10, 64, '..\\img\\kitap\\1743962500.jpeg', 10.00),
(74, '9786051719092', 'Büyük Sorulara Kısa Yanıtlar', 41, 200, 'İnsanlar her daim büyük sorulara yanıt bulmak istemiştir:\r\nTanrı Var mı? Nereden geldik? Her Şey Nasıl Başladı? Evrende Bizden Başka Akıllı Yaşam Var mı? Zamanda Yolculuk Mümkün mü? Yapay Zekâ Bize Üstün Gelecek mi? Her şeyin gerisinde duran anlam ve tasarı nedir? Geçmişin yaratılış üzerinden açıklamaları bugün artık çok daha az uygun ve güvenilir görünüyor. Bu açıklamaların yerini New Age’ten Star Trek’e uzanan kendilerine yalnızca hurafe diyebileceğimiz çeşitli şeyler aldı. Gelgelelim gerçek bilim, bilimkurgudan çok daha tuhaf ve tatmin edici olabilir. Günümüzde bilim bütün bu sorulara yanıt\r\nbulmaya başladı.Hawking’in ölümünden önce yazdığı son yazıların derlemesi olan bu kitap,tarihin en önemli zihinlerinden birinin büyük sorulara verdiği yanıtlardan oluşuyor.\r\nHer Şeyin Teorisi filmindeki performansıyla Oscar kazanan Eddie Redmayne’in önsöz, Nobel Ödüllü bilim insanı Kip Thorne’un giriş ve Hawking’in kızı Lucy’nin sonsöz kaleme aldığı Büyük Sorulara Kısa Yanıtlar bir dehanın dünyaya bıraktığı son mesaj niteliğinde. ', 27, 10, 64, '..\\img\\kitap\\1743962759.jpeg', 10.00),
(75, '9786051067186', 'Kara Delikler ve Bebek Evrenler', 22, 167, 'Olay yaratan çok satan kitabı Zamanın Kısa Tarihi’nde, Stephen Hawking, kelimenin tam anlamıyla, fiziğe, evrene, gerçekliğin kendisine bakışımızı değiştirdi. Kara Delikler ve Bebek Evrenler’de Stephen Hawking’in 1976 ile 1992 yılları arasında yazdığı bazı yazılar yer alıyor. Yaygın olarak Einstein’dan beri en parlak teorik fizikçi sayılan Hawking, bu on üç yazı ve bir söyleşide, evrenimizi anlamamıza yarayan şaşırtıcı bir olanaklar dizisini ortaya çıkarıyor.\r\nStephen Hawking, evrenin bilinmez ve anlaşılmaz bir şey, insanın sezebileceği, fakat hiçbir zaman tam olarak analiz edemeyeceği veya kavrayamayacağı bir şey olduğu görüşüne katılmaz. Ona göre bu görüş dört yüz yıl önce Galileo tarafından başlatılan ve Newton tarafından devam ettirilen bilimsel devrimlere karşı haksızlık etmektedir. Onlar evrenin en azından bazı alanlarının, gelişigüzel şekilde davranmadıklarını, kesin matematiksel yasalar tarafından yönetildiklerini gösterdiler. O zamandan beri geçen yıllar içinde Galileo ve Newton’un çalışmalarını evrenin hemen hemen her alanına yaymış bulunuyoruz. Hawking’e göre evrenin tam bir teorisini ortaya koyabiliriz. O durumda aslında  Evrenin Efendileri olacağız.', 27, 10, 64, '..\\img\\kitap\\1743962745.jpeg', 20.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `soyad` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `ceza_tarihi` date NOT NULL,
  `aktif_kira_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `ad`, `soyad`, `email`, `sifre`, `ceza_tarihi`, `aktif_kira_sayisi`) VALUES
(47, 'ahmet', 'berke', 'ahmet123@gmail.com', '1234', '2025-04-06', 1),
(48, 'Alper', 'Bilğin', 'alper123@gmail.com', '1234', '2025-04-07', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevi`
--

CREATE TABLE `yayinevi` (
  `id` int(11) NOT NULL,
  `isim` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `yayinevi`
--

INSERT INTO `yayinevi` (`id`, `isim`) VALUES
(3, 'Can Yayınları'),
(4, 'Domingo Yayınevi'),
(5, 'İş Bankası Kültür Yayınları'),
(7, 'İthaki Yayınları'),
(8, 'Yapı Kredi Yayınları'),
(9, 'Say Yayınları'),
(10, 'Alfa Yayıncılık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

CREATE TABLE `yazar` (
  `id` int(11) NOT NULL,
  `isim` varchar(30) NOT NULL,
  `ozgecmis` text NOT NULL,
  `resim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`id`, `isim`, `ozgecmis`, `resim`) VALUES
(17, 'George Orwell', '(d. 25 Haziran 1903, Hindistan, Bihar - ö. 21 Ocak 1950, İngiltere, Londra), Ünlü bir İngiliz romancı ve denemecisi olan Orwell\'in aslı adı Eric Arthur Blair\'dir. George Orwell 1903 yılında Hindistan\'ın Motihari kentinde dünyaya geldi. Eton\'da öğrenimini tamamladıktan sonra 1922 yılında Birmanya\'ya gitti. 1950 yılında, büyük bir savaştan çıkımş yorgun ve yaralarını yeni sarmaya başlayan ülkesinin başkantinde, Londra\'da hayata gözlerini kapattı.', '..\\img\\yazar\\1743963172.jpeg'),
(18, 'Ray Bradbury', 'Fantazi, korku ve bilimkurgu edebiyatına damga vuran yazarlardan biri olan Ray Bradbury, 1920’de doğdu. Uzun yaşamına Fahrenheit 451 gibi bir distopyanın yanında sayısız öykü sığdırdı. Tüm hayatını kitaplara ve yazmaya adayan Amerikalı yazar, 5 Haziran 2012’de öldüğünde, arkasında Mars Yıllıkları, Resimli Adam ve Sonbahar Ülkesi gibi başucu kitabı olmaya aday birçok unutulmaz eser bıraktı. Stephen King ve Neil Gaiman gibi ustalar ondan ilham aldı. Uygarlığa yön veren toplumsal meseleler ile modern insanın bireysel sorunlarını bir arada işleyebilmesi ve insanın ruhunu donduran öyküleri eşsiz bir sıcaklıkla kaleme alması, Bradbury’nin en önemli özelliği oldu.', '..\\img\\yazar\\1743963199.jpeg'),
(19, 'Paulo Coelho', '1947 yılında Brezilya\'da doğdu. Unesco\'nun Kültürlerarası Diyaloglar programında danışman olarak görev yapmaktadır. Aynı zamanda İsviçre\'nin Davos kentindeki Dünya Ekonomik Formunu düzenleyen Schwab Vakfı\'nın yönetim kurulundadır.', '..\\img\\yazar\\1743963231.jpeg'),
(20, 'Stefan Zweig', 'Stefan Zweig 1881 yılında Viyana\'da doğdu. Babası varlıklı bir sanayiciydi. Viyana ve Berlin\'de eğitim gördü. Birçok ülkeyi dolaştıktan sonra Birinci Dünya Savaşı sırasında, Zürih\'e geldi. Savaş karşıtı kişiliğiyle tanındı. 1919-1934 yılları arasında Salzburg\'da yaşadı, 1938\'de İngiltere\'ye, 1939\'da New York\'a gitti, birkaç ay sonra da Brezilya\'ya yerleşti. Avrupa\'nın içine düştüğü duruma dayanamayarak 1942 yılında karısıyla birlikte intihar etti. Çok sayıda denemesi, öyküsü, uzun öyküsü ve romanı yanında, büyük bir ustalıkla kaleme aldığı yaşam öyküleriyle de ünlüdür.', '..\\img\\yazar\\1743963293.png'),
(21, 'Sabahattin Ali', '25 Şubat 1907’de Gümülcine’de doğdu, 2 Nisan 1948’de Kırklareli’nde öldü.1948’de bir yazısı yüzünden tutuklandı, üç ay kadar hapis yattı. Sürekli izlendiği için yurtdışına kaçmak istedi, ancak Kırklareli dolaylarında bir kaçakçı tarafından öldürüldüğü iddia edildi. Şiirler, hikâyeler, romanlar yazdı, çeviriler yaptı.', '..\\img\\yazar\\1743963314.jpeg'),
(22, 'Nazım Hikmet', 'NAZIM HİKMET RAN (Selanik, 20 Kasım 1901 – Moskova, 3 Haziran 1963) Nazım Hikmet Selanik\'te doğdu (1902). Bir süre Mekteb-i Sultani\'de ve Bahriye Mektebi\'nde okudu. Kurtuluş Savaşı yıllarında Anadolu\'ya geçti (1920). Bolu\'da öğretmenlik yaptı, sonra Rusya\'ya giderek (1921) Moskova Üniversitesi\'nde toplumbilim ve iktisat öğrenimi gördü. Yurda dönünce (1928) çeşitli gazete ve dergilerde, film stüdyolarında çalıştı; hazırlanan bir komplo sonucunda, orduyu ihtilale kışkırtma gerekçesiyle, Ankara\'da Harp Okulu, İstanbul\'da Donanma Komutanlığı mahkemelerince 28 yıl 4 aya mahkûm oldu (1938). Fakat 12 yıl hapis yattı (1938-1950).Yeni seçim dolayısıyla çıkarılan af kanunundan yararlanarak hapisten kurtuldu (Temmuz 1950).13 yıl yurtdışında yaşadı. 1963\'te kalp durmasından öldü.', '..\\img\\yazar\\1743963334.jpeg'),
(23, 'Frank Herbert', '(d.8 Ekim 1920 - ö.11 Şubat 1986),1920’de ABD’de doğan Frank Herbert, altı kitaplık, efsanevi Dune serisinin başı çektiği birçok bilimkurgu romanının yazarıdır. Tarihte verilen ilk Nebula Ödülü’nü kazanan yazarın Dune ile kazandığı bir de Hugo Ödülü bulunmaktadır. Yazar 1986’da hayata gözlerini kapamıştır.', '..\\img\\yazar\\1743963356.jpeg'),
(24, 'Ahmet Ümit', '1960’ta Gaziantep’te doğdu. 1983’te Marmara Üniversitesi Kamu Yönetimi Bölümü’nü bitirdi. 1985-1986 yıllarında, Moskova’da, Sosyal Bilimler Akademisi’nde siyaset eğitimi gördü. Şiirleri, 1989 yılında “Sokağın Zulası” adıyla yayımlandı. 1992’de ilk öykü kitabı “Çıplak Ayaklıydı Gece” yayımlandı. Bunu “Bir Ses Böler Geceyi”, “Agatha’nın Anahtarı”, “Şeytan Ayrıntıda Gizlidir” adlı polisiye öykü kitapları izledi. Hem çocuklara hem büyüklere yönelik “Masal Masal İçinde” ve “Olmayan Ülke” kitapları ile farklı bir tarz denedi. 1996’da yazdığı ilk romanı “Sis ve Gece”, polisiye edebiyatta bir başyapıt olarak değerlendirildi. Bu romanın ardından “Kar Kokusu”, “Patasana” ve “Kukla” yayımlandı.', '..\\img\\yazar\\1743963382.jpeg'),
(25, 'Platon', '(İÖ 427-348/347) Soylu bir ailenin oğluydu. Sokrates’in ölümüne kadar onun derslerini izledi. Ardından Mısır ve Güney İtalya’yı da kapsayan uzun bir yolculuğa çıktı. İÖ 387’de Atina’ya dönerek Akademia adlı okulu kurdu. Kendisinin olduğu kabul edilen 28 diyalogda, hocası Sokrates’in konuşmalarını bir araya getirir. Bunların en önemlilerinden bazıları şunlardır: Phaidon, Gorgias, Menon, Politikos.', '..\\img\\yazar\\1743963403.jpeg'),
(26, 'Albert Einstein', 'Almanya\'nın Ulm kentinde dünyaya gelen Einstein, yaşamının ilk yıllarını Münih\'te geçirdi. Lise eğitimini ve yüksek eğitimini İsviçre\'de tamamladı fakat bir üniversitede iş bulmada yaşadığı zorluklar nedeniyle bir patent ofisinde müfettiş olarak çalışmaya başladı. 1905 yılı Einstein için bir mucize yıl oldu ve o dönemde kuramları hemen benimsenmemiş olsa da ileride fizikte devrim yaratacak olan dört makale yayınladı. 1914 yılında Max Planck\'ın kişisel ricası ile Almanya\'ya geri döndü. 1921 yılında fotoelektrik etki üzerine çalışmaları nedeniyle Nobel Fizik Ödülü\'ne layık görüldü. Nazi Partisi\'nin iktidara yükselişi nedeniyle 1933\'te Almanya\'yı terk etti ve Amerika Birleşik Devletleri\'ne yerleşti. Ömrünün geri kalanını geçirdiği Princeton\'da hayatını kaybetmiştir.', '..\\img\\yazar\\1743963423.jpeg'),
(27, 'Stephen Hawking', '(d. 8 Ocak 1942, Oxford, Birleşik Krallık - ö. 14 Mart 2018, Cambridge, Birleşik Krallık) Hawking, University College\'da fizik okudu ve okulu birincilikle bitirdi. Cambridge Üniversitesi\'nde kozmoloji araştırmaları yaptı. Daha sonra bu alanda doktorasını bitirdi. 1973\'te uygulamalı matematik ve teorik fizik bölümüne geçti. Kuvantum teorisini yarattı ve evrenin sonsuz olmadığını buldu. Dünyanın önde gelen bilim adamlarından olan ve dâhi diye anılan Hawking\'in on iki tane onur derecesi var. NASA tarafından da ödüllendirilen Hawking halen bu kurumun üyesidir. Dünyaca ünlü İngiliz astrofizikçi ve evren bilimci Stephen Hawking 76 yaşında, \'Dünya Pi Günü\'nde hayatını kaybetti.', '..\\img\\yazar\\1743963441.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `kitap_id` int(11) DEFAULT NULL,
  `kullanici_id` int(11) DEFAULT NULL,
  `yorum_metni` text DEFAULT NULL,
  `eklenme_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `kitap_id`, `kullanici_id`, `yorum_metni`, `eklenme_tarihi`) VALUES
(1, 9, 47, 'Bu kitap gerçekten harika, herkese tavsiye ederim!', '2025-04-06 18:29:52'),
(3, 9, 47, 'çok iyi', '2025-04-06 19:27:50'),
(4, 9, 47, 'çok iyi', '2025-04-06 19:28:36'),
(5, 9, 47, 'çok iyi', '2025-04-06 19:28:51'),
(6, 75, 47, 'Süper kitap !', '2025-04-06 19:29:13'),
(12, 9, 47, 'sfafafafafaafaf', '2025-04-07 19:52:22'),
(13, 9, 47, 'merhaba', '2025-04-07 20:04:31'),
(14, 47, 48, 'Süper kitap', '2025-04-08 07:17:01');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kiralama`
--
ALTER TABLE `kiralama`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitap`
--
ALTER TABLE `kitap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yayinevi`
--
ALTER TABLE `yayinevi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitap_id` (`kitap_id`),
  ADD KEY `kullanici_id` (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `favori`
--
ALTER TABLE `favori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `kiralama`
--
ALTER TABLE `kiralama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Tablo için AUTO_INCREMENT değeri `kitap`
--
ALTER TABLE `kitap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `yayinevi`
--
ALTER TABLE `yayinevi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yazar`
--
ALTER TABLE `yazar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`kitap_id`) REFERENCES `kitap` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yorumlar_ibfk_2` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
