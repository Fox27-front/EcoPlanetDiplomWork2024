$(document).ready(function(){

  $( 'body' ).on( 'click', 'button.plus, button.minus', function() {

    var qty = $(this).parent().find( 'input' ),
    val = parseInt( qty.val() ),
    min = parseInt( qty.attr( 'min' ) ),
    max = parseInt( qty.attr( 'max' ) ),
    step = parseInt( qty.attr( 'step' ) );

    if ( $( this ).is( '.plus' ) ) {
      if ( max && ( max <= val ) ) {
        qty.val( max );
      } else {          
        qty.val( val + step );
      }
    } else {
      if ( min && ( min >= val ) ) {
        qty.val( min );
      } else if ( val > 1 ) {
        qty.val( val - step );
      }
    }

  });


  if ( $.cookie('shop') == null ) {
  } else {
    var cookie_shop = JSON.parse($.cookie('shop'));
    ///console.log(cookie_shop);
    count_prod = 0;
    $.each(cookie_shop, function(key, data){        
      count_prod++; 
      tek_prod_id = data['tek_prod_id'];
      tek_prod_kolvo = data['kolvo'];
      //console.log('-' + data['tek_prod_id'] + '-');
      $('.product#' + tek_prod_id).find('.custom-checkbox').prop('checked', true);
      $('.product#' + tek_prod_id).find('.quantity_prod').val(tek_prod_kolvo);
    })
    $('.cart-content .count').text(count_prod);
  }

  //console.log(JSON.parse($.cookie('shop')));

  //$('.product').on('click', function(e) {
  $('.prod_link').on('click', function(e) {
    let tek_prod_id = $(this).attr('prod_id');
    
    var quantity_prod = $('.quantity_prod#prod_lab_' + tek_prod_id).val();
    //console.log(quantity_prod + '--');
    function z() {
      var quantity_prod = $('.quantity_prod#prod_lab_' + tek_prod_id).val();
      //console.log('*' +quantity_prod);
    }
    setTimeout(z, 2000);
    //console.log(quantity_prod);
    let kolvo = 789;

    if ( $.cookie('shop') == null ) {
      var cookie_shop = [];
    } else {
      var cookie_shop = JSON.parse($.cookie('shop'));

    }
    if ($(this).find(".custom-checkbox").is(':checked')){
      $(this).find(".custom-checkbox").prop('checked', false);
      var cookie_shop = jQuery.grep(cookie_shop, function( n, i ) {
        return ( n.tek_prod_id !== tek_prod_id );
      });
    } else {

      $(this).find(".custom-checkbox").prop('checked', true);
      var cookie_shop = jQuery.grep(cookie_shop, function( n, i ) {
        return ( n.tek_prod_id !== tek_prod_id );
      })
      cookie_shop.push( {tek_prod_id : tek_prod_id, kolvo : quantity_prod},);
      
    }

    count_prod = 0;
    $.each(cookie_shop, function(key, data){      
      count_prod++; 
    })
    $('.cart-content .count').text(count_prod);

    $.cookie('shop', JSON.stringify(cookie_shop), { expires: 365, path: '/' });
  //$.cookie('shop', JSON.stringify(arr));
  //console.log($.cookie("shop"));


    function upd() {

      $.ajax({
        url: 'template/loop_cookies_for_cart.php',
        method: 'post',
        data: {arr_coocke_front: cookie_shop,},
        success: function(data){
          ///$('#zzz').html(data);
        },
        complete: function(){ 

        },
      });
    }
    upd();


  //x.push( {name:'world',age:21},);
    //console.log(JSON.parse($.cookie('shop')));
//setArrayInCookie('shop', ar);
  //$.removeCookie('shop');
  });

  /*отследим изменение значения поля кол-ва товара */
  $('.quantity_prod').on( 'change', function() {
    let tek_prod_id = $(this).attr('prod_id');
    //console.log('Значение изменилось на:', $(this).val());
    if ($('.custom-checkbox[prod_id=' + tek_prod_id + ']').is(':checked')){
      $('.custom-checkbox[prod_id=' + tek_prod_id + ']').click();

    } else {
      $('.prod_link[prod_id=' + tek_prod_id + ']').trigger('click');
    }
  });

  $( 'body' ).on( 'click', 'button.plus, button.minus', function() {
    let tek_prod_id = $(this).attr('prod_id');
    if ($('.custom-checkbox[prod_id=' + tek_prod_id + ']').is(':checked')){
      $('.custom-checkbox[prod_id=' + tek_prod_id + ']').click();

    } else {

      $('.prod_link[prod_id=' + tek_prod_id + ']').trigger('click');
    }
  });

  /*активация кнопок + и - */

  
  

});