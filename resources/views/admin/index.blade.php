@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-10">
              <a class="btn button btn-outline-primary" href="/book/create">Add Book <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg></a>
            <br>
            <br>
           

                    @isset($books)

                    <table class="table table-borderless bg-light table-hover" style="width: 100%">
                        <thead
                          class="text-white bg-dark"
                          style="border-radius: 25%"
                        >
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Status</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Poster</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="table">
                          @foreach ($books as $book)
                          <tr onClick="location.href='/admin/{{ $book->id }}'">
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_genre }}</td>
                            <td>{{ $book->status }}</td>
                            <td>{{ $book->user_id }}</td>
                            <td><img style="width:100px; height:150px;" src="{{ asset('/storage/img/'.$book->book_img) }}" alt="No image found"></td>
                            <td>
                              
                                  @if ($book->status == "Pending")

                                  <form method="POST" action="{{ route('book.update_status', ['id'=>$book->id,'status'=>'Waiting for Pick up']) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                      <button type="submit" class="btn btn-success">Accept</button>
                                  </form>

                                  @elseif ($book->status == "Waiting for Pick up")
                                    
                                  <form method="POST" action="{{ route('book.update_status', ['id'=>$book->id,'status'=>'Borrowed']) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="btn btn-success">Picked up</button>
                                  </form>
                                    
                                  
                                  @elseif ($book->status == "Borrowed")
                                    
                                    <form method="POST" action="{{ route('book.update_status', ['id'=>$book->id,'status'=>'Available']) }}" enctype="multipart/form-data">
                                      @method('PATCH')
                                      @csrf
                                      <button type="submit" class="btn btn-success">Returned</button>
                                    </form>
                                  
                                  @endif
                            
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    @endisset
                </div>
    </div>
</div>
@endsection