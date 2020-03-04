@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">

    <a href="/home/product/create" class="btn btn-success">新增</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10">ID</th>
                <th width="200">Img</th>
                <th>Tag</th>
                <th width="10">Sort</th>
                <th width="80"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products_data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><img width="200" src="{{$item->img}}" alt=""></td>
                <td>{{$item->tag}}</td>
                <td>{{$item->sort}}</td>
                <td>
                    <a href="/home/product/edit/{{$item->id}}" class="btn btn-success btn-sm">修改</a>
                    <a class="btn btn-danger btn-sm" href="" onclick="event.preventDefault();
                                                     show_confirm({{$item->id}});">
                        {{ __('刪除') }}
                    </a>

                    <form id="delete-form-{{$item->id}}" action="/home/product/delete/{{$item->id}}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 3, 'desc' ]]
        });
    });
    function show_confirm(id) {
        let r=confirm("確定刪除？");
        if(r){
            document.getElementById('delete-form-'+id).submit();
        }
    }
</script>
@endsection
