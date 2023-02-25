<?php

namespace App\Models;

class Blog
{
    static $data = [
        [
            'judul' => 'ini judul pertama',
            'slug' => 'ini-judul-pertama',
            'author' => 'ahmad yusuf',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi maxime expedita, harum consequatur asperiores porro. Modi, odit quibusdam accusamus, voluptatum praesentium tempore labore nulla voluptates eligendi odio animi quos. Velit, et dolore. Saepe necessitatibus vero iure cupiditate ratione quasi enim eligendi, fuga adipisci dolore, sint dignissimos expedita voluptatem animi nihil.'

        ],
        [
            'judul' => 'ini judul kedua',
            'slug' => 'ini-judul-kedua',
            'author' => 'ahmad yusuf',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi maxime expedita, harum consequatur asperiores porro. Modi, odit quibusdam accusamus, voluptatum praesentium tempore labore nulla voluptates eligendi odio animi quos. Velit, et dolore. Saepe necessitatibus vero iure cupiditate ratione quasi enim eligendi, fuga adipisci dolore, sint dignissimos expedita voluptatem animi nihil.'

        ],
    ];

    public static function all()
    {
        return collect(self::$data);
    }
    public static function find($slug)
    {
        $data = static::all();
        return $data->firstWhere('slug', $slug);
    }
}
