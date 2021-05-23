<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $collection = collect([]);
        $user = Auth::user();
        $qty =   Book::select('book_name', 'book_genre', 'book_author')
        ->selectRaw('count(book_name) as qty')
        ->groupBy('book_name', 'book_genre', 'book_author')
        ->orderBy('qty', 'DESC')
        ->get();

        for($i = 0;$i<$qty->count();$i++)
            {
                // $collection = $qty[$i]->book_name;
                $result = Book::select('book_img')->where('book_name', $qty[$i]->book_name)->take(1)->get();
                 $collection->push(                     
                    $result[0]->book_img
                    );
            }
        // dd($collection);

    return view('user.index', compact('qty','user','collection'));
        
        
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($unique)
    {
        //

        $show = Book::get()->where('book_name', $unique);
        // dd($show);
        $you = Auth::user();
        $users = User::all();
        // dd($users);
        return view('user.show', compact('show','you','users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $you = Auth::user();
        // dd($id, $you);
        $book = Book::find($id);
        $book->status = 'Pending';
        $book->user_id = $you->id;
        $book->save();

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function check_requested($id)
    {
        $user = User::find(Auth::id());
        $books = $user->posts()->where('book_name','!=','')->get();
        // dd($books);
        return view('user.select', compact('books'));
    }

    public function cancel($id, $status){
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

        

        return redirect('/user');
    }
}
