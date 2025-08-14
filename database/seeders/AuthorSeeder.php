<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $authors = [
            'Nguyễn Nhật Ánh',
            'Nam Cao',
            'Tô Hoài',
            'Nguyễn Du',
            'Xuân Quỳnh',
            'Arthur Conan Doyle',
            'Agatha Christie',
            'J.K. Rowling',
            'George Orwell',
            'Haruki Murakami',
            'Ernest Hemingway',
            'F. Scott Fitzgerald',
            'Mark Twain',
            'Jane Austen',
            'Leo Tolstoy',
            'Charles Dickens',
            'Victor Hugo',
            'Gabriel García Márquez',
            'Paulo Coelho',
            'Stephen King'
        ];

        foreach ($authors as $name) {
            DB::table('author')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
