-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for book_store
CREATE DATABASE IF NOT EXISTS `book_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `book_store`;

-- Dumping structure for table book_store.author
CREATE TABLE IF NOT EXISTS `author` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.author: ~28 rows (approximately)
INSERT INTO `author` (`id`, `name`, `slug`) VALUES
	(14, 'Conan Doyle', 'conan-doyle'),
	(15, 'Nguyễn Du', 'nguyen-du'),
	(16, 'Dale Carnegie', 'dale-carnegie'),
	(17, 'Paulo Coelho', 'paulo-coelho'),
	(18, 'Chung Bora', 'chung-bora'),
	(19, 'A. G. Riddle', 'a-g-riddle'),
	(20, 'Thomas Harris', 'thomas-harris'),
	(21, 'Âm Hồng Tín, Lý Vĩ', 'am-hong-tin-ly-vi'),
	(22, 'Nguyễn Anh Dũng', 'nguyen-anh-dung'),
	(23, 'Nguyễn Nhật Ánh', 'nguyen-nhat-anh'),
	(24, 'Nam Cao', 'nam-cao'),
	(25, 'Tô Hoài', 'to-hoai'),
	(27, 'Xuân Quỳnh', 'xuan-quynh'),
	(28, 'Arthur Conan Doyle', 'arthur-conan-doyle'),
	(29, 'Agatha Christie', 'agatha-christie'),
	(30, 'J.K. Rowling', 'jk-rowling'),
	(31, 'George Orwell', 'george-orwell'),
	(32, 'Haruki Murakami', 'haruki-murakami'),
	(33, 'Ernest Hemingway', 'ernest-hemingway'),
	(34, 'F. Scott Fitzgerald', 'f-scott-fitzgerald'),
	(35, 'Mark Twain', 'mark-twain'),
	(36, 'Jane Austen', 'jane-austen'),
	(37, 'Leo Tolstoy', 'leo-tolstoy'),
	(38, 'Charles Dickens', 'charles-dickens'),
	(39, 'Victor Hugo', 'victor-hugo'),
	(40, 'Gabriel García Márquez', 'gabriel-garcia-marquez'),
	(41, 'Paulo Coelho', 'paulo-coelho'),
	(42, 'Stephen King', 'stephen-king');

-- Dumping structure for table book_store.book
CREATE TABLE IF NOT EXISTS `book` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_author_id_foreign` (`author_id`),
  KEY `book_category_id_foreign` (`category_id`) USING BTREE,
  CONSTRAINT `book_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  CONSTRAINT `book_cagetory_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.book: ~22 rows (approximately)
