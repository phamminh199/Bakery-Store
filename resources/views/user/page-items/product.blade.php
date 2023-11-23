@extends('user.layout.index')
@section('content')
    <section class="products">

        <div id="wrapper">
            <div id="sideBar">
                <aside class="sidebar_menu">
                    <ul class="list-product">
                        <li>
                            <a class="" href="{{ URL::to('product') }}">
                                Main menu
                         </a>
                        </li>
                        @foreach ($category as $a)
                            <li>
                                <a class="" href="{{ URL::to('submenu/'.$a->category_id) }}">
                                    {{ $a->category_name }}
                                   </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="arrange-header">
                        Oder by
                    </div>
                    <div class="arrange-div">

                        <p style="cursor: pointer;
                      ">Sắp xếp sản phẩm</p>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>

                    <div class="arrange-items arrange-items-active">
                        <form action="">
                            @csrf
                            <a href=" {{ URL::to('product') }}" class="value1">
                                {{-- <input value="All" readonly> --}}
                                <option value="All">All</option>

                            </a>


                            <a href="{{ URL::to('ASCproduct') }}" class="value2">
                                <option value="Price-Low to high">Price-Low to high</option>
                            </a>


                            <a href="{{ URL::to('DESproduct') }}" class="value3">
                                <option value="">Price-High to low</option>
                            </a>
                            {{-- <option value="">Newest</option> --}}
                        </form>


                    </div>

                </aside>
                {{-- <form action=""> --}}
                {{-- <label for="">Order by</label>
                   <div name="arrange" id="arrange" class="arrange">
                       @csrf
                       <a href="{{ URL::to('normalPoduct') }}">
                       <input value="All">
                       </a>
                       <a href="{{ URL::to('ASCproduct') }}">
                           <option value="Price-Low to high">Price-Low to high</option>
                       </a>


                       <a href="{{ URL::to('DESproduct') }}">
                           <option value="">Price-High to low</option>
                       </a> --}}



                {{-- <option value="">Newest</option> --}}

                {{-- </form> --}}


            </div>

            <div id="content">
                <section class="dishes" id="dishes">
                    <img alt="Hi-tea Healthy"
                        src="//file.hstatic.net/1000075078/file/cover_8dca94a796324989af57bf9c1e5d80e8_master.jpg">
                    <div class="heading">
                        <img src="images/heading-img.png" alt="">
                        <h3>our menu</h3>
                    </div>


                    <div class="box-container">



                        @foreach ($product as $p)
                        {{-- <div class="box-heart">
                            <button class="fas fa-heart heart" id="{{ $p->product_id }}"
                                onclick="add_wishlist(this.id)">
                        </div> --}}
                            <div class="box">
                                <div class="box-heart">
                                    <a class="fas fa-heart heart" id="{{ $p->product_id }}"
                                        onclick="add_wishlist(this.id)"  ></a>
                                </div>
                                <a href="{{ URL::to('view-product/' . $p->product_id) }}" class="fas fa-eye"></a>

                                <img src={{ url('user/images/' . $p->product_images) }} alt="">


                                <h3>{{ $p->product_name }}</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span>{{ $p->product_price }}</span>
                                {{-- do nam ngoai trang view nen pham co {{$p->product_id}}  sau moi id de co the bat id cua tung san pham --}}

                                <input type="hidden" id="wishlist_productname{{ $p->product_id }}" value="{{ $p->product_name }}">
                                <input type="hidden"  id="wishlist_productprice{{ $p->product_id }}"
                                 value=" {{ number_format($p->product_price)  }}">
                                <input type="hidden"  id="wishlist_productimage{{ $p->product_id }}" src="{{ asset('user/images/' . $p->product_images) }}">
                                <input type="hidden"  id="wishlist_producturl{{ $p->product_id }}" value="{{ $p->product_id }}"
                                href="{{ URL::to('view-product/' .$p->product_id) }}">

                            </div>
                        @endforeach





                </section>

                <div class="pagination">
                    {{ $product->links()}}
                </div>

            </div>
        </div>









    </section>


    <link rel="stylesheet" href="{{ asset('user/css/product.css') }}">

    <script src="{{ url('user/js/product-js.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        const arrangeLink = document.querySelectorAll("arrange-items a option");
        [...arrangeLink].forEach((item) => item.addEventListener("click", function(e) {
            e.preventDefault();
            console.log(e.target.parentNode);

        }));


    </script>
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection
