📚 Dự Án Web Bán Sách - Laravel

Đây là một ứng dụng web bán sách đơn giản được xây dựng bằng Laravel. Dự án hỗ trợ quản lý sách, tác giả, thể loại và đơn hàng – thích hợp cho mục đích học tập hoặc triển khai nhỏ.

🧰 Yêu cầu hệ thống

PHP >= 8.1

Composer

Laravel >= 10.x

MySQL

Node.js & npm (nếu dùng Laravel Mix hoặc Vite)

🚀 Cài đặt

git clone https://github.com/thienok990/book_store
cd bookstore-laravel
composer install
cp .env.example .env
php artisan key:generate

Chỉnh sửa file .env để kết nối với cơ sở dữ liệu:

DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

Sau đó chạy:

php artisan migrate --seed
npm install
npm run dev
php artisan serve

Truy cập: http://localhost:8000

🗃 Cấu trúc chức năng

📖 Quản lý sách

🕓 Quản lý tác giả

🏷 Quản lý thể loại

🛒 Giỏ hàng và đặt hàng

🔐 Đăng nhập/Đăng ký người dùng

🛠 Phân quyền (admin / khách)

🧪 Tài khoản demo (nếu có seed dữ liệu)

Email: admin@gmail.com
Mật khẩu: admin

🗂 File database (tùy chọn)

Nếu bạn không muốn chạy migrate & seed:

mysql -u root -p your_database < database/database.sql
🔑 Hướng dẫn sử dụng ảnh
Nếu bạn sử dụng ảnh trong ứng dụng, các ảnh sẽ được lưu trong thư mục storage/app/public và được truy cập qua đường dẫn public/storage. Để đảm bảo ảnh hiển thị đúng sau khi clone repository, bạn cần tạo symlink.
php artisan storage:link

Tạo symlink cho ảnh
Sau khi clone repository và cài đặt dự án, hãy thực hiện các bước sau để tạo symlink cho ảnh:

🤝 Góp ý & liên hệ

Nếu bạn có đóng góp hoặc ý tưởng, hãy tạo pull request hoặc issue mới.

📄 License

This project is open-source and free to use under the MIT license.

