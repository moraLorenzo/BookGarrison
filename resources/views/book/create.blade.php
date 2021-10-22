@extends('layouts.app')


@section('content')

    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">       
                <div class="card-header bg-black h3 font-weight-bolder text-white">Add New Book</div>
                <div class="card-body bg-black text-white font-weight-bold">
                 
                   
                        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                            @csrf
                             <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="book_name" type="text" class="form-control  @error('book_name') is-invalid @enderror" name="book_name" value="{{ old('book_name') }}"   autofocus>
    
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
                                  <input id="book_author" type="text" class="form-control  @error('book_author') is-invalid @enderror" name="book_author" value="{{ old('book_author') }}"   autofocus>

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
                                  <input id="book_genre" type="text" class="form-control  @error('book_genre') is-invalid @enderror" name="book_genre" value="{{ old('book_genre') }}"   autofocus>

                                    @error('book_genre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                            
                            </div>

                            <div class="form-group row">
                                <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Post Image')}}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img">

                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                
                            </div>
                              
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-block btn-secondary">
                                        {{ __('Submit') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection