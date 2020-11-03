@extends('layouts.admin')
@section('content')
<div class="content">
    <h1 class="text-center" style="margin-bottom: 2rem">Products</h1>


    <div style="margin-bottom: 10px;" class="row">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card m-5" style="margin-bottom: 10px">
                <div class="card-body">
                    @if($product->image)
                    <a href="{{ $product->image->getUrl() }}" target="_blank" style="display: block">
                        <img class="card-img-top" src="{{ $product->image->getUrl('preview') }}"
                             alt="no image">
                    </a>
                    @endif
                    <h1 class="card-title text-center">{{$product->product_name}}</h1>
                    <p class="card-text">{{$product->description}}</p>
                    <h4 class="text-center" style="margin-top: 2rem">{{ $product->product_price }} INR</h4>
                    <br>
                    <hr>
                    <!-- <a href="{{ route('user.cart.add',$product->id) }}" class="btn btn-primary float-right">Add to Card  </a> -->

                    <form action="{{route('user.checkout.new.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control qty-input qty" name="qty" id="qty" type="text"
                                           placeholder="qty" onchange="vali(this.value)" value="1">
                                    <input type="hidden" name="price" value="{{ $product->product_price }}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-md-push-2">
                                <button type="submit" class="btn btn-primary buy">Buy</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>


        @endforeach
    </div>
</div>

<script type="text/javascript">
    /*   alert('hi')
       let qty = document.querySelector('#qty');
       let buy = document.querySelector('#buy');

       function buy() {
           alert('hi')
           if(qty.textContent <1){
               buy.disabled = true
           }
       }
   */
</script>
@endsection

@section('script')

<script type="text/javascript">
    var qty = document.querySelectorAll('.qty')

    // var buy = document.querySelectorAll('.buy')

    function vali(value) {

        for (j = 0; j < qty.length; j++) {
            qty_text = value
            console.log(qty_text)
            if (qty_text < 1) {

                var buy = document.querySelectorAll('.buy')
                for (i = 0; i < buy.length; i++) {

                    buy[i].disabled = true
                }

            }

        }
    }


</script>
@endsection
