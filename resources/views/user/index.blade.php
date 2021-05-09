@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
              {{-- <a class="btn button btn-outline-primary" href="/book/create">Add Book <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg></a> --}}
            <br>
            <br>
           

                    @isset($qty, $user)

                    <table class="table table-borderless bg-light table-hover" style="width: 100%">
                        <thead
                          class="text-white bg-dark"
                          style="border-radius: 25%"
                        >
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Author</th>
                            <th scope="col">Quantity</th>
                          </tr>
                        </thead>
                        <tbody class="table">
                          @foreach ($qty as $book)
                          <tr onClick="location.href='/user/{{ $book->book_name }}'">
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_genre }}</td>
                            <td>{{ $book->book_author }}</td>
                            <td>{{ $book->qty }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    @endisset
                </div>
    </div>
</div>
@endsection