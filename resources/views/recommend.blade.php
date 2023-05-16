@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection
@section('head')
    <style>
        @media (min-width: 34em) {
            .card-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }

        @media (min-width: 48em) {
            .card-columns {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
            }
        }

        @media (min-width: 62em) {
            .card-columns {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3;
            }
        }

        @media (min-width: 75em) {
            .card-columns {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center w-100 mt-5">Recommend List</h1>
            <div class="card-columns my-5">
                @foreach(\App\Recommend::latest()->limit(9)->get() as $rec)
                <div class="card my-2 mx-3" >
                    <div class="card-title pt-3  pl-3">
                        <h5>
                            {{ $rec->getWeddingPackage->title }}
                        </h5>
                    </div>
                    <div id="carouselExampleIndicators{{ $rec->id }}" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($rec->getWeddingPackage->getPhoto as $i => $banner)
                                <li data-target="#carouselExampleIndicators{{$rec->id}}" data-slide-to="{{$i}}" {{ !$i ? ' class="active"' : '' }}></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($rec->getWeddingPackage->getPhoto as $photo)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/wedding_package/".$photo->name) }}">
                                        <img class="d-block w-100" src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" >
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $rec->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators{{ $rec->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $rec->name }}</h5>
                        <p class="card-text">
                            {{ $rec->text }}
                        </p>
                        <div class="">
                            @for($i=1; $i<=5; $i++)
                                @if($i<=floor(collect($rec->rating)->avg()) )
                                    <i class="fas fa-star fa-fw"></i>
                                @else
                                    <i class="far fa-star fa-fw"></i>
                                @endif
                            @endfor
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
