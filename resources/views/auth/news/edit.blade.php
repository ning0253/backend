@extends('layouts/app')

@section('css')
<style>
    .other_img button {
        position: absolute;
        top: -15px;
        right: 0;
    }
</style>
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/home/news/update/{{$news->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Main Img</label>
            <img width="200" src="{{asset('/storage/'.$news->img)}}" alt="">
        </div>
        <div class="form-group">
            <label for="img">Change Main Img</label>
            <input type="file" class="form-control" id="img" placeholder="Enter img" name="img">
        </div>
        <div class="form-group">
            <label>Other Imgs</label>
            <div class="row">
                @foreach ($news->news_imgs as $item)
                <div class="col-2">
                    <div class="other_img">
                        <button type="button" class="btn btn-danger">x</button>
                        <img class="img-fluid" src="{{asset('/storage/'.$item->img)}}" alt="">
                        <input type="number" class="form-control" placeholder="Enter sort" name="sort"
                            value="{{$item->sort}}" required>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="news_imgs">Add Other Imgs</label>
            <input type="file" class="form-control" id="news_imgs" name="news_imgs[]" required multiple>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                value="{{$news->title}}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"
                required>{{$news->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="sort">Sort</label>
            <input type="number" class="form-control" id="sort" placeholder="Enter sort" name="sort"
                value="{{$news->sort}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
