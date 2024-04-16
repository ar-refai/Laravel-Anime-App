@extends('layouts.app')

@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{route('category',$show->genre)}}">{{$show->genre}}</a>
                        <span>{{$show->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        @if(!$episode)
                        <div class="alert alert-danger">
                            <p>No episode found for this show.</p>
                        </div>
                        @else
                        <video id="player" playsinline controls data-poster="{{asset('assets/videos/'. $episode->thumbnail_url) }}">
                            <source src="{{asset('assets/videos/'. $episode->video_url)}}" type="video/mp4" />
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                        @endif
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Episodes List</h5>
                        </div>
                        @foreach ($episodes as $ep)
                        <a href="{{route('episode',['show_id'=> $show->id ,'episode_id'=>$ep->id])}}">Ep {{$ep->episode_title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comments</h5>
                        </div>
                        @foreach ($comments as $comment)
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{asset('assets/'.$show->image)}}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>{{$comment->user->name}} - <span>{{$comment->created_at}}</span></h6>
                                <p>{{$comment->content}}</p>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{route('comment' , $show->id)}}" method="POST">
                            @csrf
                            <textarea name="content" placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Comment </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

@endsection
