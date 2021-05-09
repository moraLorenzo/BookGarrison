<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();
        return view('admin.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Navigate to create.blade.php

        return view('book.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //   Fetching requests and posting it on the db
          $request->validate([
            'book_name' => 'required|max:255',
            'book_author' => 'required',
            'book_genre' => 'required',
            'book_img' => 'required'
        ]);
        
        if($request->hasFile('img')){

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        } else{
            $fileNameToStore = '';
        }

        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        $book->book_genre = $request->book_genre;
        $book->book_img = $fileNameToStore;
        $book->save();

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_status($id, $status){
        // dd($id, $status);
        if($status == "Available"){
            $book = Book::find($id);
            $book->status = $status;
            $book->user_id = null;
            $book->save();
        }
        else{
            $book = Book::find($id);
            $book->status = $status;
            $book->save();
        }

        

        return redirect('/book');
    }
}
