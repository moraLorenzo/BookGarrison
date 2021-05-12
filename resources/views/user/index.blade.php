@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <br>
                    @isset($qty, $user, $collection)
                    <form method="GET" action="{{ route('user.check_requested', ['id'=>$user->id]) }}" enctype="multipart/form-data">
                      @csrf
                      <button type="submit" class="btn btn-success">Show Requested</button>
                    </form>
                    <br>


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
                            <th scope="col">Poster</th>
                          </tr>
                        </thead>
                        <tbody class="table">
                          @foreach ($qty as $book)
                          <tr onClick="location.href='/user/{{ $book->book_name }}'">
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_genre }}</td>
                            <td>{{ $book->book_author }}</td>
                            <td>{{ $book->qty }}</td>
                            <td><img style="width:100px; height:150px;" src="{{ asset('/storage/img/'.$collection[$loop->index]) }}" alt="No image found"></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      {{-- Kung trip niyo naka-grid, uncomment niyo tong nasa baba.
                      Tapos comment niyo yung table --}}

                      {{-- @foreach($qty->chunk(3) as $books)
                      <div class="row mt-3">
                        @foreach($books as $book)
                        <div class="col-md-4 portfolio-item" onClick="location.href='/user/{{ $book->book_name }}'">
                            <div class="card mx-auto">
                              <div class="card-body">
                                <h5 class="card-title">{{ $book->book_name }}</h5>
                                <p class="card-text">{{ $book->book_author }}</p>
                              </div>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Genre: {{ $book->book_genre }}</li>
                                    <li class="list-group-item">Quantity: {{ $book->qty }}</li>   
                                  </ul>
                              <div class="card-body"></div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      @endforeach --}}

                    @endisset
                </div>
    </div>
</div>
@endsection