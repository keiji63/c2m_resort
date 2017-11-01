<?php
if($_SESSION['user_type']=='1'){
	echo '<script>
window.location = "'.$base_url.'/sale/salepage";
	</script>';
	}?>


<?php 
if($_SESSION['user_type']=='2'){
		echo '<script>
window.location = "'.$base_url.'/warehouse/stock";
	</script>';
	}
	?>

<style type="text/css">
	body{
		background-color: #eee;
	}
</style>
<div class="container text-center">

<div class="col-md-12">

<br />

<div class="col-md-6">

<div class="col-md-6 panel panel-warning" style="height: 170px;">
<br />
<b><?=$lang_saletoday?></b>
<br />
<?php 
foreach ($saletoday as $key => $value) {
	
	echo '<h3>'.$lang_qty.': <font color="green">'.number_format($value['sumnum']).'</font>';
echo '<br /><br />';
	echo ''.$lang_income.': <font color="green">'.number_format($value['sumprice'] - $value['sumdiscount']).'</font></h3>';

}
 ?>

</div>

<div class="col-md-6 panel panel-warning" style="text-align: left;height: 170px;">
<br />
<center><b><?=$lang_productsaletoday?></b></center>

<table width="100%">

<?php 
$i = 1;
foreach ($productsaletoday as $key => $value) {
	echo '<tr>';
	echo '<td>'.$i.'. '.$value['product_name'].'</td><td align="right">'.$value['product_numall'].'</td>';
echo '</tr>';

$i++;
}
 ?>
 </table>
</div>

<div class="col-md-6 panel panel-warning"  style="text-align: left;height: 170px;">
<br />
<center><b><?=$lang_cussaletoday?></b></center>
<table width="100%">

<?php 
$i = 1;
foreach ($customersaletoday as $key => $value) {
	echo '<tr>';
	echo '<td>'.$i.'. '.$value['name'].'</td><td align="right">'.$value['sumsale_num'].'</td>';
echo '</tr>';

$i++;
}
 ?>
 </table>
</div>


<div class="col-md-6 panel panel-warning"  style="text-align: left;height: 170px;">
<br />
<center><b><?=$lang_productwillout?></b></center>

<table width="100%">

<?php 
$i = 1;
foreach ($productoutofstock as $key => $value) {
	echo '<tr>';
	echo '<td>'.$i.'. '.$value['product_name'].'</td><td align="right">'.$value['product_stock_num'].'</td>';
echo '</tr>';

$i++;
}
 ?>
 </table>
</div>



</div>

<div class="col-md-6">

<a href="<?php echo $base_url;?>/sale/salepic" class="btn btn-warning"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salepic?>	
</a>

<a href="<?php echo $base_url;?>/sale/salepage" class="btn btn-warning"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-record" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salelist?>	
</a>



<a href="<?php echo $base_url;?>/sale/product_return" class="btn btn-default"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-refresh" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_returnproduct?>	
</a>


<hr />

<a href="<?php echo $base_url;?>/warehouse/stock" class="btn btn-success"  style="font-size: 15px;font-weight: bold;width: 150px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_stockstore?>		
</a>



<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-primary" style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_cusandcontact?>	
</a>



<a href="<?php echo $base_url;?>/sale/salelist" class="btn btn-danger"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salereport?>	
</a>


<hr />


<a href="<?php echo $base_url;?>/salesetting/discount" class="btn btn-default"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salesetting?>
</a>


<a href="<?php echo $base_url;?>/marketing/email" class="btn btn-default"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-envelope" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_emailmarketting?>
</a>


</div>

<hr />

</div>
</div>