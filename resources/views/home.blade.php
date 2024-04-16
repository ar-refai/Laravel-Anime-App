@extends('layouts.app')

@section('content')
<div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            @foreach ($shows as $show)
            <div class="hero__slider owl-carousel ">
                <div class="hero__items set-bg  position-relative" data-setbg="{{asset('assets/' . $show->image)}}">
                    <div class="overlay"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">{{$show->genre}}</div>
                                <h2>{{$show->name}}</h2>
                                <p>{{$show->description}}</p>
                                <a href="{{route('anime-details',$show->id)}}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($trendShows as $trend)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/' . $trend->image)}}">
                                        <div class="ep">{{$trend->genre}}</div>
                                        <div class="comment"><i class="fa fa-film" aria-hidden="true"></i> {{$trend->type}}</div>
                                        <div class="view"><i class="fa fa-clock-o" aria-hidden="true"></i>      {{$trend->duration}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$trend->status}}</li>
                                            <li>{{$trend->genre}}</li>
                                        </ul>
                                        <h5><a href="{{route('anime-details',$trend->id)}}">{{$trend->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Adventure Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($adventureShows as $show)

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/' . $show->image)}}">
                                        <div class="ep">{{$show->genre}}</div>
                                        <div class="comment"><i class="fa fa-film" aria-hidden="true"></i> {{$show->type}}</div>
                                        <div class="view"><i class="fa fa-clock-o" aria-hidden="true"></i>      {{$show->duration}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$show->status}}</li>
                                            <li>{{$show->genre}}</li>
                                        </ul>
                                        <h5><a href="{{route('anime-details',$show->id)}}">{{$show->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Recently Added Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($recentShows as $show)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/' . $show->image)}}">
                                        <div class="ep">{{$show->genre}}</div>
                                        <div class="comment"><i class="fa fa-film" aria-hidden="true"></i> {{$show->type}}</div>
                                        <div class="view"><i class="fa fa-clock-o" aria-hidden="true"></i>      {{$show->duration}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$show->status}}</li>
                                            <li>{{$show->genre}}</li>
                                        </ul>
                                        <h5><a href="{{route('anime-details',$show->id)}}">{{$show->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="live__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Live Action</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($actionShows as $show)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/' . $show->image)}}">
                                        <div class="ep">{{$show->genre}}</div>
                                        <div class="comment"><i class="fa fa-film" aria-hidden="true"></i> {{$show->type}}</div>
                                        <div class="view"><i class="fa fa-clock-o" aria-hidden="true"></i>      {{$show->duration}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$show->status}}</li>
                                            <li>{{$show->genre}}</li>
                                        </ul>
                                        <h5><a href="{{route('anime-details',$show->id)}}">{{$show->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
        </div>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>For You</h5>
        </div>
        @foreach ($forYouShows as $show)
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="{{asset('assets/'.$show->image)}}" alt="">
            </div>
            <br>
            <div class="product__sidebar__comment__item__text clearfix">
                <h5><a href="{{route('anime-details',$show->id)}}">{{$show->name}}</a></h5>
                <ul>
                    <li>{{$show->type}}</li>
                    <li>{{$show->genre}}</li>
                    <li>{{$show->status}}</li>

                </ul>
                <span><i class="fa fa-eye"></i> {{$show->duration}}s</span>
            </div>
        </div>
        @endforeach

    </div>

</section>
<!-- Product Section End -->
</div>


@endsection
