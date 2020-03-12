@extends('layouts.nav')

@section('css')
<style>
    *{
        box-sizing: border-box;
    }
    .color, .capacity{
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

    .color.active, .capacity.active {
        border: solid 1px red;
    }
</style>
@endsection

@section('content')

<div class="container mt-5 pt-5">

    <div class="row mb-3">
        <div class="col-6"></div>
        <div class="col-6">
            <div class="row mb-3 product">
                <h1>Redmi Note 8 Pro</h1>
                <div class="subtitle">
                    <span class=""></span>,
                    <span class=""></span>
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

            <div class="row mb-3 product_quantity">
                <div id="field1">數量
                    <button type="button" id="sub" class="sub form-group">-</button>
                    <input type="number" id="1" value="1" min="1" max="3" />
                    <button type="button" id="add" class="add form-grou">+</button>
                </div>
            </div>
            <div class="row mb-3 product_total">
                <input id="capacity" type="text">
                <input id="color" type="text">
            </div>
            <button>立即購買</button>
        </div>
    </div>


</div>

@endsection

@section('js')
<script>
    $('.capacity').click(function () {
        $('.capacity').removeClass('active');
        $(this).addClass('active');

        console.log($('.subtitle.nth-child(1)').text());

        $('#capacity').val(this.innerText);
    });
    $('.color').click(function () {
        $('.color').removeClass('active');
        $(this).addClass('active');
        $('#color').val(this.innerText);
    });
</script>
@endsection
