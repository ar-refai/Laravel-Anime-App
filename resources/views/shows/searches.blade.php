@extends('layouts.app')
@section('content')
@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href={{route('home')}}><i class="fa fa-home"></i> Home</a>
                        <span>Search</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Your Results:</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            @if ($searches->count() > 0)

                            @foreach ($searches as $show)

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
                            @else
                            <div class="alert alert-success">No shows were found!</div>
                            @endif

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                        </div>
                    <!-- </div>
                </div>         -->
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>Trending</h5>
        </div>
        @foreach ($forYouShows as $show)
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="{{asset('assets/'.$show->image)}}" style="height: 200px;width:100%;" alt="">
            </div>
            <br>
            <div class="product__sidebar__comment__item__text clearfix">
                <h5><a href="{{route('anime-details',$show->id)}}">{{$show->name}}</a></h5>
                <span><i class="fa fa-eye"></i> {{$show->duration}}s</span>
                <ul>
                    <li>{{$show->genre}}</li>
                    <li>{{$show->type}}</li>
                    <li>{{$show->status}}</li>

                </ul>
            </div>
        </div>
        @endforeach


    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Product Section End -->


@endsection

@endsection
