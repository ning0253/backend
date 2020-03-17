@extends('layouts.nav')

@section('css')
<style>
    * {
        box-sizing: border-box;
    }

    .color,
    .capacity {
        padding: 10px 10px;
        width: 160px;
        min-height: 58px;
        height: 100%;
        font-size: 16px;
        line-height: 36px;
        color: #757575;
        text-align: center;
        border: 1px solid #eee;
        background-color: #fff;
    }

    .color.active,
    .capacity.active {
        border: solid 1px red;
    }
</style>
@endsection

@section('content')

<div class="container mt-5 pt-5">

    <div class="row mb-3">
        <div class="col-6"></div>
        <div class="col-6">
            <div class="row mb-3 product d-flex flex-column">
                <h1>{{$product_data->name}}</h1>
                <div class="subtitle">
                    <span class="lab_capacity"></span>,
                    <span class="lab_color"></span>
                </div>
                <div class="price"></div>
            </div>
            <div class="row mb-3 product_tips">
                icon雙倍 該商品可享受雙倍積分
            </div>
            容量
            <div class="row mb-3 product_capacity">
                <div class="col-4">
                    <div class="capacity">6GB+64GB</div>
                </div>
                <div class="col-4">
                    <div class="capacity">6GB+128GB</div>
                </div>
            </div>
            顏色
            <div class="row mb-3 product_color">
                <div class="col-4 mb-2">
                    <div class="color">紅</div>
                </div>
                <div class="col-4 mb-2">
                    <div class="color">黃</div>
                </div>
                <div class="col-4 mb-2">
                    <div class="color">藍</div>
                </div>
                <div class="col-4 mb-2">
                    <div class="color">綠</div>
                </div>
            </div>
            數量
            <div class="row mb-3 product_quantity">
                <div id="field1">
                    <button type="button" id="sub" class="sub btn btn-sm btn-success">-</button>
                    <span id="lab_quantity">1</span>
                    <button type="button" id="add" class="add btn btn-sm btn-success">+</button>
                </div>
            </div>
            價格
            <div class="row mb-3 pl-3">
                $<span>{{$product_data->price}}</span>
            </div>
            <form method="POST" action="/add_cart/{{$product_data->id}}">
                @csrf
                <input id="capacity" name="capacity" class="d-none" type="text">
                <input id="color" name="color" class="d-none" type="text">
                <input id="quantity" name="quantity" class="d-none" value="1" />
                <button>立即購買</button>
            </form>
        </div>
    </div>


</div>

@endsection

@section('js')
<script>
    let capacity= $('.capacity:eq(0)').text();
    $('.capacity:eq(0)').addClass('active');
    $('.lab_capacity').text(capacity);
    $('#capacity').val(capacity);

    $('.capacity').click(function () {
        $('.capacity').removeClass('active');
        $(this).addClass('active');
        $('#capacity').val(this.innerText);
        $('.lab_capacity').text(this.innerText);
    });

    let color= $('.color:eq(0)').text();
    $('.color:eq(0)').addClass('active');
    $('.lab_color').text(color);
    $('#color').val(color);

    $('.color').click(function () {
        $('.color').removeClass('active');
        $(this).addClass('active');
        $('#color').val(this.innerText);
        $('.lab_color').text(this.innerText);
    });

    $('#sub').click(function () {
        let quantity = parseInt($('#quantity').val())-1;

        if (quantity >= 1) {
            $('#quantity').val(quantity);
            $('#lab_quantity').text(quantity);
        }
    });
    $('#add').click(function () {
        let quantity = parseInt($('#quantity').val())+1;
        $('#quantity').val(quantity);
        $('#lab_quantity').text(quantity);
    });
</script>
@endsection
