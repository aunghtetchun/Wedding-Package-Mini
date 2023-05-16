@extends('dashboard.app')

@section("title") Blog Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Blog" => "#",
        "Blog" => "#"
    ]])
        @slot("last") See Blog @endslot
    @endcomponent

    <div class="row">
        <div class="col-7">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Blog @endslot
                @slot('button')
                        <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-list fa-fw"></i>
                        </a>
                @endslot
                @slot('body')
                        <h5>{{ $blog->title }} ( <small>{{ $blog->getCategory->title }}</small> )</h5>
                        <hr/>
                        <div>{!! $blog->description !!} </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

