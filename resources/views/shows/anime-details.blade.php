@extends('layouts.app')

@section('content')
    <div class="anime-details-section">
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                            <span>{{$anime->genre}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Anime Section Begin -->
        <section class="anime-details spad">
            <div class="container">
                <div class="anime__details__content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="anime__details__pic set-bg" data-setbg="{{asset("assets/" . $anime->image)}}">
                                <div class="comment"><i class="fa fa-comments"></i> {{$commentsNumber}}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{$viewsCount}}</div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="anime__details__text">
                                <div class="anime__details__title">
                                    <h3>{{$anime->name}}</h3>
                                </div>

                                <p>{{$anime->desc}}</p>
                                <div class="anime__details__widget">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <ul>
                                                <li><span>Type:</span> {{$anime->type}}</li>
                                                <li><span>Studios:</span> {{$anime->studios}}</li>
                                                <li><span>Date aired:</span> {{$anime->date_aired}}</li>
                                                <li><span>Status:</span> {{$anime->status}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul>
                                                <li><span>Genre:</span> {{$anime->genre}}</li>

                                                <li><span>Duration:</span> {{$anime->duration}}</li>
                                                <li><span>Quality:</span> {{$anime->quality}}</li>
                                                <li><span>Views:</span> {{$viewsCount}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="anime__details__btn">
                                    <form action="{{route('follow',$anime->id)}}" method="POST">
                                        @csrf
                                        @if ($validateFollowing > 0)
                                        {{-- FOLLOW --}}
                                        <button class="follow-btn"><i class="fa fa-heart" aria-hidden="true"></i> Unfollow</button>
                                        @else
                                        {{-- UNFOLLOW --}}
                                        <button type="submit" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</button>
                                        @endif
                                        {{-- WATCH ANIME --}}
                                        <a href="{{route('episode', ['show_id'=> $anime->id,'episode_id'=> 1])}}" class="watch-btn">
                                            <span>Watch Now</span>
                                            <i  class="fa fa-angle-right"></i>
                                        </a>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            @foreach ($comments as $comment)

                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{asset("assets/" . $anime->image)}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{
                                        $comment->user->name
                                        }} - <span>{{$comment->created_at}}</span></h6>
                                    <p>{{$comment->content}}</p>
                                    </div>
                                </div>
                                @endforeach

                        </div>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form action="{{route('comment' , $anime->id)}}" method="POST">
                                @csrf
                                <textarea name="content" placeholder="Your Comment"></textarea>
                                <button type="submit"><i class="fa fa-location-arrow"></i> Comment </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>you might like...</h5>
                            </div>
                            @foreach ($randomShows as $show)

                            <div class="product__sidebar__view__item set-bg position-relative" data-setbg="{{asset('assets/' . $show->image)}}" style="height: 200px;width:100%;">
                                <div class="overlay"></div>
                                    <div style="z-index: 1" class="ep">{{$show->genre}}</div>
                                    <div style="z-index: 1" class="view"><i class="fa fa-eye"></i> {{$commentsNumber}}</div>
                                    <h5 style="z-index: 1"><a href="{{route('anime-details',$show->id)}}">{{$show->name}}</a></h5>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->
    </div>
@endsection
