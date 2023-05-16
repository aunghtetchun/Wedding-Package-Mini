@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection
@section('head')
    <style>

    </style>
    @endsection
@section('content')
<div class="container">
    <div class="row">
        <h2 class="col-12 text-center my-5">Our Packages</h2>
        <div class="col-12 card-deck">
            @foreach($weddingPackages as $wp)
            <div class="col-12 col-md-4 p-0">
                <div class="card mb-4 pa_card">
                    <div id="carouselExampleIndicators{{ $wp->id }}" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($wp->getPhoto as $i => $banner)
                                <li data-target="#carouselExampleIndicators{{$wp->id}}" data-slide-to="{{$i}}" {{ !$i ? ' class="active"' : '' }}></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($wp->getPhoto as $photo)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/wedding_package/".$photo->name) }}">
                                        <img class="d-block w-100" src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" style="height: 170px">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $wp->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators{{ $wp->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $wp->title }} <small>( {{ $wp->price }} Ks )</small></h5>
                        <p class="card-text">
                            {{\App\Custom::toShort(strip_tags(html_entity_decode($wp->description)),38) }}
                        </p>
                        <div class="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example{{ $wp->id }}Modal">
                                        See More
                                    </button>

                                    <span class="rat" data-toggle="modal" data-target="#exampleModal{{ $wp->id }}">
                                    @for($i=1; $i<=5; $i++)
                                            @if($i<=floor(collect($wp->getRecommend->pluck('rating'))->avg()) )
                                                <i class="fas fa-star fa-fw"></i>
                                            @else
                                                <i class="far fa-star fa-fw"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </div>
{{--                            <div class="col-12 text-right">--}}
{{--                                @isset($wp->getRecommend)--}}
{{--                                {{ floor(collect($wp->getRecommend->pluck('rating'))->avg())  }}--}}
{{--                                @endisset--}}
{{--                            </div>--}}
                            {{--                                See More Modal start                            --}}
                            <div class="modal fade" id="example{{ $wp->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="example{{ $wp->id }}ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="example{{ $wp->id }}ModalLabel">{{ $wp->title }} <small> ( {{ $wp->price }} Ks )</small></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="carouselExample{{$wp->id}}Indicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @foreach ($wp->getPhoto as $i => $banner)
                                                        <li data-target="#carouselExample{{$wp->id}}Indicators" data-slide-to="{{$i}}" {{ !$i ? ' class="active"' : '' }}></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach($wp->getPhoto as $photo)
                                                        <div class="carousel-item @if ($loop->first) active @endif">
                                                            <img class="d-block w-100" src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" >
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExample{{$wp->id}}Indicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExample{{$wp->id}}Indicators" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div>
                                                <p>{!! $wp->description !!} </p>
                                                <table class="table table-hover mt-3 mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Cost</th>
                                                        {{--                                    <th scope="col">Control</th>--}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($wp->getPackageDetail as $pd)
                                                        <tr>
                                                            <td>{{ $pd->id }}</td>
                                                            <td>{{ $pd->title }}</td>
                                                            <td>{{ $pd->cost }} Ks</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="2" class="text-center"><b>Total </b></td>
                                                        <td >
                                                            {{ $wp->getPackageDetail->sum('cost') }} Ks
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                                            <a href="{{route('order.orderPackage',$wp->id)}}" class="btn btn-primary">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                                See More Modal end                            --}}
{{--                                Rating Modal start                            --}}
                            <div class="modal fade" id="exampleModal{{ $wp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{ $wp->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal{{ $wp->id }}Label">Recommend This Package</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('recommendPackage.storeRecommend') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Your Name</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Your Name">
                                                    @error('name')
                                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <label for="stars">Rating</label>
                                                <div class="form-group mb-0">
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="stars" value="1" />
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="2" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="3" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="4" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="5" />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                    </div>
                                                    @error('stars')
                                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Your Recommend</label>
                                                    <textarea class="form-control @error('street') is-invalid @enderror" rows="7" name="text" id="text">{{old('text')}}</textarea>
                                                    @error('text')
                                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <input type="hidden" value="{{$wp->id}}" name="wedding_package_id">
                                                <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Recommend</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                                Rating Modal end                            --}}

                        </div>

                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
    @endsection
@section('foot')
    <script>

    </script>
@endsection




