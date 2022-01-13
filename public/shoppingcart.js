$(document).ready(function () {
	cartNoti();
	showTable();
	$('.addtocartBtn').on('click',function() {
		var id=$(this).data('id');
		var name=$(this).data('name');
		var codeno=$(this).data('codeno');
		var photo=$(this).data('photo');
		var price=$(this).data('price');
		var discount=$(this).data('discount');
		var qty=1;

		var mylist={id:id,codeno:codeno,name:name,photo:photo,price:price,discount:discount,qty:qty};

		// console.log(mylist);

		var cart=localStorage.getItem('cart');
		var cartArray;

		if (cart==null) {
			cartArray=Array();
		}
		else{
			cartArray=JSON.parse(cart);
		}
		var status=false;

		$.each(cartArray,function(i,v){
			if(id==v.id){
				v.qty++;
				status=true;
			}
		});
		if (!status) {
			cartArray.push(mylist);
		}

		var cartData=JSON.stringify(cartArray);
		localStorage.setItem("cart",cartData);
		cartNoti();
		
	});

	function cartNoti() {
		var cart=localStorage.getItem('cart');
		if (cart) {
			var total=0;
			var noti=0;
			var cartArray=JSON.parse(cart);
			$.each(cartArray,function(i,v){
				var unitprice=v.price;
				var discount=v.discount;
				var qty=v.qty;

				if (discount) {
					var price=discount;
				}
				else{
					var price=unitprice;
				}
				var subtotal=price*qty;

				noti+=qty++;
				total+=subtotal++;
			})
			$('.shoppingcartNoti').html(noti);
			$('.shoppingcartTotal').html(total+' Ks');
		}else{
			$('.shoppingcartNoti').html(0);
			$('.shoppingcartTotal').html(0+' Ks');
		}
	}

	function showTable() {
		var cart=localStorage.getItem('cart');

		if (cart) {
			$('.shoppingcart_div').show();
			$('.noneshoppingcart_div').hide();

			var cartArray=JSON.parse(cart);
			var shoppingcartData='';

			if (cartArray.length>0) {

				var total=0;

				$.each(cartArray,function (i,v) {
					var id=v.id;
					var codeno=v.codeno;
					var name=v.name;
					var unitprice=v.price;
					var discount=v.discount;
					var photo=v.photo;
					var qty=v.qty;

					var str_unitprice = CommaFormatted(unitprice.toString());
                    var str_discount = CommaFormatted(discount.toString());

					if (discount) {
						var price=discount;
					}else{
						var price=unitprice;
					}
					var subtotal=price*qty;
					var str_subtotal = CommaFormatted(subtotal.toString());


					shoppingcartData+=`<tr>
                                    <td class="shoping__cart__item">
                                        <img src="${photo}" alt="" width="150px" class="img-fluid">
                                        <h5>${name}</h5>
                                    </td>
                                    <td class="shoping__cart__price">   
                                    
                                    `;

					if(discount){
						shoppingcartData+=`<p class="text-danger">
												${str_discount} Ks
											</p>
											<p class="font-weight-lighter">
												<small><del>${str_unitprice} Ks</del></small>
											</p>`;
					}else{
						shoppingcartData+=`<p class="text-danger">
												${str_unitprice} Ks
											</p>`;
					}
											
					shoppingcartData+=`</td>
										<td class="shoping__cart__quantity">
											<div class="quantity">
												<button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
												<i class="icofont-plus"></i> 
												</button>

												<div class="pro-qty">
													<input type="text" value="${qty}">
												</div>

												<button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
												<i class="icofont-minus"></i> 
												</button>
											</div>
										</td>
										
										<td>
											<p> ${str_subtotal} Ks</p>
										</td>

										<td class="shoping__cart__item__close remove">
											<span class="icon_close"></span>
										</td>
										</tr>`;

					total+=subtotal++;

				});
				var totality = parseInt(total) + parseInt(deliveryprice);

				$('#shoppingcart_table').html(shoppingcartData);
				$('.totality').html(CommaFormatted(totality.toString())+' Ks');

			}else{
				$('.shoppingcart_div').hide();
				$('.noneshoppingcart_div').show();
			}
		}
		else{
			$('.shoppingcart_div').hide();
			$('.noneshoppingcart_div').show();
		}
	}

	// plus button
	$('#shoppingcart_table').on('click','.plus_btn',function () {
		var id=$(this).data('id');
		var itemString=localStorage.getItem('cart');
		var cartArray=JSON.parse(itemString);
		$.each(cartArray,function (i,v) {
			if (i==id) {
				v.qty++;
			}
		})
		cart=JSON.stringify(cartArray);
		localStorage.setItem("cart",cart);
		showTable();
		cartNoti();
	});

	// minus button
	$('#shoppingcart_table').on('click','.minus_btn',function () {
		var id=$(this).data('id');
		var itemString=localStorage.getItem('cart');
		var itemArray=JSON.parse(itemString);
		$.each(itemArray,function (i,v) {
			if (i==id) {
				v.qty--;
				if (v.qty==0) {
					itemArray.splice(id,1);
				}
			}
		})
		cart=JSON.stringify(itemArray);
		localStorage.setItem("cart",cart);
		showTable();
		cartNoti();
	});

	// remove 
	$('#shoppingcart_table').on('click','.remove',function () {
		var id=$(this).data('id');

		var itemString=localStorage.getItem('cart');

		var itemArray=JSON.parse(itemString);

		itemArray.splice(id,1);

		cart=JSON.stringify(itemArray);
		localStorage.setItem("cart",cart);
		showTable();
		cartNoti();
	});


	$('.checkoutBtn').on('click',function () {
		// console.log('checkoutbtn');

		var cart=localStorage.getItem('cart');
		
		var note=$('#notes').val();

		// for csrf token
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});

		$.post('/order',{data:cart,note:note},function(response){
			localStorage.clear();
			location.href="ordersuccess";
		});

		
	});
	function CommaFormatted(amount) 
    {
        var delimiter = ","; // replace comma if desired
        var a = amount.split('.',2)
        var i = parseInt(a[0]);
        
        if(isNaN(i)) 
        {
            return ''; 
        }
        
        var minus = '';
        
        if(i < 0) 
        {
            minus = '-'; 
        }
        
        i = Math.abs(i);
        var n = new String(i);

        var a = [];
        
        while(n.length > 3) {
            var nn = n.substr(n.length-3);
            a.unshift(nn);
            n = n.substr(0,n.length-3);
        }

        if(n.length > 0) 
        { 
            a.unshift(n); 
        }
        n = a.join(delimiter);

        amount = minus + amount;

        // console.log(n);

        return n;

    }
})