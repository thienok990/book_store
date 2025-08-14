<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Thơ',
            'Tản văn',
            'Văn học cổ điển',
            'Công nghệ thông tin',
            'Khoa học tự nhiên',
            'Toán học',
            'Kinh tế học',
            'Quản trị kinh doanh',
            'Marketing',
            'Khởi nghiệp',
            'Tài chính – Đầu tư',
            'Phát triển bản thân',
            'Tâm lý học ứng dụng',
            'Giao tiếp – Ứng xử',
            'Truyện tranh',
            'Sách tô màu',
            'Truyện cổ tích',
            'Lịch sử Việt Nam',
            'Lịch sử thế giới',
            'Chính trị – Pháp luật',
            'Văn hóa – Xã hội',
            'Sách học tiếng Anh',
            'Từ điển Anh – Việt',
            'Sách giáo khoa',
            'Sách tham khảo',
            'Y học – Sức khỏe',
            'Âm nhạc',
            'Hội họa',
            'Nhiếp ảnh',
            'Điện ảnh'
        ];

        foreach ($categories as $name) {
            DB::table('category')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
