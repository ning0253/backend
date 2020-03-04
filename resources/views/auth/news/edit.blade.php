@extends('layouts/app')

@section('content')
<div class="container">
    <form method="POST" action="/home/news/update/{{$news->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Img</label>
            <img src="{{asset('/storage/'.$news->img)}}" alt="">
        </div>
        <div class="form-group">
            <label for="img">Img</label>
            <input type="file" class="form-control" id="img" placeholder="Enter img" name="img">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                value="{{$news->title}}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10" required>{{$news->content}}</textarea>
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
