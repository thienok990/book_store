book_storebook_storebook_store-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 04:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Conan Doyle'),
(2, 'Vũ Trọng Phụng'),
(4, 'Nguyễn Du'),
(5, 'David McRaney'),
(6, 'Paulo Coelho'),
(7, 'José Mauro de Vasconcelos'),
(8, 'John Gray'),
(9, 'Nguyễn Nhật Ánh'),
(10, 'Nguyên Phong');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book``user`
--

INSERT INTO `book` (`id`, `name`, `category_id`, `author_id`, `price`, `stock`, `description`, `img`) VALUES
(9, 'Sherlock Holmes', 3, 1, 200000.00, 500, '<p>Combo Sherlock Holmes Toàn Tập</p><p>Sherlock Holmes là một nhân vật thám tử hư cấu vào cuối thể kỉ 19 và đầu thế kỉ 20, xuất hiện lần đầu trong tác phẩm của nhà văn Arthur Conan Doyle xuất bản năm 1887. Ông là một thám tử tư ở Luân Đôn nổi tiếng nhờ trí thông minh, khả năng suy diễn logic và quan sát tinh tường trong khi phá những vụ án mà cảnh sát phải bó tay. Nhiều người cho rằng Sherlock Holmes là nhân vật thám tử hư cấu nổi tiếng nhất trong lịch sử văn học và là một trong những nhân vật văn học được biết đến nhiều nhất toàn thế giới.</p><p>Sherlock Holmes đã xuất hiện trong 4 tiểu thuyết và 56 truyện ngắn của nhà văn Conan Doyle. Hầu như tất cả các tác phẩm đều được viết dưới dạng ghi chép của bác sĩ John H. Watson, người bạn thân thiết và người ghi chép tiểu sử của Sherlock Holmes, chỉ có 2 tác phẩm được viết dưới dạng ghi chép của người thứ ba. Hai tác phẩm đầu tiên trong số này là 2 tiểu thuyết ngắn và được xuất hiện lần đầu tiên trên tờ Beeton\'s Christmas Annual vào năm 1887 và tời Lippincott\'s Monthly Magazine vào văm 1890. Thám tử Holmes trở nên cực kì nổi tiếng khi loạt truyện ngắn của Conan Doyle được xuất bản trên tạp chí The Strand Magazine năm 1891. Các tác phẩm được viết xoay quanh thời gian từ năm 1878 đến năm 1903 với vụ án cuối cùng vào năm 1914.</p>', 'images/1744175910_SherlockHolmes.jpg'),
(10, 'Truyện Kiều', 11, 4, 29400.00, 200, '<p>Truyện Kiều còn, tiếng ta còn;</p><p>Tiếng ta còn, nước ta còn.\"</p><p>(Phạm Quỳnh)<br><br>Từ lâu, Truyện Kiều của Nguyễn Du đã hiện diện trong đời sống của dân tộc Việt Nam ta và trở thành một phần quan trọng làm nên vẻ đẹp của tâm hồn Việt, tinh hoa văn hóa Việt. Vượt qua thăng trầm lịch sử, “Truyện Kiều” đã thực sự có một đời sống phong phú và sinh động trong lòng nhân dân ta, đồng thời, với những giá trị tự thân của mình, tác phẩm dường như cũng trở thành một chiếc chìa khóa mở đường cho bè bạn quốc tế đến với nền văn hóa, văn học, nghệ thuật của dân tộc ta. Càng đọc Kiều, càng hiểu Kiều, ta càng trân trọng di sản tinh thần vô giá mà cha ông đã để lại và tin rằng: “Truyện Kiều còn, tiếng ta còn, tiếng ta còn, nước ta còn” (Phạm Quỳnh).</p><p>Nhóm hiệu khảo Bùi Kỷ &amp; Trần Trọng Kim (in và đối chiếu các bản in lần 5, 7, 8, trước 1975) để hiệu chính là cho gần được như nguyên văn, lại hết sức tìm tòi đủ các điển tích mà giải thích cho rõ ràng, để ai xem cũng hiểu, không phải ngờ điều gì nữa.</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', 'images/1744602903_TruyệnKiều.jpg'),
(11, 'Bạn Không Thông Minh Lắm Đâu (Tái Bản 2022)', 7, 5, 104250.00, 100, '<p><strong>Bạn Không Thông Minh Lắm Đâu</strong></p><p>Cho dù bạn có đang chọn mua smartphone hay đang quyết định xem nên tin theo chính trị gia nào, thì bạn cũng luôn tự cho mình là một cá thể đầy lý trí. Tất cả mọi suy nghĩ, hành động của bạn đều dựa trên những luận điểm, luận cứ rõ ràng, logic và trung lập. Nhưng đây mới là thực tế này: Bạn – Không – Thông – Minh - Lắm - Đâu. Bạn cũng chỉ là một kẻ hay tự dối mình như tất cả những người khác - nhưng đừng lo, bởi ảo tưởng là một phần của bản chất của con người.</p><p>Phát triển từ trang blog nổi tiếng của tác giả David McRaney, Bạn Không Thông Minh Lắm Đâu gợi mở cho bạn thấy nguồn gốc cho mọi quyết định, suy nghĩ, cảm xúc hóa ra lại đến từ nơi mà chẳng ai ngờ tới. Những bộ óc đã qua hàng triệu năm tiến hóa của con người đã thực hiện thành công một nhiệm vụ duy nhất: Bịa ra những câu chuyện, giả vờ là chúng ta đủ thông minh để hiểu hết mọi việc. Bạn sẽ được làm quen với những “công cụ” mà bộ não sử dụng, như Sự bất lực tự luyện, Sự bán rẻ, hay Ảo giác về sự minh bạch,… Cuốn sách giống như một tuyển tập những bài giảng Tâm lý học, với tất cả những phần nhám chán đã được lược đi.</p>', 'images/1744603004_Bạn Không Thông Minh Lắm Đâu.jpg'),
(12, 'NHÀ GIẢ KIM', 3, 6, 67150.00, 200, '<p><i>Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người</i>.&nbsp;</p><p>Tiểu thuyết&nbsp;<i>Nhà giả kim&nbsp;</i>của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia,&nbsp;<i>Nhà giả kim&nbsp;</i>đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.</p>', 'images/1744603181_nha-gia-kim.png'),
(13, 'Cây Cam Ngọt Của Tôi', 3, 7, 75600.00, 200, '<h4><strong>CÂY CAM NGỌT CỦA TÔI - MỘT TUỔI THƠ BỊ LÃNG QUÊN&nbsp;</strong></h4><p>Với một đứa trẻ, thế giới không giới hạn trong một bữa ăn, mà thế giới cần có hào quang của tình thương. Bạn có bao giờ cảm thấy bị lạc lõng trong chính ngôi nhà của mình? Một câu chuyện chạm đến tận cùng cảm xúc</p><p><strong>TÓM TẮT NỘI DUNG SÁCH</strong></p><p>Nếu tuổi thơ là một món quà, thì với Zezé, đó là một món quà có cả vị ngọt lẫn đắng.</p><p>Zezé - một cậu bé nghèo năm tuổi tại Brazil, thông minh, lém lỉnh nhưng luôn bị gia đình xem như một đứa trẻ hư. Những trò nghịch ngợm của cậu thường bị trừng phạt bằng đòn roi, nhưng ai biết rằng đằng sau đó là một trái tim khao khát yêu thương?</p><p>Người bạn duy nhất luôn lắng nghe cậu chính là cây cam ngọt nhỏ bé trong vườn, nơi cậu có thể gửi gắm những bí mật và nỗi buồn của mình. Rồi một ngày, Zezé gặp ông Portuga - một người đàn ông xa lạ nhưng lại là ánh sáng dịu dàng đầu tiên trong cuộc đời đầy bão tố của cậu bé. Ông dạy cậu về lòng nhân ái, về tình yêu thương vô điều kiện - thứ mà Zezé luôn khao khát nhưng chưa từng có được.</p><p>Nhưng rồi, số phận không cho phép Zezé giữ mãi những hạnh phúc nhỏ nhoi đó…</p><p>Cây Cam Ngọt Của Tôi không chỉ là câu chuyện của một cậu bé – đó còn là bức tranh về những nỗi đau vô hình của tuổi thơ, về sự khắc nghiệt của cuộc sống nhưng cũng đầy những tia sáng hy vọng.</p>', 'images/1745809725_cay_cam_ngot_cua_toi.jpg'),
(14, 'Đàn Ông Sao Hỏa Đàn Bà Sao Kim', 7, 8, 150400.00, 300, '<p>Cuốn sách này thực sự đã giúp đỡ cho hàng triệu độc giả, trong đó có tôi và chắc chắn cũng sẽ có bạn. Nếu không có những ý niệm mới mẻ này thì chưa chắc tôi đã có được cuộc hôn nhân hạnh phúc như hiện nay hay có thể trở thành một người cha giàu đức hy sinh đối với các con của mình như vậy. Những vướng mắc trong mối quan hệ với vợ cách đây hai mươi năm đã từng làm tôi tức điên lên, hiện giờ thi thoảng nó vẫn thường xảy ra. Nhưng điều khác biệt là tôi đã biết khoan dung hơn, chấp nhận và thấu hiểu hơn. Tôi có thể hiểu những lời lẽ và phản ứng của vợ tôi theo cách khách quan hơn, đồng thời tôi biết cách nên đáp lại như thế nào. Có thể tôi là một chuyên gia trong lĩnh vực giao tiếp và sự khác biệt về giới tính, tuy nhiên, đối với Bonnie và các cô con gái của tôi thì việc để hiều được họ vẫn còn là những bí ẩn. Dù vậy, cuốn sách này có thể giúp chúng ta trở nên khoan dung và biết tha thứ khi ai đó không đáp lại theo cách mà ta mong đợi. May mắn thay, để xây dựng những mối quan hệ bền đẹp, tính hoàn hảo không phải là điều kiện bắt buộc.</p>', 'images/1745809873_Đàn Ông Sao Hỏa Đàn Bà Sao Kim.png'),
(15, 'Mắt Biếc (Tái Bản 2019)', 4, 9, 93500.00, 200, '<h3><strong>Mắt Biếc (Tái Bản 2019)</strong></h3><p><i><strong>Mắt biếc</strong></i> là một tác phẩm được nhiều người bình chọn là hay nhất của nhà văn Nguyễn Nhật Ánh. Tác phẩm này cũng đã được dịch giả Kato Sakae dịch sang tiếng Nhật để giới thiệu với độc giả Nhật Bản.</p><p><i>“Tôi gửi tình yêu cho mùa hè, nhưng mùa hè không giữ nổi. Mùa hè chỉ biết ra hoa, phượng đỏ sân trường và tiếng ve nỉ non trong lá. Mùa hè ngây ngô, giống như tôi vậy. Nó chẳng làm được những điều tôi ký thác. Nó để Hà Lan đốt tôi, đốt rụi. Trái tim tôi cháy thành tro, rơi vãi trên đường về.”</i></p><p>… Bởi sự trong sáng của một tình cảm, bởi cái kết thúc buồn, rất buồn khi xuyên suốt câu chuyện vẫn là những điều vui, buồn lẫn lộn…&nbsp;</p>', 'images/1745810068_mat-biec_bia-mem_in-lan-thu-44.jpg'),
(16, 'Bộ Muôn Kiếp Nhân Sinh', 13, 10, 126000.00, 400, '<p><i><strong>Giáo sư John Vũ – Nguyên Phong và những câu chuyện&nbsp;chưa từng có về tiền kiếp, khám phá luật Nhân quả, Luân hồi.</strong></i></p><p><i><strong>“Muôn kiếp nhân sinh”</strong></i> là tác phẩm do Giáo sư John Vũ - Nguyên Phong viết từ năm 2017 và hoàn tất đầu năm 2020 ghi lại những câu chuyện, trải nghiệm tiền kiếp kỳ lạ từ nhiều kiếp sống của người bạn tâm giao lâu năm, ông Thomas – một nhà kinh doanh tài chính nổi tiếng ở New York. Những câu chuyện chưa từng tiết lộ này sẽ giúp mọi người trên thế giới chiêm nghiệm, khám phá các quy luật về luật Nhân quả và Luân hồi của vũ trụ giữa lúc trái đất đang gặp nhiều tai ương, biến động, khủng hoảng từng ngày.</p><p><i><strong>“Muôn kiếp nhân sinh”</strong></i> là một bức tranh lớn với vô vàn mảnh ghép cuộc đời, là một cuốn phim đồ sộ, sống động về những kiếp sống huyền bí, trải dài từ nền văn minh Atlantis hùng mạnh đến vương quốc Ai Cập cổ đại của các Pharaoh quyền uy, đến Hợp Chủng Quốc Hoa Kỳ ngày nay.</p><p><i><strong>“Muôn kiếp nhân sinh”</strong></i>cung cấp cho bạn đọc kiến thức mới mẻ, vô tận của nhân loại lần đầu được hé mở, cùng những phân tích uyên bác, tiên đoán bất ngờ về hiện tại và tương lai thế giới của những bậc hiền triết thông thái. Đời người tưởng chừng rất dài nhưng lại trôi qua rất nhanh, sinh vượng suy tử, mong manh như sóng nước. Luật nhân quả cực kỳ chính xác, chi tiết, phức tạp được thu thập qua nhiều đời, nhiều kiếp, liên hệ tương hỗ đan xen chặt chữ lẫn nhau, không ai có thể tính được tích đức này có thể trừ được nghiệp kia không, không ai có thể biết được khi nào nhân sẽ trổ quả. Nhưng, một khi đã gây ra nhân thì chắc chắn sẽ gặt quả - luật Nhân quả của vũ trụ trước giờ không bao giờ sai.</p>', 'images/1745810580_muonkiepnhansinh.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `user_id`, `book_id`, `quantity`) VALUES
(129, NULL, 2, 16, 1),
(133, NULL, 5, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(9, 'Khoa học công nghệ'),
(6, 'Sách học ngoại ngữ'),
(7, 'Self help'),
(13, 'Tâm linh'),
(5, 'Thiếu nhi'),
(3, 'Tiểu thuyết'),
(1, 'Trinh thám'),
(4, 'Truyện ngắn'),
(11, 'Văn học');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

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
(15, '2025_04_28_131452_add-infomation-on-user', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','canceled','shipping') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `name`, `email`, `note`, `session_id`, `total_price`, `status`) VALUES
(21, 2, '123, Xã Bình Kiến, Thành phố Tuy Hoà, Tỉnh Phú Yên', '0388145796', 'Cao Lương Thiện', 'thiencao.work@gmail.com', NULL, NULL, 171400.00, 'pending'),
(22, 2, 'Nhà tao, Phường Xuân Đài, Thị xã Sông Cầu, Tỉnh Phú Yên', '0388145796', 'Cao Lương Thiện', 'thiencao.work@gmail.com', NULL, NULL, 275650.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `quantity`, `price`, `total`) VALUES
(12, 21, 12, 1, 67150.00, 67150.00),
(13, 21, 11, 1, 104250.00, 104250.00),
(14, 22, 11, 2, 104250.00, 208500.00),
(15, 22, 12, 1, 67150.00, 67150.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` smallint(6) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `gender` enum('Nam','Nữ') DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `phone`, `gender`, `dateofbirth`) VALUES
(1, 'Cao Lương Thiện', 'clt12122001@gmail.com', '$2y$12$D/TkDy/sloimSj5.tMRqSujiJCe7QIbh4XzUwMIW4OhqhLU7MKJlW', 'customer', NULL, NULL, NULL),
(2, 'caoluongthien', 'thiencao.work@gmail.com', '$2y$12$JyiZbP0HZtXdQCCiq9gZ/ucOsY7mO/qtofvR1qioE11jAG.s/k9E.', 'customer', '0388145796', 'Nam', '2001-12-12'),
(4, 'Cao Lương Thiện', 'clt12221@gmail.com', '$2y$12$JxlyTZsSDUdZwyIwr565qu8yRzKYKaIEmnDBNQB/FAbmx0VBEfQ0W', 'customer', NULL, NULL, NULL),
(5, 'Admin', 'admin@gmail.com', '$2y$12$18rvIalUzaDlfAq./rB/re0237m4TqrNkPTcUplSeJ9IDeMXYAHRK', 'admin', '0388145796', 'Nam', '2025-03-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_author_id_foreign` (`author_id`),
  ADD KEY `book_category_id_foreign` (`category_id`) USING BTREE;

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_book_id_foreign` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cagetory_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_book_id_foreign` (`book_id`),
  ADD KEY `order_details_ibfk_1` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `book_cagetory_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