INSERT INTO `book` (`id`, `name`, `slug`, `category_id`, `author_id`, `price`, `stock`, `description`, `img`) VALUES
	(21, 'Truyện Kiều', 'truyen-kieu', 20, 15, 52000.00, 400, 'Truyện Kiều\r\n\r\nNguyễn Du (tên tự là Tố Như, hiệu là Thanh Hiên), là "Đại thi hào dân tộc" và là một danh nhân văn hóa thế giới. Tên tuổi của ông gắn liền với kiệt tác mang tên "Truyện Kiều".\r\n\r\n"Truyện Kiều từng là một niềm say mê lớn trong hàng trăm năm, đối với hàng triệu người, Truyện Kiều cũng sẽ mãi mãi là một niềm say mê lớn." - Hoài Thanh\r\n\r\nTruyện Kiều đã từng được coi là sách gối đầu giường của biết bao thế hệ. Người ta vịnh Kiều, bói Kiều, đưa Kiều từ văn học vào đời sống. Người ta tán thưởng Truyện Kiều, học tập văn chương của Truyện Kiều. Người ta cảm thông, xót thương cho những số phận hồng nhan nơi Truyện Kiều,... Chính những giá trị đó đã làm Truyện Kiều sống mãi trong văn học và đời sống của nhân dân Việt Nam. Nguyễn Du đã để lại cho hậu thế một "kho báu" mà tin chắc rằng xưa nay hiếm có nhà văn, nhà thơ nào có thể vượt qua được.', 'images/1754576513_NXBTreStoryFull_03462015_104616.jpg'),
	(22, 'Đắc Nhân Tâm', 'dac-nhan-tam', 21, 16, 64000.00, 200, '<p><strong>Đắc Nhân Tâm</strong></p><p>Một trong những cuốn sách thay đổi cuộc đời hàng triệu người trên thế giới</p><p>“Đắc nhân tâm”, một trong những cuốn sách bán chạy nhất mọi thời đại, do Dale Carnegie viết được xuất bản lần đầu vào năm 1936, trở thành cuốn sách đầu tiên và hay nhất thuộc thể loại sách phát triển bản thân. Tác phẩm được chuyển ngữ sang nhiều thứ tiếng với 15 triệu bản sách đã được bán ra trên khắp thế giới, đồng thời cũng là cuốn sách đứng đầu danh mục Sách bán chạy nhất của New York Times trong nhiều năm liền. Riêng ở Hoa Kỳ, cuốn sách đã được tái bản tới lần thứ 90.</p><p>Bìa của cuốn sách được thiết kế với phong cách tối giản, áp dụng những tông màu tương phản thu hút ánh nhìn và làm nổi bật thông tin quan trọng về cuốn sách. Thiết kế này được tinh chỉnh sao cho phù hợp và đồng nhất với các sản phẩm khác trên thị trường, giúp độc giả nhận biết và dễ dàng tiếp cận. Font chữ và bố cục trên bìa cũng được sắp xếp sao rõ ràng, tạo điều kiện thuận lợi cho việc đọc và tiếp nhận nội dung của sách.</p><p>Cuốn sách "Đắc nhân tâm" của Dale Carnegie không chỉ là một tài liệu về ứng xử - giao tiếp, mà nó còn là một hành trình tri thức và trải nghiệm sâu sắc cho mọi đối tượng độc giả, không phân biệt độ tuổi, chỉ cần có sự quan tâm và khao khát phát triển bản thân. Với sức ảnh hưởng lớn, cuốn sách này không chỉ là nguồn cảm hứng mà còn là hướng dẫn chi tiết giúp mỗi người tự khám phá và phát triển tiềm năng của bản thân mình.</p>', 'images/1754577764_Đắc Nhân Tâm.jpg'),
	(23, 'Nhà Giả Kim', 'nha-gia-kim', 19, 17, 79000.00, 300, '<p><i>Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người</i>.&nbsp;</p><p>Tiểu thuyết&nbsp;<i>Nhà giả kim&nbsp;</i>của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia,&nbsp;<i>Nhà giả kim&nbsp;</i>đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.</p>', 'images/1754900446_nha-gia-kim.png'),
	(24, 'Con Thỏ Nguyền Rủa', 'con-tho-nguyen-rua', 22, 18, 138000.00, 300, '<p><strong>Giải thưởng Sách Quốc gia cho Văn học Dịch (2023)</strong></p><p><strong>Đề cử Giải Booker Quốc tế - Danh sách rút gọn (2022)</strong></p><p>Chiếc đèn hình thỏ mang sức mạnh nguyền rủa, cái đầu nhớp nhúa trồi lên từ bồn cầu, vụ tai nạn xe hơi ly kỳ giữa đầm lầy, con cáo chảy máu vàng ròng, những kẻ sống và người chết bị trói buộc trong dòng chảy thời gian...</p><p>Con thỏ nguyền rủa là tập truyện ngắn đầy ám ảnh, hài hước, gớm ghiếc và ghê rợn về những cơn ác mộng của cuộc sống hiện đại, trong một thế giới "nhìn chung là khốc liệt và xa lạ, đôi khi cũng đẹp và mê hoặc, nhưng ngay cả trong những giây phút đó, về cơ bản nó vẫn là một chốn man rợ."</p><p>Cuốn sách là tuyển tập 10 truyện ngắn kinh dị của nhà văn Hàn Quốc Chung Bora, tái hiện lại những cuộc đời cô độc giữa xã hội vô cảm lạnh lùng.</p>', 'images/1754900663_con thỏ bị nguyền rủa.png'),
	(25, 'Thế Giới Atlantis', 'the-gioi-atlantis', 22, 19, 185000.00, 400, '<p><strong>TẬP TIẾP THEO TRONG BỘ SÁCH ATLANTIS CỦA A. G. RIDDLE KHIẾN BIẾT BAO ĐỘC GIẢ SAY ĐẮM!</strong></p><p>Một thảm họa ngoài sức tưởng tượng bao trùm toàn cầu.</p><p>Một tín hiệu bí ẩn từ vũ trụ sâu thẳm.</p><p>Một cơ hội sống sót cuối cùng cho loài người...</p><p>Khi đồng hồ điểm thời khắc sụp đổ của nền văn minh nhân loại, Tiến sĩ Kate Warner, đặc vụ David Vale cùng nhóm của họ bị đưa vào thử thách tối thượng.</p><p>Đối diện với sự truy đuổi của Dorian và âm mưu tàn độc của Ares, họ đã bất chấp hiểm nguy để chạy đua với thời gian, băng qua đống đổ nát của con tàu Atlantis còn sót lại trên Trái đất và các trạm khoa học Atlantis trên khắp thiên hà, cuối cùng đi vào quá khứ của một nền văn hóa bí ẩn: Thế giới Atlantis.</p><p>Ai sẽ thắng trong cuộc đua khốc liệt để vén màn những bí mật có thể cứu rỗi nhân loại trong giờ phút đen tối nhất?</p>', 'images/1754900822_atlantis.png'),
	(26, 'Sự Im Lặng Của Bầy Cừu', 'su-im-lang-cua-bay-cuu', 22, 20, 115000.00, 400, '<h4><strong>SỰ IM LẶNG CỦA BẦY CỪU - CUỘC ĐỐI ĐẦU ÁM ẢNH GIỮA THIỆN VÀ ÁC</strong></h4><p>Một tên sát nhân hàng loạt đang lộng hành, bắt cóc và giết hại phụ nữ. Những nạn nhân bị lột da một cách kinh hoàng, không dấu vết, không manh mối. Chỉ có một người có thể giúp phá giải vụ án – Hannibal Lecter.</p><p>Hắn không đơn giản là một kẻ sát nhân, mà là một thiên tài bệnh hoạn. Hắn nhìn thấu tâm trí con người, đọc vị từng góc tối sâu thẳm nhất trong linh hồn họ. FBI cần hắn. Nhưng đổi lại, hắn cũng cần một thứ: sự thật đen tối của chính người đang truy bắt mình.</p><p>Clarice Starling – nữ thực tập sinh FBI trẻ tuổi, liều lĩnh bước vào trò chơi nguy hiểm nhất đời cô. Một kẻ sát nhân giúp truy tìm một kẻ sát nhân khác. Nhưng liệu ai mới là kẻ thao túng trong ván cờ này?</p><p>“Clarice, lũ cừu còn kêu la trong đầu cô không?”<br>– Hannibal Lecter</p><h4><strong>Tại sao bạn không thể bỏ lỡ cuốn sách này?</strong></h4><p>Câu chuyện trinh thám nghẹt thở, cuốn người đọc vào từng chi tiết rùng rợn.</p><p>Trận đấu trí kinh điển, nơi ranh giới giữa thiện – ác, thợ săn – con mồi bị đảo lộn.</p><p>Hannibal Lecter – nhân vật phản diện gây ám ảnh bậc nhất, bước ra từ trang sách để thách thức mọi logic và nỗi sợ hãi của bạn.</p><h4><strong>"Sự Im Lặng Của Bầy Cừu" hội tụ đầy đủ yếu tố của một tiểu thuyết trinh thám kinh dị đỉnh cao:</strong></h4><p>Tình tiết giật gân, căng thẳng đến nghẹt thở.</p><p>Cuộc đối đầu trí tuệ giữa nữ đặc vụ và kẻ sát nhân thiên tài.</p><p>Ranh giới mong manh giữa cái thiện và cái ác – ai mới thực sự nguy hiểm?</p><p>Chuyến hành trình vào tâm trí quái vật – và có thể, chính tâm trí bạn cũng bị ám ảnh.</p>', 'images/1754901263_Sự im lặng của bầy cừu.png'),
	(27, 'Phương Pháp Học Tập Feynman - 5 Bước Giúp Bạn Học Nhanh, Nhớ Lâu, Tiến Bộ Vượt Bậc', 'phuong-phap-hoc-tap-feynman-5-buoc-giup-ban-hoc-nhanh-nho-lau-tien-bo-vuot-bac', 21, 21, 136000.00, 300, '<p><strong>Phương Pháp Học Tập Feynman - 5 Bước Giúp Bạn Học Nhanh, Nhớ Lâu, Tiến Bộ Vượt Bậc</strong></p><p>Nội dung cuốn sách:</p><p>- Giới thiệu về phương pháp học tập Feynman: Giải thích nguyên tắc hoạt động, lợi ích và cách áp dụng phương pháp.</p><p>- Hướng dẫn chi tiết từng bước áp dụng phương pháp: Xác định mục tiêu, hiểu rõ kiến thức, xem xét và đơn giản hóa kiến thức.</p><p>- Ví dụ minh họa: Cuốn sách cung cấp nhiều ví dụ sinh động, giúp bạn dễ dàng hiểu và áp dụng phương pháp vào thực tế.</p><p>- Lời khuyên hữu ích: Chia sẻ kinh nghiệm và bí quyết học tập hiệu quả từ tác giả và những người áp dụng thành công phương pháp.</p><p>Cuốn sách "Phương Pháp Học Tập Feynman" là một cẩm nang thiết yếu giúp bạn:</p><p>- Học tập hiệu quả và nhớ lâu hơn</p><p>- Áp dụng kiến thức vào thực tế một cách thành công</p><p>- Kích thích tư duy sáng tạo và phát triển bản thân</p><p>Hãy sở hữu ngay cuốn sách này để bắt đầu hành trình chinh phục kiến thức và thành công!</p>', 'images/1754901550_Phương Pháp Học Tập Feynman - 5 Bước Giúp Bạn Học Nhanh, Nhớ Lâu, Tiến Bộ Vượt Bậc.png'),
	(28, 'Tư Duy Ngược', 'tu-duy-nguoc', 21, 22, 139000.00, 300, '<p><strong>Tư Duy Ngược</strong></p><p>Chúng ta thực sự có hạnh phúc không? Chúng ta có đang sống cuộc đời mình không? Chúng ta có dám dũng cảm chiến thắng mọi khuôn mẫu, định kiến, đi ngược đám đông để khẳng định bản sắc riêng của mình không?. Có bao giờ bạn tự hỏi như thế, rồi có câu trả lời cho chính mình?</p><p>Tôi biết biết, không phải ai cũng đang sống cuộc đời của mình, không phải ai cũng dám vượt qua mọi lối mòn để sáng tạo và thành công… Dựa trên việc nghiên cứu, tìm hiểu, chắt lọc, tìm kiếm, ghi chép từ các câu chuyện trong đời sống, cũng như trải nghiệm của bản thân, tôi viết cuốn sách này.</p><p>Cuốn sách sẽ giải mã bạn là ai, bạn cần <strong>Tư duy ngược</strong> để thành công và hạnh phúc như thế nào và các phương pháp giúp bạn dũng cảm sống cuộc đời mà bạn muốn.</p>', 'images/1754901699_tư duy ngược.png'),
	(29, 'Sách - Boxset Sherlock Holmes (6 quyển) (Tặng Kèm 06 Postcard)', 'sach-boxset-sherlock-holmes-6-quyen-tang-kem-06-postcard', 22, 14, 880000.00, 300, '<p>BOXSET SHERLOCK HOLMES TRỌN BỘ VỚI BẢN DỊCH MỚI VÀ THIẾT KẾ GÁY GHÉP HÌNH ĐỘC ĐÁO!!!</p><p>“Tên tôi là Sherlock Holmes. Nghề của tôi là biết những điều mà người khác không biết.”</p><p>Tại số 221B phố Baker, bác sĩ John H. Watson ở chung căn hộ với Sherlock Holmes. Holmes có thói quen nghiền ngẫm những tờ nhật báo sáng, chơi vĩ cầm, thi thoảng lại hút thuốc hay chìm trong cơn đê mê; và dẫu đôi khi trời tuyết rơi dày, hay sương mù giăng lối, ta luôn biết rằng có một cỗ xe sắp dừng lại, tiếng bước chân vội vã vang trên nền đá cuội, và cánh cửa căn hộ kia sẽ mở ra để dẫn bước cho một người khách xa lạ, đang chìm đắm trong sầu não. Câu đố được đưa ra, và một cuộc điều tra mới sẽ bắt đầu với vị thám tử đại tài cùng cộng sự thân thiết kiêm người viết tiểu sử tận tuỵ của anh.</p><p>Khi nhà văn Arthur Conan Doyle giới thiệu tới thế giới nhân vật Sherlock Holmes vào năm 1887, một biểu tượng văn hoá đại chúng đích thực đã ra đời. Sherlock Holmes có lẽ là nhân vật thám tử hư cấu nổi tiếng nhất trong lịch sử, và cũng là một trong những nhân vật văn học được biết đến nhiều nhất trên toàn thế giới.</p><p>Bên cạnh 4 tiểu thuyết và 56 truyện ngắn quen thuộc, ấn bản SHERLOCK HOLMES trọn bộ này còn giới thiệu với bạn đọc 4 truyện ngắn khác có liên quan tới vị thám tử lừng danh, song hiếm khi được xuất hiện trong các bộ sách Sherlock Holmes toàn tập.</p><p>&nbsp;</p><p>Boxset trọn bộ gồm 6 tập sách:</p><p>1. Cuộc điều tra màu đỏ &amp; Dấu bộ tứ</p><p>2. Những cuộc phiêu lưu của Sherlock Holmes</p><p>3. Hồi ức về Sherlock Holmes</p><p>4. Sự trở về của Sherlock Holmes</p><p>5. Con chó của dòng họ Baskerville &amp; Thung lũng kinh hoàng</p><p>6. Cung đàn sau cuối &amp; Tàng thư của Sherlock Holmes</p><p>Boxset Sherlock Holmes (Trọn bộ 6 tập) với thiết kế độc ghép gáy độc đáo, tặng kèm 06 Postcard</p>', 'images/1755140730_sherlockhomles.png'),
	(30, 'Trọn bộ Kính Vạn Hoa (Phiên bản mới) - 18 tập', 'tron-bo-kinh-van-hoa-phien-ban-moi-18-tap', 62, 23, 1350000.00, 300, '<p>"Ấn bản mới gồm 18 tập với minh họa của họa sĩ Đỗ Hoàng Tường – bạn tri âm tri kỷ, người đồng hành với các tác phẩm của nhà văn Nguyễn Nhật Ánh suốt hơn ba thập kỉ qua.</p><p>Những minh họa trong ấn phẩm mới này được họa sĩ Đỗ Hoàng Tường trau chuốt kĩ lưỡng. Qua nét vẽ hiện đại, cá tính và đầy nghệ thuật, thế giới học trò tinh nghịch hiện lên sống động hòa quyện với những lời văn của “hoàng tử bé” Nguyễn Nhật Ánh.</p><p>Ra mắt tập đầu tiên từ cuối năm 1995, cho đến nay, Kính vạn hoa vẫn giữ kỉ lục là bộ sách dài tập nhất cho thiếu nhi với số lượng bản in lên tới hàng triệu bản.</p><p>Xoay quanh ba nhân vật chính là Quý ròm, nhỏ Hạnh và Tiểu Long cùng hàng trăm nhân vật phụ khác, nhà văn Nguyễn Nhật Ánh đã tạo nên một thế giới tuổi thơ sống động trải dài ở nhiều không gian và bối cảnh khác nhau.</p><p>Với tâm niệm “khi viết tôi mãi là cậu bé 15 tuổi” nhà văn Nguyễn Nhật Ánh đã mang đến những trang viết dí dỏm, hóm hỉnh, với những triết lý, chiêm nghiệm đầy chất học trò. Bằng bút lực dồi dào hiếm có, “ảo thuật gia” Nguyễn Nhật Ánh “cứ lắc một cái, một câu chuyện mới lại hiện ra”, tạo nên 54 tập sách Kính vạn hoa lung linh sắc màu.</p><p>Nhà văn Nguyễn Việt Hà nhận định: “Ngày nay, với riêng chủ đề về bọn trẻ loay hoay đang lớn, Nguyễn Nhật Ánh là một nhà văn bậc nhất.”"</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', 'images/1755148890_Kinh-van-hoa.png'),
	(31, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh (Tái Bản 2023)', 'toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023', 64, 23, 127500.00, 300, '<p><strong>Tôi Thấy Hoa Vàng Trên Cỏ Xanh</strong></p><p>Những câu chuyện nhỏ xảy ra ở một ngôi làng nhỏ: chuyện người, chuyện cóc, chuyện ma, chuyện công chúa và hoàng tử , rồi chuyện đói ăn, cháy nhà, lụt lội,... Bối cảnh là trường học, nhà trong xóm, bãi tha ma. Dẫn chuyện là cậu bé 15 tuổi tên Thiều. Thiều có chú ruột là chú Đàn, có bạn thân là cô bé Mận. Nhưng nhân vật đáng yêu nhất lại là Tường, em trai Thiều, một cậu bé học không giỏi. Thiều, Tường và những đứa trẻ sống trong cùng một làng, học cùng một trường, có biết bao chuyện chung. Chúng nô đùa, cãi cọ rồi yêu thương nhau, cùng lớn lên theo năm tháng, trải qua bao sự kiện biến cố của cuộc đời.</p><p>Tác giả vẫn giữ cách kể chuyện bằng chính giọng trong sáng hồn nhiên của trẻ con. 81 chương ngắn là 81 câu chuyện hấp dẫn với nhiều chi tiết thú vị, cảm động, có những tình tiết bất ngờ, từ đó lộ rõ tính cách người. Cuốn sách, vì thế, có sức ám ảnh.</p>', 'images/1755149229_Tôi Thấy Hoa Vàng Trên Cỏ Xanh (Tái Bản 2023).png'),
	(32, 'Cho Tôi Xin Một Vé Đi Tuổi Thơ (Tái Bản 2023)', 'cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023', 64, 23, 90000.00, 300, '<h3><strong>CHO TÔI XIN MỘT VÉ ĐI TUỔI THƠ - HỒI ỨC NGỌT NGÀO CỦA NHỮNG NGÀY XƯA TƯƠI ĐẸP</strong></h3><p>Bạn có bao giờ muốn quay ngược thời gian, trở lại những ngày vô tư chạy chân trần trên sân, háo hức đợi cây kem ốc quế hay trốn ngủ trưa để chơi cùng lũ bạn? Cho Tôi Một Vé Về Tuổi Thơ chính là tấm vé đưa bạn trở lại khoảng trời hồn nhiên ấy.</p><p><strong>TÓM TẮT NỘI DUNG SÁCH</strong></p><p>Câu chuyện xoay quanh cu Mùi, Tí sún, Hải cò và Tủn - nhóm trẻ con với những trò nghịch ngợm “nhất quỷ, nhì ma”. Dưới góc nhìn hài hước nhưng cũng đầy sâu sắc, Nguyễn Nhật Ánh không chỉ kể về những trò chơi thơ ấu mà còn mở ra cả một thế giới tuổi thơ chân thực: những buổi trốn ngủ trưa đi thả diều, những lần tức tối vì người lớn áp đặt, hay những rung động đầu đời vụng dại.&nbsp;</p><p>Nhưng tuổi thơ không kéo dài mãi mãi. Khi lớn lên, ta nhận ra điều từng chán ghét lúc bé lại là thứ ta khao khát nhất khi trưởng thành. Cuốn sách không chỉ khiến bạn cười vì những trò nghịch dại, mà còn lắng lại để suy ngẫm: liệu người lớn có thực sự hiểu trẻ con, hay chỉ áp đặt chúng theo cách mình muốn?</p><p><strong>Quyển sách mang đến cho bạn:</strong></p><p>Cảm giác được sống lại tuổi thơ – cuốn sách này chính là cánh cửa đưa bạn trở lại những ngày tháng đẹp nhất trong đời.</p><p>Một góc nhìn mới về cuộc sống – đôi khi hạnh phúc đến từ những điều giản đơn nhất.</p><p>Giúp đấng sinh thành hiểu hơn về tuổi thơ và cải thiện mối quan hệ với con cái.</p>', 'images/1755149362_Cho Tôi Xin Một Vé Đi Tuổi Thơ (Tái Bản 2023).png'),
	(33, 'Chí Phèo', 'chi-pheo', 30, 24, 50000.00, 400, '<p><strong>Chí Phèo</strong></p><p>Nam Cao&nbsp;có bút danh là Thúy Rư, Xuân Du, Nguyệt, Nhiêu Khê...</p><p>Tên khai sinh: Trần Hữu Tri, sinh ngày 29 tháng 10 năm 1917. Quê quán: làng Đại Hoàng, phủ Lý Nhân, tỉnh Hà Nam (nay là xã Hòa Hậu, huyện Lý Nhân, Hà Nam). Đảng viên Đảng Cộng sản Việt Nam.</p><p>Tác phẩm đã xuất bản: Đôi lứa xứng đôi (truyện ngắn, 1941); Nửa đêm (truyện ngắn, 1944); Cười (truyện ngắn, 1946), Ở rừng (nhật ký, 1948); Truyện biên giới (1951); Đôi mắt(truyện ngắn, 1954); Sống mòn (truyện dài, 1956); Chí Phèo (1957); Truyện ngắn Nam Cao (truyện ngắn, 1960); Một đám cưới (truyện ngắn, 1963); Tác phẩm Nam Cao (tuyển, 1964); Nam Cao tác phẩm (tập I: 1976, tập II: 1977); Tuyển tập Nam Cao(tập I: 1987, tập II: 1993); Những cánh hoa tàn (truyện ngắn, 1988); Nam Cao truyện ngắn tuyển chọn (1995); Nam Cao truyện ngắn (chọn lọc, 1996); Nam Cao toàn tập (1999).</p><p>Ngoài ra ông còn làm thơ, viết kịch (Đóng góp, 1951) và biên soạn sách địa lý cùng với Văn Tân (Địa dư các nước châu Âu, 1948); Địa dư các nước châu Á, châu Phi, 1949; Địa dư Việt Nam, 1951.</p><p><strong>“Chí Phèo”&nbsp;</strong>– tập truyện ngắn tái hiện bức tranh chân thực nông thôn Việt Nam trước 1945, nghèo đói, xơ xác trên con đường phá sản, bần cùng, hết sức thê thảm, người nông dân bị đẩy vào con đường tha hóa, lưu manh hóa.&nbsp;Nam Cao&nbsp;không hề bôi nhọ người nông dân, trái lại nhà văn đi sâu vào nội tâm nhân vật để khẳng định nhân phẩm và bản chất lương thiện ngay cả khi bị vùi dập, cướp mất cà nhân hình, nhân tính của người nông dân, đồng thời kết án đanh thép cái xã hội tàn bạo đó trước 1945.</p><p>Những sáng tác của Nam Cao ngoài giá trị hiện thực sâu sắc, các tác phẩm đi sâu vào nội tâm nhân vật, để lại những cảm xúc sâu lắng trong lòng người đọc.</p>', 'images/1755149445_Chí Phèo.png'),
	(35, 'Nam Cao - Lão Hạc (Tái Bản)', 'nam-cao-lao-hac-tai-ban', 30, 24, 55000.00, 300, '<p>Nam Cao (1915-1951) tên thật là Trần Hữu Tri (theo giấy khai sinh 1917-1951), sinh tại làng Đại Hoàng, tổng Cao Đà, huyện Nam Sang, phú Lý Nhân, tỉnh Hà Nam. Ông đã ghép hai chữ của tên tổng và huyện làm bút danh Nam Cao.<br>Lão Hạc là một truyện ngắn của nhà văn Nam Cao được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.</p><p>Lão Hạc, một người nông dân chất phác, hiền lành. Lão góa vợ và có một người con trai nhưng vì quá nghèo nên không thể lấy vợ cho người con trai của mình. Người con trai lão vì thế đã rời bỏ quê hương để đến đồn điền cao su làm ăn kiếm tiền. Lão luôn trăn trở, suy nghĩ về tương lai của đứa con. Lão sống bằng nghề làm vườn, mảnh vườn mà vợ lão đã mất bao công sức để mua về và để lại cho con trai lão. So với những người khác lúc đó, gia cảnh của lão khá đầy đủ, tuy nhiên do ốm yếu hơn hai tháng và cũng vì trận bão mà lão không có việc gì để làm. Lão đã rất dằn vặt bản thân mình khi mang một "tội lỗi" là đã nỡ tâm "lừa một con chó". Lão đã khóc rất nhiều với ông giáo (người hàng xóm thân thiết của lão).</p>', 'images/1755171166_lão hạc.png'),
	(36, 'Dế Mèn Phiêu Lưu Ký - Tái Bản 2020', 'de-men-phieu-luu-ky-tai-ban-2020', 64, 25, 50000.00, 300, '<p><strong>Dế Mèn Phiêu Lưu Ký - Tái Bản 2020</strong></p><p>Ấn bản minh họa màu đặc biệt của Dế Mèn phiêu lưu ký, với phần tranh ruột được in hai màu xanh - đen ấn tượng, gợi không khí đồng thoại.</p><p>“Một con dế đã từ tay ông thả ra chu du thế giới tìm những điều tốt đẹp cho loài người. Và con dế ấy đã mang tên tuổi ông đi cùng trên những chặng đường phiêu lưu đến với cộng đồng những con vật trong văn học thế giới, đến với những xứ sở thiên nhiên và văn hóa của các quốc gia khác. Dế Mèn Tô Hoài đã lại sinh ra Tô Hoài Dế Mèn, một nhà văn trẻ mãi không già trong văn chương...” - Nhà phê bình Phạm Xuân Nguyên</p><p>“Ông rất hiểu tư duy trẻ thơ, kể với chúng theo cách nghĩ của chúng, lí giải sự vật theo lô gích của trẻ. Hơn thế, với biệt tài miêu tả loài vật, Tô Hoài dựng lên một thế giới gần gũi với trẻ thơ. Khi cần, ông biết đem vào chất du ký khiến cho độc giả nhỏ tuổi vừa hồi hộp theo dõi, vừa thích thú khám phá.” - TS Nguyễn Đăng Điệp</p>', 'images/1755171255_Dế Mèn Phiêu Lưu Ký - Tái Bản 2020.png'),
	(37, 'Harry Potter Và Hòn Đá Phù Thủy - Tập 1', 'harry-potter-va-hon-da-phu-thuy-tap-1', 65, 30, 108000.00, 400, '<p>Khi một lá thư được gởi đến cho cậu bé Harry Potter bình thường và bất hạnh, cậu khám phá ra một bí mật đã được che giấu suốt cả một thập kỉ. Cha mẹ cậu chính là phù thủy và cả hai đã bị lời nguyền của Chúa tể Hắc ám giết hại khi Harry mới chỉ là một đứa trẻ, và bằng cách nào đó, cậu đã giữ được mạng sống của mình. Thoát khỏi những người giám hộ Muggle không thể chịu đựng nổi để nhập học vào trường Hogwarts, một trường đào tạo phù thủy với những bóng ma và phép thuật, Harry tình cờ dấn thân vào một cuộc phiêu lưu đầy gai góc khi cậu phát hiện ra một con chó ba đầu đang canh giữ một căn phòng trên tầng ba. Rồi Harry nghe nói đến một viên đá bị mất tích sở hữu những sức mạnh lạ kì, rất quí giá, vô cùng nguy hiểm, mà cũng có thể là mang cả hai đặc điểm trên.</p>', 'images/1755171790_Harry Potter Và Hòn Đá Phù Thủy - Tập 1.png'),
	(38, 'Harry Potter Và Phòng Chứa Bí Mật - Tập 2', 'harry-potter-va-phong-chua-bi-mat-tap-2', 65, 30, 120000.00, 400, '<p>Harry khổ sở mong ngóng cho kì nghỉ hè kinh khủng với gia đình Dursley kết thúc. Nhưng một con gia tinh bé nhỏ tội nghiệp đã cảnh báo cho Harry biết về mối nguy hiểm chết người đang chờ cậu ở trường Hogwarts.</p><p>Trở lại trường học, Harry nghe một tin đồn đang lan truyền về phòng chứa bí mật, nơi cất giữ những bí ẩn đáng sợ dành cho giới phù thủy có nguồn gốc Muggle. Có kẻ nào đó đang phù phép làm tê liệt mọi người, khiến họ gần như đã chết, và một lời cảnh báo kinh hoàng được tìm thấy trên bức tường. Mối nghi ngờ hàng đầu – và luôn luôn sai lầm – là Harry. Nhưng một việc còn đen tối hơn thế đã được hé mở.</p><p>‘Harrt Potter và phòng chứa bí mật, không như những bộ truyện nhiều tập khác, vẫn tuyệt hay như người anh em trước… Hogwarts là sáng tạo của một thiên tài.’-</p>', 'images/1755171880_Harry Potter Và Phòng Chứa Bí Mật - Tập 2.png'),
	(39, 'Harry Potter Và Tên Tù Nhân Ngục Azkaban - Tập 3', 'harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3', 65, 30, 140000.00, 300, '<p>Harry Potter may mắn sống sót đến tuổi 13, sau nhiều cuộc tấn công của Chúa tể hắc ám.</p><p>Nhưng hy vọng có một học kỳ yên ổn với Quidditch của cậu đã tiêu tan thành mây khói khi một kẻ điên cuồng giết người hàng loạt vừa thoát khỏi nhà tù Azkaban, với sự lùng sục của những cai tù là giám ngục.</p><p>Dường như trường Hogwarts là nơi an toàn nhất cho Harry lúc này. Nhưng có phải là sự trùng hợp khi cậu luôn cảm giác có ai đang quan sát mình từ bóng đêm, và những điềm báo của giáo sư Trelawney liệu có chính xác?</p><p>‘Câu chuyện được kể với trí tưởng tượng bay bổng, sự hài hước bất tận có thể quyến rũ cả người lớn lẫn trẻ em.’</p>', 'images/1755171958_Harry Potter Và Tên Tù Nhân Ngục Azkaban - Tập 3.png'),
	(40, 'Harry Potter Và Chiếc Cốc Lửa - Tập 4', 'harry-potter-va-chiec-coc-lua-tap-4', 65, 30, 205000.00, 300, '<p>Harry Potter 14 tuổi, cùng gia đình Weasley tham dự Cúp Quidditch thế giới, nơi diễn ra một hiện tượng kỳ bí làm cho mọi người đều run sợ.</p><p>Rồi cậu bước vào năm thứ tư ở trường Hogwarts, với cuộc thi Tam Pháp Thuật đầy thử thách, cùng với các nhà phù thủy thiếu niên tài năng trên thế giới. Năm nay cậu lại có một giáo sư mới cho môn Phòng chống nghệ thuật hắc ám - Moody Mắt Điên.</p><p>Chúa tể Voldermort luôn tìm mọi cách để hồi sinh và lấy lại lực lượng hùng mạnh của hắn, những kẻ tay sai của hắn không bao giờ bỏ qua cơ họi để thể hiện lòng trung thành, những mối nguy hiểm vẫn đang diễn ra và Harry sẽ chiến đấu ra sao. Mời bạn đón xem!</p>', 'images/1755172059_Harry Potter Và Chiếc Cốc Lửa - Tập 4.png'),
	(41, 'Harry Potter Và Hội Phượng Hoàng - Tập 5', 'harry-potter-va-hoi-phuong-hoang-tap-5', 65, 30, 385000.00, 300, '<p>Harry Potter 14 tuổi, cùng gia đình Weasley tham dự Cúp Quidditch thế giới, nơi diễn ra một hiện tượng kỳ bí làm cho mọi người đều run sợ.</p><p>Rồi cậu bước vào năm thứ tư ở trường Hogwarts, với cuộc thi Tam Pháp Thuật đầy thử thách, cùng với các nhà phù thủy thiếu niên tài năng trên thế giới. Năm nay cậu lại có một giáo sư mới cho môn Phòng chống nghệ thuật hắc ám - Moody Mắt Điên.</p><p>Chúa tể Voldermort luôn tìm mọi cách để hồi sinh và lấy lại lực lượng hùng mạnh của hắn, những kẻ tay sai của hắn không bao giờ bỏ qua cơ họi để thể hiện lòng trung thành, những mối nguy hiểm vẫn đang diễn ra và Harry sẽ chiến đấu ra sao. Mời bạn đón xem!</p>', 'images/1755172148_Harry Potter Và Hội Phượng Hoàng - Tập 5.png'),
	(42, 'Harry Potter Và Hoàng Tử Lai - Tập 06', 'harry-potter-va-hoang-tu-lai-tap-06', 65, 30, 245000.00, 300, '<p>Đây là năm thứ 6 của Harry Potter tại trường Hogwarts. Trong lúc những thế lực hắc ám của Voldemort gieo rắc nỗi kinh hoàng và sợ hãi ở khắp nơi, mọi chuyện càng lúc càng trở nên rõ ràng hơn đối với Harry, rằng cậu sẽ sớm phải đối diện với định mệnh của mình. Nhưng liệu Harry đã sẵn sàng vượt qua những thử thách đang chờ đợi phía trước?</p><p>Trong cuộc phiêu lưu tăm tối và nghẹt thở nhất của mình, J.K.Rowling bắt đầu tài tình tháo gỡ từng mắc lưới phức tạp mà cô đã mạng lên, cũng là lúc chúng ta khám phá ra sự thật về Harry, cụ Dumblebore, thầy Snape và, tất nhiên, Kẻ Chớ Gọi Tên Ra…</p><p>‘Diễn biến nhanh, huyền bí, hấp dẫn và chặt chẽ trong từng chi tiết.’ - Daily Mail</p>', 'images/1755172216_Harry Potter Và Hoàng Tử Lai - Tập 06.png'),
	(43, 'Harry Potter Và Bảo Bối Tử Thần - Tập 7', 'harry-potter-va-bao-boi-tu-than-tap-7', 65, 30, 285000.00, 400, '<p>Harry Potter đang chuẩn bị rời khỏi nhà Dursley và đường Privet Drive trong thời khắc cuối cùng. Tuy nhiên, tương lai Harry đầy rẫy hiểm nguy, không chỉ cho cậu mà cả những người gần gũi – và Harry đã mất mát quá nhiều. Chỉ bằng cách tiêu hủy những Trường Sinh Linh Giá, Harry Potter mới có thể tự cứu mình và vượt qua những thế lực đen tối của Chúa tể hắc ám.</p><p>Ở phần kết đầy kịch tính của loạt truyện Harry Potter này, Harry phải để những người bạn trung thành nhất ở lại tuyến sau để dấn thân vào cuộc hành trình nguy hiểm cuối cùng hòng tìm kiếm sức mạnh và đối mặt với số phận đáng sợ của cậu: một cuộc chiến sinh tử và đơn độc.</p>', 'images/1755172288_Harry Potter Và Bảo Bối Tử Thần - Tập 7.png');

-- Dumping structure for table book_store.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `book_id` bigint unsigned DEFAULT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_user_id_foreign` (`user_id`),
  KEY `cart_book_id_foreign` (`book_id`),
  CONSTRAINT `cart_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.cart: ~0 rows (approximately)

-- Dumping structure for table book_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cagetory_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.category: ~38 rows (approximately)
INSERT INTO `category` (`id`, `name`, `slug`) VALUES
	(19, 'Tiểu Thuyết', 'tieu-thuyet'),
	(20, 'Truyện Ngắn', 'truyen-ngan'),
	(21, 'Self Help', 'self-help'),
	(22, 'Trinh Thám - Kinh Dị', 'trinh-tham-kinh-di'),
	(23, 'Từ Điển', 'tu-dien'),
	(28, 'Thơ', 'tho'),
	(29, 'Tản văn', 'tan-van'),
	(30, 'Văn học cổ điển', 'van-hoc-co-dien'),
	(31, 'Công nghệ thông tin', 'cong-nghe-thong-tin'),
	(32, 'Khoa học tự nhiên', 'khoa-hoc-tu-nhien'),
	(33, 'Toán học', 'toan-hoc'),
	(34, 'Kinh tế học', 'kinh-te-hoc'),
	(35, 'Quản trị kinh doanh', 'quan-tri-kinh-doanh'),
	(36, 'Marketing', 'marketing'),
	(37, 'Khởi nghiệp', 'khoi-nghiep'),
	(38, 'Tài chính – Đầu tư', 'tai-chinh-dau-tu'),
	(39, 'Phát triển bản thân', 'phat-trien-ban-than'),
	(40, 'Tâm lý học ứng dụng', 'tam-ly-hoc-ung-dung'),
	(41, 'Giao tiếp – Ứng xử', 'giao-tiep-ung-xu'),
	(42, 'Truyện tranh', 'truyen-tranh'),
	(43, 'Sách tô màu', 'sach-to-mau'),
	(44, 'Truyện cổ tích', 'truyen-co-tich'),
	(45, 'Lịch sử Việt Nam', 'lich-su-viet-nam'),
	(46, 'Lịch sử thế giới', 'lich-su-the-gioi'),
	(47, 'Chính trị – Pháp luật', 'chinh-tri-phap-luat'),
	(48, 'Văn hóa – Xã hội', 'van-hoa-xa-hoi'),
	(49, 'Sách học tiếng Anh', 'sach-hoc-tieng-anh'),
	(50, 'Từ điển Anh – Việt', 'tu-dien-anh-viet'),
	(51, 'Sách giáo khoa', 'sach-giao-khoa'),
	(52, 'Sách tham khảo', 'sach-tham-khao'),
	(53, 'Y học – Sức khỏe', 'y-hoc-suc-khoe'),
	(54, 'Âm nhạc', 'am-nhac'),
	(55, 'Hội họa', 'hoi-hoa'),
	(56, 'Nhiếp ảnh', 'nhiep-anh'),
	(57, 'Điện ảnh', 'dien-anh'),
	(62, 'Truyện Dài', 'truyen-dai'),
	(64, 'Thiếu Nhi', 'thieu-nhi'),
	(65, 'Fantasy', 'fantasy');

-- Dumping structure for table book_store.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.migrations: ~16 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2025_03_24_143638_create_cagetory_table', 1),
	(2, '2025_03_24_143651_create_author_table', 1),
	(3, '2025_03_24_143718_create_book_table', 1),
	(4, '2025_03_24_143734_create_user_table', 1),
	(5, '2025_03_24_143805_create_orders_table', 1),
	(6, '2025_03_24_143822_create_order_details_table', 1),
	(7, '2025_03_24_143834_create_reviews_table', 1),
	(8, '2025_03_24_143845_create_cart_table', 1),
	(9, '2025_03_24_145323_add_img_to_book_table', 1),
	(14, '2014_10_12_100000_create_password_resets_table', 2),
	(15, '2025_04_28_131452_add-infomation-on-user', 3),
	(16, '2025_08_02_034456_create_sessions_table', 4),
	(24, '2025_08_13_105714_add_slug_to_book_table', 5),
	(25, '2025_08_13_105730_add_slug_to_category_table', 6),
	(26, '2025_08_13_110030_add_slug_to_author_table', 7),
	(27, '2025_08_15_070338_add_timestamp_to_orders_table', 8);

-- Dumping structure for table book_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','canceled','shipping') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.orders: ~2 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `name`, `email`, `note`, `session_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
	(25, 6, 'Khu Phố Khoan Hậu, Phường Xuân Đài, Thị xã Sông Cầu, Tỉnh Phú Yên', '0388145796', 'Cao Lương Thiện', 'thiencao.work@gmail.com', NULL, NULL, 272000.00, 'pending', NULL, NULL),
	(26, 6, 'Khu Phố Khoan Hậu, Phường Xuân Đài, Thị xã Sông Cầu, Tỉnh Phú Yên', '0388145796', 'Cao Lương Thiện', 'thiencao.work@gmail.com', NULL, NULL, 194000.00, 'pending', '2025-08-15 00:16:08', '2025-08-15 00:16:08');

-- Dumping structure for table book_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `book_id` bigint unsigned DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_book_id_foreign` (`book_id`),
  KEY `order_details_ibfk_1` (`order_id`),
  CONSTRAINT `order_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.order_details: ~3 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `quantity`, `price`, `total`) VALUES
	(18, 25, 27, 2, 136000.00, 272000.00),
	(19, 26, 26, 1, 115000.00, 115000.00),
	(20, 26, 23, 1, 79000.00, 79000.00);

