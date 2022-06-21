@extends('layouts.index')

@section('content')
<div class="site-section">
    <div class="container">
    <h3>Cart</h3>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                <td data-th="Product">
                    <div class="row">
                            <h4 class="nomargin">{{ $details['generic_name'] }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{ $details['price'] }}</td>
                <td data-th="Quantity">
                    {{ $details['quantity'] }}
                </td>
                <td data-th="Subtotal" class="text-center">Rp. {{ $details['price'] * $details['quantity']  }}</td>
                <td class="actions" data-th="">
                </td>
                </tr>
            @endforeach
        @endif
       
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{ url('shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"> <a href="{{ url('/checkout') }}" class="btn btn-danger"> checkout <i class="fa fa-angle-right"></i></a></td>
            <td class="hidden-xs text-center"><strong>Total Rp. {{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
</div>
</div>
@endsection