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
        <div class="row justify-content-center">
            <h2 class="col-12 text-center my-5">Order Package</h2>
            @if(isset($name))
                <div class="col-12 col-md-10">
                    <form action="{{ route('orderPackage.storeOrder',$id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-around">
                            <div class="col-12 col-md-6">
                                <input type="hidden" name="wedding_package_id" value="{{ $id }}">
                                <div class="form-group">
                                    <label for="hiddenId">Package</label>
                                    <input type="text" disabled class="form-control" name="hiddenId" id="hiddenId" placeholder="{{ $name }}" >
                                    @error('wedding_package_id')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Your Name">
                                    @error('name')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone')}}" placeholder="Phone">
                                    @error('phone')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                                    @error('email')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{old('date')}}" placeholder="Date">
                                    @error('date')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="start">Start</label>
                                    <input type="time" class="form-control @error('start') is-invalid @enderror" name="start" id="start" value="{{old('start')}}" placeholder="Start">
                                    @error('start')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="end">End</label>
                                    <input type="time" class="form-control @error('end') is-invalid @enderror" name="end" id="end" value="{{old('end')}}" placeholder="End">
                                    @error('end')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control @error('street') is-invalid @enderror" rows="6" name="address" id="address">{{old('address')}}</textarea>
                                    @error('address')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-block btn-primary " ><i class="fas fa-plus-square mr-1"></i> Submit Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="col-12 text-center text-danger">
                    <h1>Error</h1>
                </div>
            @endif

        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
