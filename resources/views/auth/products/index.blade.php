@extends('layouts/app')

@section('content')
<div class="container">
    <form method="POST" action="/home/product/store">
        @csrf
        <div class="form-group">
          <label for="img">Img</label>
          <input type="text" class="form-control" id="img" placeholder="Enter img" name="img">
        </div>
        <div class="form-group">
        <label for="tag">Tag</label>
          <input type="text" class="form-control" id="tag" placeholder="Enter tag" name="tag">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection


