@extends('layouts.app')

@section('content')
    <main role="main" class="container">
      <h5 class="row">
            <div class="col-sm-10" >
             @if(Session::has('cart'))
                <div class="row">
                    <div class="col-sm-6 com-md-offset-3 col-sm-offset-3">
                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                Quantity:
                                <span class="badge">{{ $product['qty']}}</span>
                                <br>
                                Product name:
                                <strong>{{ $product['item']['name']}}</strong>
                                <br>
                                <span class="lable lable-success">Price:{{ $product['price']}}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark btn-xs dropdown-toogle" data-toggle="dropdown">
                                        Action
                                    </button>
                                    <ul class = "dropdown-menu">
                                        <li><a href="#">Reduce by  1</a></li>
                                        <li><a href="#">Reduce by  2</a></li>
                                    </ul>
                                </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div> 
             @endif
             <div class="row">
                    <div class="col-sm-6 com-md-offset-3 col-sm-offset-3">
                    <strong>Total: {{ $totalPrice }}</strong>
                    </div>
                </div> 
                <hr>
                <div class="row">
                        <div class="col-sm-6 com-md-offset-3 col-sm-offset-3">
                                <button type="button" class="btn btn-sucess">Checkout</button>
                        </div>
                </div> 
                {{-- <div class="row">
                        <div class="col-sm-6 com-md-offset-3 col-sm-offset-3">
                              <h2>No item in cart!</h2>
                        </div>
                </div>  --}}
            </div>           
        </div>
    </main>   
</div>
@endsection 

