@extends('layouts.front')
@section('page')
        <div class="container">
            <div class="row pt120">
                <div class="books-grid">
                
                <div class="row mb30">
                    @foreach ($prods as $prod)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="{{ asset('storage/'.$prod->image) }}" alt="book">
                                <div class="new">New</div>
                                <div class="sale">Sale</div>
                                <div class="overlay overlay-books"></div>
                            </div>

                            <div class="books-item-info">
                                <h5 class="books-title">{{ $prod->name }}</h5>

                                <div class="books-price">$ {{ $prod->price }}</div>
                            </div>

                            <a href="19_cart.html" class="btn btn-small btn--dark add">
                                <span class="text">Add to Cart</span>
                                <i class="seoicon-commerce"></i>
                            </a>

                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row pb120">
                    <div class="col-lg-12">{{ $prods->links()  }}</div>

                </div>
            </div>
            </div>
        </div>
@endsection

    
