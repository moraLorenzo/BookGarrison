@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <br>
                    @isset($books)
                          @foreach ($books as $book)
                          <div class="card mx-auto" style="width: 24rem;margin-bottom: 10%;">
                            <img class="card-img-top" src="{{ asset('/storage/img/'.$book->book_img) }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $book->book_name }}</h5>
                              <p class="card-text">{{ $book->book_author }}</p>
                            </div>
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">{{ $book->book_genre }}</li>
                                  <li class="list-group-item">{{ $book->status }}</li>
                                  @if($book->status != "Borrowed")
                                    <li class="list-group-item">
                                      <form method="POST" action="{{ route('user.cancel', ['id'=>$book->id,'status'=>'Available']) }}" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                      </form>
                                    </li>
                                  @endif
                                </ul>
                            <div class="card-body"></div>
                        </div>
                          @endforeach
                    @endisset
          </div>
    </div>
</div>
@endsection