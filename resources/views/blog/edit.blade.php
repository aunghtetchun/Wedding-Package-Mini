@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Blog" => route("blog.index"),
    ]])
        @slot("last") Edit Blog @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Blog @endslot
                @slot('button')
                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $blog->title }}" placeholder="Title">
                                @error('title')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected disabled>Select Category</option>
                                    @foreach(\App\Category::latest()->get() as $c)
                                        <option value="{{ $c->id }}" {{ $blog->category_id == $c->id ? "selected":"" }} >{{ $c->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Street</label>
                                <textarea class="form-control @error('street') is-invalid @enderror" name="description" id="description">{{ $blog->description }}</textarea>
                                @error('description')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Blog</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 140,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true
            });
        });
    </script>
@endsection
