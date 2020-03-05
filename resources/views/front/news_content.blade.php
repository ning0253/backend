@extends('layouts/nav')

@section('content')
<div class="mt-5 pt-5">
    Title: {{$news_data->title}}
    <br>
    Img:
    <img width="200" src="{{asset('/storage/'.$news_data->img)}}" alt="">
    <br>
    Imgs:
    @foreach ($news_data->news_imgs as $item)
    <img width="200" src="{{asset('/storage/'.$item->img)}}" alt="">
    @endforeach
</div>
</section>

@endsection
