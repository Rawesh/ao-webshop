@extends('layouts.webshop')

@section('webshopContent')
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">  
            	<li><a href="{{ url('/shoppingcard') }}" class="nav-link">ShoppingCart</a></li>
            </ul>
        </div>
    </div>
</nav>
<article>
    <table>
        <tr>
           <th>Artikelen</th>
           <th>Aantal</th>
           <th>Datum van order</th> 
        </tr>
        @foreach($order as $order_details)
            @foreach($order_details as $order_detail)
                <tr>

                    <td>{{ $order_detail->article_id }}</td>
                    <td>{{ $order_detail->amount }}</td>
                    <td>{{ $order_detail->created_at }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
</article>
@endsection
