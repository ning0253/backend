@extends('layouts/app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/home/product/update/{{$product_data->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_type_id">State</label>
            <select id="product_type_id" name="product_type_id" class="form-control">
                @foreach ($product_type_data as $item)
                @if ($item->id == $product_data->product_type_id)
                <option selected value="{{$item->id}}">{{$item->type}}</option>
                @else
                <option value="{{$item->id}}">{{$item->type}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Img</label>
            <img width="200" src="{{asset('/storage/'.$product_data->img)}}" alt="">
        </div>
        <div class="form-group">
            <label for="img">Change Img</label>
            <input type="file" class="form-control" id="img" placeholder="Enter img" name="img">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required value="{{$product_data->name}}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10" required>{!!$product_data->content!!}</textarea>
        </div>
        <div class="form-group">
            <label for="sort">Sort</label>
            <input type="number" class="form-control" id="sort" placeholder="Enter sort" name="sort"
                value="{{$product_data->sort}}" required>
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
</script>

@endsection
