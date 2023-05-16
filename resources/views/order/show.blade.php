@extends('dashboard.app')

@section("title") Order Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Order" => "#",
        "Order" => "#"
    ]])
        @slot("last") See Order @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Order @endslot
                @slot('button')
                    <a href="{{ route('order.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                    <a href="{{ route('order.edit',$order->id) }}" class="btn  btn-outline-warning btn-sm">
                        <i class="fa-fw feather-edit"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('order.destroy',$order->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button href="" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form>
                @endslot
                @slot('body')
                    <div class="card-body">
                        @isset($order)
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-12 col-md-6">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $order->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $order->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $order->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>{{ $order->date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Start</td>
                                            <td>{{ $order->start }}</td>
                                        </tr>
                                        <tr>
                                            <td>End</td>
                                            <td>{{ $order->end }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5>{{ $order->getWeddingPackage->title }} ( <small>{{ $order->getWeddingPackage->price }} Ks</small> )</h5>
                                    <hr/>
                                    <div class="d-flex flex-wrap">
                                        @foreach($order->getWeddingPackage->getPhoto as $photo)
                                            <div class="col-6 p-2" style="width: 40px;">
                                                <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/wedding_package/".$photo->name) }}">
                                                    <img class="w-100" src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" >
                                                </a>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
