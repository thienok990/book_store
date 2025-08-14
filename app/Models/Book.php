<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'author_id', 'price', 'stock', 'description', 'img', 'slug'];
    protected $table = 'book';
    public $timestamps = false;

    public function scopeIndex($query)
    {
        return $query
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->select(
                'book.id as book_id',
                'book.name',
                'book.slug',
                'book.price',
                'book.stock',
                'book.img',
                'book.description',
                'author.name as author_name',
                'category.name as category_name'
            );
    }

    public function scopeFilterSort($query, $filter)
    {
        return $query->when($filter, function ($q) use ($filter) {
            switch ($filter) {
                case 'price_asc':
                    $q->orderBy('book.price', 'asc');
                    break;
                case 'price_desc':
                    $q->orderBy('book.price', 'desc');
                    break;
                case 'name_asc':
                    $q->orderBy('book.name', 'asc');
                    break;
                case 'name_desc':
                    $q->orderBy('book.name', 'desc');
                    break;
            }
        });
    }

    public function scopeFilterSearch($query, $search)
    {
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('book.name', 'like', "%$search%")
                    ->orWhere('author.name', 'like', "%$search%")
                    ->orWhere('category.name', 'like', "%$search%");
            });
        }
        return $query;
    }

    public function scopeFilterPrice($query, $min, $max)
    {
        if ($min && $max) {
            $query->whereBetween('book.price', [$min, $max]);
        } elseif ($min) {
            $query->where('book.price', '>=', $min);
        } elseif ($max) {
            $query->where('book.price', '<=', $max);
        }
        return $query;
    }

    public function scopeFilterAuthor($query, $authorId)
    {
        if ($authorId) {
            $query->where('book.author_id', $authorId);
        }
        return $query;
    }

    public function scopeFilterCategory($query, $categoryId)
    {
        if ($categoryId) {
            $query->where('book.category_id', $categoryId);
        }
        return $query;
    }
}
