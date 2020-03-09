@extends('layouts/app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
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
            <div class="row" id="img_group">
                @foreach ($news->news_imgs as $item)
                <div class="col-2">
                    <div class="other_img">
                        <button type="button" class="btn btn-danger"
                            onclick="ajax_delete_img(this.parentElement, {{$item->id}})">x</button>
                        <img class="img-fluid" src="{{asset('/storage/'.$item->img)}}" alt="">
                        <input type="number" class="form-control" placeholder="Enter sort" name="sort"
                            value="{{$item->sort}}" required onchange="ajax_edit_sort(this, {{$item->id}})">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="news_imgs">Add Other Imgs</label>
            <input type="file" class="form-control" id="news_imgs" name="news_imgs[]" multiple>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                value="{{$news->title}}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"
                required>{!!$news->content!!}</textarea>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote(
            {
                minHeight:200
            }
        );
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function ajax_delete_img(element, id){
        $.ajax({
            method: 'POST',
            url: '/home/ajax_delete_img',
            data: {
                img_id: id
            },
            success: function (res) {
                element.remove();
                $("#img_group").load(location.href+" #img_group>*","");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }

    function ajax_edit_sort(element, id){
        $.ajax({
            method: 'POST',
            url: '/home/ajax_edit_sort',
            data: {
                img_id: id,
                img_sort: element.value
            },
            success: function (res) {
                $("#img_group").load(location.href+" #img_group>*","");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }
</script>

@endsection
