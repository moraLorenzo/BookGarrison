@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <br>

                    @isset($show,$you)

                    {{-- <table class="table table-borderless bg-light table-hover" style="width: 100%">
                        <thead
                          class="text-white bg-dark"
                          style="border-radius: 25%"
                        >
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Poster</th>
                          </tr>
                        </thead>
                        <tbody class="table"> --}}
                          @foreach ($show as $book)
                          {{-- <tr onClick="location.href='/user/{{ $book->id }}'">
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_genre }}</td>
                            <td>{{ $book->book_author }}</td>
                            <td>{{ $book->book_author }}</td>
                            <td><img style="width:100px; height:150px;" src="{{ asset('/storage/img/'.$book->book_img) }}" alt="No image found"></td>
                          </tr> --}}
                          <div class="card mx-auto" style="width: 24rem;margin-bottom: 10%;" onClick="location.href='/reservation/{{ $book->id }}'">
                            <img class="card-img-top" src="{{ asset('/storage/img/'.$book->book_img) }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $book->book_name }}</h5>
                              <p class="card-text">{{ $book->book_author }}</p>
                            </div>
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">{{ $book->book_genre }}</li>
                                  <li class="list-group-item">{{ $book->status }}</li>
                                  @if($you->id == $book->user_id)
                                  <li class="list-group-item">You requested for this</li>
                                  @endif
                                </ul>
                            <div class="card-body">

                            </div>
                          </div>
                          @endforeach
                        {{-- </tbody>
                      </table> --}}

                    @endisset
                </div>
    </div>
</div>
@endsection