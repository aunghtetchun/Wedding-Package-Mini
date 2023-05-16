@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection
@section('head')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-wrap justify-content-between mt-5 align-items-start">
            <div class="col-12 col-md-3">
                <nav class="nav nav-pills  flex-column ">
                    <a class="nav-link border mb-2" href="{{ route('blog.blogList') }}">All</a>
                    @foreach($categories as $cat)
                        <a class="nav-link mb-2 border" href="{{ route('blog.blogList-filter',$cat->id) }}">{{ $cat->title }}</a>
                    @endforeach
                </nav>
            </div>
            <div class="col-12 col-md-9 ">
                @if(count($blogs)!==1)
                    @foreach($blogs as $b)
                        <div class="card mb-3" >
                            <div class="card-body">
                                <p class="font-weight-bold card-title" style="font-size: 18px">{{ $b->title }}</p>
                                <hr/>
                                <p class="card-text">
                                    {{\App\Custom::toShort(strip_tags(html_entity_decode($b->description)),250) }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-black-50"><i class="fas fa-calendar-alt fa-fw"></i> {{ $b->created_at->format('d M Y') }}</p>
                                    <a href="{{ route('blog.single-blog-list',$b->id) }}" class="btn btn-outline-primary px-2 px-lg-4 px-md-4">See More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($blogs as $b)
                        <div class="card mb-3" >
                            <div class="card-body">
                                <p class="font-weight-bold card-title" style="font-size: 18px">{{ $b->title }}</p>
                                <hr/>
                                <p class="card-text">
                                    {!! $b->description !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </div>
</div>
@endsection
