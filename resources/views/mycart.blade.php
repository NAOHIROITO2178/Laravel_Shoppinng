@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="">
    <div class="mx-auto" style="max-width:1200px">
      <h1 class="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">購入履歴</h1>
      <div class="">
        <div class="d-flex flex-row flex-wrap">
          購入した商品一覧<br>

          @foreach($carts as $cart)
          <p>ユーザーID{{$cart->user_id}}</p> <br>
          <p>ストックID{{$cart->stock_id}}</p><br>
          @endforeach

        </div>
        <a href="/">商品棚に戻る</a>
      </div>
    </div>
  </div>
</div>
@endsection
