$(document).ready(function(){

  $( 'body' ).on( 'click', 'button.plus, button.minus', function() {

 /* кнопки +/- активируем*/

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

/* при входе на страницу products заполняем чекбоксы которые были выбраны из cookie */

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
      $('.product#' + tek_prod_id + ' .prod_link').addClass('checked');
    })
    $('.cart-content .count').text(count_prod);
  }

  /*  отслеживаем клик по блоку с изображением товара, полу чаем значения из инпутов и передаем в куки */

 
  $('.prod_link').on('click', function(e) {
    let tek_prod_id = $(this).attr('prod_id');
    
    var quantity_prod = $('.quantity_prod#prod_lab_' + tek_prod_id).val();
    function z() {
      var quantity_prod = $('.quantity_prod#prod_lab_' + tek_prod_id).val();
    }
    //setTimeout(z, 2000);   

    if ( $.cookie('shop') == null ) {
      var cookie_shop = [];
    } else {
      var cookie_shop = JSON.parse($.cookie('shop'));

    }
    /* обработка клика по блоку prod_link товара */
    if ($(this).find(".custom-checkbox").is(':checked')){
      $(this).find(".custom-checkbox").prop('checked', false);
      var cookie_shop = jQuery.grep(cookie_shop, function( n, i ) {
        return ( n.tek_prod_id !== tek_prod_id );
      });
      $(this).removeClass('checked');
    } else {

      $(this).find(".custom-checkbox").prop('checked', true);
      var cookie_shop = jQuery.grep(cookie_shop, function( n, i ) {
        return ( n.tek_prod_id !== tek_prod_id );
      })
      /* сохраняем состояние объектов товаров */
      cookie_shop.push( {tek_prod_id : tek_prod_id, kolvo : quantity_prod},);
      $(this).addClass('checked');
    }

    /* счетчик корзины */
    count_prod = 0;
    $.each(cookie_shop, function(key, data){      
      count_prod++; 
    })
    $('.cart-content .count').text(count_prod);
/* добовляем состояния в куку */
    $.cookie('shop', JSON.stringify(cookie_shop), { expires: 365, path: '/' });
  });

  /*отследим изменение значения поля кол-ва товара */
  $('.quantity_prod').on( 'change', function() {
    let tek_prod_id = $(this).attr('prod_id');
    /* проверяем состояние чекбокса товара */
    if ($('.custom-checkbox[prod_id=' + tek_prod_id + ']').is(':checked')){
      $('.custom-checkbox[prod_id=' + tek_prod_id + ']').click();

    } else {
      $('.prod_link[prod_id=' + tek_prod_id + ']').trigger('click');
    }
  });
  /* отследим нажатие кнопок +/- */
  $( 'body' ).on( 'click', 'button.plus, button.minus', function() {
    let tek_prod_id = $(this).attr('prod_id');
    if ($('.custom-checkbox[prod_id=' + tek_prod_id + ']').is(':checked')){
      $('.custom-checkbox[prod_id=' + tek_prod_id + ']').click();

    } else {

      $('.prod_link[prod_id=' + tek_prod_id + ']').trigger('click');
    }
  });

  

  
  

});