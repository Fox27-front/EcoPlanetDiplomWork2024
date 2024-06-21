$(document).ready(function(){
  var f= null;
  var id_prod = null;
  /* аякс подгрузка выбранных товаров составляемых файлом loop_cart_cont.php */
  function upd(f,id_prod) {
    mn_roses = $('input[name="radio_roses"]:checked').attr('attr_mnoj');
    $.ajax({
      url: 'template/loop_cart_cont.php',
      method: 'post',
      data: {mn_roses: mn_roses,f: f,id_prod:id_prod,},
      success: function(data){
        /* заменяем содержимое cart_prods на loop_cart_cont.php */
        $('.cart_prods').html(data);
      },
      /* считаем итоговую цену и сохраняем в куки для оформление заказа */
      complete: function(){ 
        var sum=0;
        $('.poditog').each(function(){
          sum += parseInt($(this).html(), 10);
        });
        $('.price_itog').html(sum);
        $.cookie('payment', sum, { expires: 365, path: '/' });
        $.cookie('roses', mn_roses, { expires: 365, path: '/' });
        del_prod();
        var f= null;
      },
    });
  }
  upd(f, id_prod);
 
    /* отследим изменение радио кнопок цен для роз  */

    $(document).on('change', 'input:radio[name="radio_roses"]', function() {
      var f = null;
      upd(f, id_prod);
    }); 
    /* убрать выбранный товар */
  function del_prod() {
    $('.close_icon').click(function() {      
      var id_prod = $(this).attr('prod_id');
      //alert(id_prod);
      var f = 'deltek';
      upd(f,id_prod);
    });
  }
  del_prod();
  /* сброс корзины */
  function reset_cart() {
    $('.reset_button').click(function() {
      $.removeCookie('shop', { path: '/' });
      window.location.href = 'http://ecoplanet/products.php';
      var f = 'delall';
      upd(f, id_prod);
    });
  }
  reset_cart();
});