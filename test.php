    <script src="js/jQuery-v3.5.1.js"></script>
    <script src="js/products.js?<?php echo filemtime('js/products.js') ?>"></script>
    <script src="js/jquery.cookies.js"></script>

<script type="text/javascript">
	s = 5;
var array = [
    {name:'hello',age:20}, 
    {name:'test',age:25},
    {name:'world',age:21},
    {name:'class',age:19}
];

var res = jQuery.grep(array, function( n, i ) {
  return ( n.age !== 25 );
});

console.log(res);
</script>
<?php
?>


