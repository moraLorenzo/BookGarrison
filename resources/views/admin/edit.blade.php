@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
              {{-- <a class="btn button btn-success" href="/book/create">Add Book <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg></a> --}}
            <br>
            <br>
           

                    @isset($edit)
                    
                    <form method="POST" action="{{ route('admin.update', $edit->id) }}" enctype="multipart/form-data">
                      @method('PATCH')
                      @csrf
                       <div class="form-group row">
                          <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="book_name" type="text" class="form-control  @error('book_name') is-invalid @enderror" name="book_name" value="{{ $edit->book_name }}"   autofocus>

                              @error('book_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                          <div class="col-md-6">
                            <input id="book_author" type="text" class="form-control  @error('book_author') is-invalid @enderror" name="book_author" value="{{ $edit->book_author}}"   autofocus>

                              @error('book_author')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>                            
                      </div>

                      

                      <div class="form-group row">
                          <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                          <div class="col-md-6">
                            <input id="book_genre" type="text" class="form-control  @error('book_genre') is-invalid @enderror" name="book_genre" value="{{ $edit->book_genre }}"   autofocus>

                              @error('book_genre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>                            
                      </div>

                      <div class="form-group row">

                          <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Book Image')}}</label>
                          <div class="col-md-6">
                              <input type="file" class="form-control-file @error('book_img') is-invalid @enderror" name="book_img" value="{{ $edit->book_img }}">

                              @error('book_img')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>                                
                      </div>
                        
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-block btn-outline-primary">
                                  {{ __('Submit') }}
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                                      <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                  </svg>
                              </button>
                          </div>
                      </div>
                  </form>



                    @endisset

                    

                    
                </div>
    </div>
</div>
@endsection