$(document).ready(function(){
  var f= null;
  var id_prod = null;
  function upd(f,id_prod) {
    mn_roses = $('input[name="radio_roses"]:checked').attr('attr_mnoj');
    $.ajax({
      url: 'template/loop_cart_cont_2.php',
      method: 'post',
      data: {mn_roses: mn_roses,f: f,id_prod:id_prod,},
      success: function(data){
        //console.log(mn_roses);
        $('.cart_prods').html(data);
      },
      complete: function(){ 
        var sum=0;
        $('.poditog').each(function(){
          sum += parseInt($(this).html(), 10);
        });
        //alert(sum);
        $('.price_itog').html(sum);
        del_prod();
        var f= null;
      },
    });
  }
  upd(f, id_prod);
 
    $(document).on('change', 'input:radio[name="radio_roses"]', function() {
      var f = null;
      upd(f, id_prod);
    }); 
  function del_prod() {
    $('.close_icon').click(function() {      
      var id_prod = $(this).attr('prod_id');
      //alert(id_prod);
      var f = 'deltek';
      upd(f,id_prod);
    });
  }
  del_prod();
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