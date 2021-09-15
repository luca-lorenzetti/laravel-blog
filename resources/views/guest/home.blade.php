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
                    
                    {{-- Last Posts --}}
                    <div class="last_posts">
                        
                        {{-- Carousel --}}
                        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">

                                @foreach ($lastPosts as $key => $post)
                                    <li data-target="#carouselIndicators" data-slide-to="{{$key}}" class="{{$key == 0 ?'active' : ''}}"></li> 
                                @endforeach
        
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($lastPosts as $key => $post)
                                
                                <div class="carousel-item {{$key == 0 ?'active' : ''}}">
                                    <a class="overlay" href="{{route('guest.posts.show', ['slug' => $post->slug])}}">
                                    </a>
                                    <div class="header_post">
                                        <h2>{{$post->title}}</h2>
                                        <div class="date">
                                            {{date('d/m/Y',strtotime($post->date))}}
                                        </div>
                                        {{$post->user->name}}
                                        <div class="excerpt">
                                            {{Str::limit($post->content, 150)}}
                                        </div>

                                    </div>
                                    <img class="d-block w-100" src="{{asset('storage/' . $post->image)}}" alt="{{$key}}-slide">
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
                        {{-- /Carousel --}}
                    </div>
                    {{-- /Last Posts --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center all_posts">
        <div class="col-md-8">
        @foreach ($allPosts as $post)
            <h3><a href="{{route('guest.posts.show', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
        @endforeach
        </div> 
    </div> 
    {{-- Pagination  --}}
    <div class="row justify-content-center">
        {{$allPosts->links()}} 
    </div> 
</div>
@endsection
