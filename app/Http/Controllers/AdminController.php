<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Book;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->reservation_expired();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = new \Illuminate\Database\Eloquent\Collection;

        $available = Book::where('status', 'Available')->orderBy('updated_at', 'DESC')->get();
        $pending = Book::where('status', 'Pending')->orderBy('updated_at', 'DESC')->get();
        $waiting = Book::where('status', 'Waiting for Pick up')->orderBy('updated_at', 'DESC')->get();
        $borrowed = Book::where('status', 'Borrowed')->orderBy('updated_at', 'DESC')->get();

        // $books = $books->merge($waiting);
        // $books = $books->merge($pending);
        // $books = $books->merge($borrowed);
        // $books = $books->merge($available);

        // $books = Book::orderBy('updated_at', 'DESC')->get();
        // $books = Book::orderBy('status', 'DESC')->get();
        
        // dd($books);
        // return view('admin.index', compact('books'));
        return view('admin.index', compact('available','pending','waiting','borrowed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($unique)
    {
        //
        // dd($unique);

        $show = Book::get()->where('id', $unique);
        // dd($show);
        return view('admin.show', compact('show'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {
        //
        $edit = Book::find($admin);
        // dd($edit);
        return view('admin.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $book_img_backup = Book::find($id);
        // dd($book_img_backup);
        
        $request->validate([
            'book_name' => 'required|max:255',
            'book_author' => 'required',
            'book_genre' => 'required'
        ]);
        
        if($request->hasFile('book_img')){

            $filenameWithExt = $request->file('book_img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('book_img')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('book_img')->storeAs('public/img', $fileNameToStore);
        } else{
            $fileNameToStore = $book_img_backup->book_img;
        }

        $book = Book::find($id);
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        $book->book_genre = $request->book_genre;
        $book->book_img = $fileNameToStore;
        $book->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        //
        $book = Book::find($admin);
        $book->delete();

        return redirect('/admin');
    }

    public function reservation_expired(){

        $affected = DB::table('books')
            ->where('updated_at', '<=', Carbon::now()->subDays(3)->toDateString())
            ->update(['updated_at' => Carbon::now()->toDateString(),'user_id' => null, 'status' => 'Available']);

            return redirect('/admin');
        
    }
}
