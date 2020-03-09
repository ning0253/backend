@extends('layouts/app')

@section('content')
<div class="container">
    <form method="POST" action="/home/productType/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" placeholder="Enter type" name="type" required>
        </div>
        <div class="form-group">
            <label for="sort">Sort</label>
            <input type="text" class="form-control" id="sort" placeholder="Enter sort" name="sort" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
