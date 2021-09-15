@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="post">
                        
                        <div class="header_post d-block w-100">
                            <h2>{{$post->title}}</h2>
                            <div class="date">
                                {{date('d/m/Y',strtotime($post->date))}}
                            </div>
                            {{$post->user->name}}
                            <div class="cover d-block w-100">
                                <img class="d-block w-100" src="{{asset('storage/' . $post->image)}}" alt="post-image">

                            </div>
                        </div>
                        
                    <div class="content_post">

                        <ul>
                            @foreach ($post->tags as $tag)
                                <li>{{$tag->name}}</li>
                            @endforeach
                        </ul>
                        <p>{{$post->content}}</p>
                        
                    </div>


                    <div class="row comments">
                        <h3 class="col-md-12">Comments</h3>
                        @foreach ($post->comments as $comment )
                            <div class="comment col-md-12">
                                <p> <strong>@if ($comment->user) {{$comment->user->name}}
                                    @else User Unregistered @endif</strong>
                                    :    </p>
                                <p class="content_comment">{{$comment->content}}</p>
                            </div>
                        @endforeach
                        
                 
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
