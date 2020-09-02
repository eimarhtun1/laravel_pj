
$(document).ready(function(){
    getData();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add_to_cart').click(function(){
        var id=$(this).data('id');
        var name=$(this).data('name');
        var price=$(this).data('price');
        var photo=$(this).data('photo');
        var discount=$(this).data('discount');
        //alert(discount);
        let item={id:id,name:name,price:price,photo:photo,discount:discount,qty:1};

        let oldcart = localStorage.getItem('cart');
        if (oldcart ==null ) {
                var cart=new  Array();//arr
                
            }else{
                var cart = JSON.parse(oldcart);//arr
                
            }

            var exist;
            $.each(cart,function(i,v){
                if( id == v.id){
                    v.qty++;
                    exist=true;
                }

            })
            if(!exist){
                cart.push(item);
            }
             // cart.push(item);
             // let cart=new  Array();
             // cart.push(item);
             localStorage.setItem('cart',JSON.stringify(cart));
             getData();              
         })
    function getData(){
        var mycart= localStorage.getItem('cart');
        var data = $('#shoppingcart_table');
        var result = '';

        if(mycart != null){
            cart =JSON.parse(mycart);
            var total=0;
            $.each(cart,function(i,v){
                subtotal = v.price*v.qty;
                dis=v.price*v.discount/100;
                total+=subtotal;
                result+=`<tr>
                <td>${v.id}</td>
                <td><img src="${v.photo}" width="100" >${v.name}</td>
                <td>${v.price}</td>
                <td><input type="number" value="${v.qty}" class="changeqty" data-id="${i}"></td>
                <td>${subtotal}</td>
                <td>${dis}</td>
                <td><button class="removebtn" data-id="${i}">X</button></td>
                
                </tr>
                `;

            })
            result +=`<tr>
            <td colspan="4">Total:</td>             
            <td colspan="2">${total}</td>
            </tr>`;

        }else{
            result +='Cart is Empty';
        }

        
        data.html(result);

    }
        // $(.removebtn).click(function(){
            $('#shoppingcart_table').on('click','.removebtn',function(){
                let id=$(this).data('id');
             // alert(id);
             var mycart = localStorage.getItem('cart');
             cart = JSON.parse(mycart);
             cart.splice(id,1);
             localStorage.setItem('cart',JSON.stringify(cart));
             getData();

             
         })
            $('#shoppingcart_table').on('change','.changeqty',function(){
                let qty=$(this).val();
                let index=$(this).data('id');

                var mycart = localStorage.getItem('cart');
                cart = JSON.parse(mycart);
                
                $.each(cart,function(i,v){
                    if(i == index){
                        v.qty=qty;
                        // console.log(v.qty);
                        // console.log(qty);
                    }

                })
                if(qty == 0){
                    cart.splice(index,1);
                }
                localStorage.setItem('cart',JSON.stringify(cart));
                getData();
            })


            //for Buy Now
            $('.buy_now').on('click',function(){
                var notes = $('#notes').val();
                //var total = $('.total').val();
                var shopString = localStorage.getItem("cart");
                if(shopString){
                    //var shopArray=JSON.parse(shopString);

                    $.post('/orders',{shop_data:shopString,notes:notes},function(response){
                        if(response){
                            alert(response);
                            localStorage.clear();
                            getData();
                            location.href="/";
                        }
                    })
                }
            })

        })