-- Dumping structure for table book_store.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.password_resets: ~0 rows (approximately)

-- Dumping structure for table book_store.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `book_id` bigint unsigned DEFAULT NULL,
  `rating` smallint NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_book_id_foreign` (`book_id`),
  CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.reviews: ~0 rows (approximately)

-- Dumping structure for table book_store.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('s5MsFGdS4WyMnkUtnq2y1D3yeugP6xohFfiKm6Hn', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWjU5OTdhenB4VHNuVHpReXB0U0xvRnZtY1lNYTBScFc0ckFlYjkwZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1755243170),
	('wDfavgP8kS6UZUEhbC98kytdqQBbRP4AZWBgPTuZ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDVHU3BsWkdsRW16dzhqVVl3Y2FuU2J2VnZXbFBtaTQwazRoNWRJbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755240274);

-- Dumping structure for table book_store.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Nam','Nữ') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.user: ~2 rows (approximately)
INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `phone`, `gender`, `dateofbirth`) VALUES
	(5, 'Admin', 'admin@gmail.com', '$2y$12$18rvIalUzaDlfAq./rB/re0237m4TqrNkPTcUplSeJ9IDeMXYAHRK', 'admin', '0388145796', 'Nam', '2025-03-11'),
	(6, 'Cao Lương Thiện', 'thiencao.work@gmail.com', '$2y$12$A6NBZvmtrczZIkOhTvko0OvReyedY2vDEjn1zuUUL3Lses1KAA.Ta', 'admin', '0388145796', 'Nam', '2001-12-12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
