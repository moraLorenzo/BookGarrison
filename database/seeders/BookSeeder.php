<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = [
            [
               'book_name'=>'Harry Potter and the Philosopher\'s Stone',
               'book_genre'=>'Fantasy Fiction',
               'book_author'=>'J. K. Rowling',
               'book_img'=>'harry_potter(1).jpg',
               'status'=>'Available',
            ],
            [
                'book_name'=>'Harry Potter and the Chamber of Secrets',
                'book_genre'=>'Fantasy Fiction',
                'book_author'=>'J. K. Rowling',
                'book_img'=>'harry_potter(2).jpg',
                'status'=>'Available',

            ],
            [
                'book_name'=>'Harry Potter and the Prisoner of Azkaban',
                'book_genre'=>'Fantasy Fiction',
                'book_author'=>'J. K. Rowling',
                'book_img'=>'harry_potter(3).jpg',
                'status'=>'Available',
            ],
            [
                'book_name'=>'Harry Potter and the Goblet of Fire',
                'book_genre'=>'Fantasy Fiction',
                'book_author'=>'J. K. Rowling',
                'book_img'=>'harry_potter(4).jpg',
                'status'=>'Available',
            ],
            [
                'book_name'=>'Harry Potter and the Order of the Phoenix',
                'book_genre'=>'Fantasy Fiction',
                'book_author'=>'J. K. Rowling',
                'book_img'=>'harry_potter(5).jpg',
                'status'=>'Available',
            ],
            [
                'book_name'=>'Harry Potter and the Half-Blood Prince',
                'book_genre'=>'Fantasy Fiction',
                'book_author'=>'J. K. Rowling',
                'book_img'=>'harry_potter(6).jpg',
                'status'=>'Available',
            ],
            [
                'book_name'=>'Harry Potter and the Deathly Hallows',
                'book_genre'=>'Fantasy Fiction',
                'book_author'=>'J. K. Rowling',
                'book_img'=>'harry_potter(7).jpg',
                'status'=>'Available',
            ],
        ];
  
        foreach ($book as $key => $value) {
            Book::create($value);
        }
    }
}
