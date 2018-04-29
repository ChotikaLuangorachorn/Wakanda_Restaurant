@extends('layouts.waiter')

@section('page-title-waiter')
  จัดการโต๊ะ <br>
  <small class="blockquote-footer">มีโต๊ะว่าง <b class="text-danger">{{$countEmptyTable}}</b> โต๊ะ </small>
@endsection

@section('content')
<div class="row">
  @foreach($dining_tables as $dining_table)
    <div class="card mb-3 " style="text-align:center;width: 22rem; margin: 10px;min-height:20rem">
      <div class="card-header justify-content-between d-flex align-items-center">
        โต๊ะที่: {{$dining_table->id}}
        {{-- {{route('waiter.DiningTablesController@count', ['dining_table' => $dining_table])}} --}}
        <span class="badge badge-warning badge-pill">receipt {{$dining_table->receipts->count()}}</span>
      </div>

      <div class="card-body ">
        @if($dining_table->receipts->count() != 0 and $dining_table->status == 'busy')
        <table class="table">
          <thead>
            <tr class="table-danger">
              <th scope="col">ชื่ออาหาร</th>
              <th scope="col">จำนวน</th>
              <th scope="col">สถานะ</th>
            </tr>
          </thead>
          <tbody class="table-hover">

              @foreach($dining_table->receipts as $receipt)

                @foreach($receipt->orders as $order)
                <tr class="table-secondary">
                  <td>{{$order->menus->name}}</td>
                  <td>{{$order->amount}}</td>
                  <td>{{$order->status}}</td>
                  </tr>
                @endforeach

              @endforeach

          </tbody>

        </table>
        @elseif($dining_table->status == 'empty')
          โต๊ะว่าง
        @else
          ยังไม่ได้สั่งอาหาร
        @endif
      </div>
      <div class="card-footer" style="text-align:right">
        <form action="/waiter/manageTable" method="post">
          @csrf
          <button type="submit" class="btn btn-primary" name="clearbtn" value="{{$dining_table->id}}">clear table</button>
        </form>
      </div>
    </div>
  @endforeach
</div>

@endsection
