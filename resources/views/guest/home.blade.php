@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
     
                    <div class="search_bar">
                        <input type="text" name="search" id="search">
                    </div>
                    
                    <div class="last_posts">
            
                        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                                @foreach ($lastPosts as $key => $post)
                                    <li data-target="#carouselIndicators" data-slide-to="{{$key}}" class="{{$key == 0 ?'active' : ''}}"></li> 
                                @endforeach
                              
        
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($lastPosts as $key => $post)
                                <div class="carousel-item {{$key == 0 ?'active' : ''}}">
                                    <h2>{{$post->title}}</h2>
                                    <img class="d-block w-100" src="{{asset( asset('storage/' . $post->image))}}" alt="{{$key}}-slide">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
