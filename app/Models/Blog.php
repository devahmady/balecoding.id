<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'category'];
    public function scopeSearch($query)
    {
        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('isi', 'like', '%' . request('search') . '%');
        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function komentar()
    {
        return $this->hasMany(Komentar::class)->whereNull('parent_id');
    }
    public function like()
    {
        return $this->hasOne(Like::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
