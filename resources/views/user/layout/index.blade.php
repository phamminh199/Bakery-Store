<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('user/css/nav.css') }}">

    <link rel="stylesheet" href="{{ asset('user/css/shopping-cart.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    @include('user.layout.nav')

    @yield('content')

    @include('user.layout.footer')

    <!-- custom js file link  -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
<script>
    load_feedback();

    function load_feedback() {
        var product_id = $(".feedback_product_id").val();
        // alert(product_id);
        // var name = $("#wishlist_productname").val();
        // alert(name);

        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('load-feedback') }}',
            method: "POST",
            data: {
                product_id: product_id,
                _token: _token
            },
            success: function(data) {
                $(".feedback_show").html(data);
            }
        });
    };



    function add_wishlist(clicked_id) {
        var id = clicked_id;
        // const name = document.getElementById('wishlist_productname' + id).value;
        // const price = document.getElementById('wishlist_productprice' + id).value;
        // const image = document.getElementById('wishlist_productimage' + id).src;
        // const url = document.getElementById('wishlist_producturl' + id).href;
        var name = $("#wishlist_productname" + id).val();
        var price = $("#wishlist_productprice" + id).val();
        var image = $("#wishlist_productimage" + id).attr("src");
        var url = $("#wishlist_producturl" + id).attr("href");

        // alert(id);
        // alert(name);
        // alert(price);
        // alert(image);
        // alert(url);

        newItem = {
            id: id,
            name: name,
            price: price,
            image: image,
            url: url
        }

        if (localStorage.getItem('data') == null) {
            // tao rong truoc
            (localStorage.setItem('data', '[ ]'));
        }

        var old_data = JSON.parse(localStorage.getItem('data'));
        // data dc day  vao newItem
        // convert giá trị sang dưới dạng JSON string

        // kiem tra san trung
        //grep giong fillter trong js
        var matches = $.grep(old_data, function(obj) {
            return obj.id === id;
        });
        if (matches.length) {
            alert("San pham da them , nen khong the them dc nua ")
        } else {
            old_data.push(newItem);
        }

        localStorage.setItem('data', JSON.stringify(old_data));

    }



    view();
    function view(){
        if(localStorage.getItem('data')!=null){
            // co du lieu khong rong
            var  data = JSON.parse(localStorage.getItem('data'));
            // dao nguoc len trang dau
            data.reverse();

            for (let i = 0; i < data.length; i++) {


                var name = data[i].name;
                var id = data[i].id;

                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                $("#box-container").append(
                    '<div class="box"><a href="#"  id='+id+' onclick="deleteItem(this.id)" " class="fas fa-times" style="font-size: 3rem;"></a> <a href="'+url+'" class="fas fa-eye"></a>   <img src="'+image+'"alt=""> <h3>'+name+'</h3> <div class="stars"> <i class="fas fa-star"></i>  <i class="fas fa-star"></i>   <i class="fas fa-star"></i>  <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i>  </div> <span>'+price+'</span>  <a href=""class="btn">add to cart</a></div>')
            }
        }
    }
    function deleteItem(id){

        if(localStorage.getItem('data')!=null){
            var  old_data = JSON.parse(localStorage.getItem('data'));
            // console.log(old_data)
            console.log(id)
            var matches = $.grep(old_data, function(obj) {
            return obj.id === id;
        });

        console.log(matches)
            old_data.delete(matches);
        }

    }

</script>

</html>
