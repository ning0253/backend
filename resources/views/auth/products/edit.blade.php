@extends('layouts/app')

@section('content')
<div class="container">
    <form method="POST" action="/home/product/update/{{$product->id}}">
        @csrf
        <div class="form-group">
            <label for="img">Img</label>
            <input type="text" class="form-control" id="img" placeholder="Enter img" name="img" value="{{$product->img}}">
        </div>
        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" class="form-control" id="tag" placeholder="Enter tag" name="tag"
                value="{{$product->tag}}">
        </div>
        <div class="form-group">
            <label for="sort">Sort</label>
            <input type="number" class="form-control" id="sort" placeholder="Enter sort" name="sort"
                value="{{$product->sort}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
