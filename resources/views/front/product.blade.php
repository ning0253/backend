@extends('layouts/nav')

@section('content')
<section class="services1 cid-rSHipPxh3m" id="services1-5">
    <!--Container-->
    <div class="container">
        <div class="row justify-content-center">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-left pb-3 mbr-fonts-style display-1">
                    Our Shop
                </h2>
            </div>

            @foreach ($products_data as $item)
            <div class="card col-12 col-md-6 p-3 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="{{asset('/storage/'.$item->img)}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">
                            {{$item->name}}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {!!$item->content!!}
                        </p>
                        <!--Btn-->
                        <div class="mbr-section-btn align-left">
                        <a href="/product/{{$item->id}}" class="btn btn-warning-outline display-4">
                                {{$item->product_types->type}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
