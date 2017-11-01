
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">
	

	<div class="panel panel-default">
		<div class="panel-body">
		
	
		<ul class="nav nav-pills nav-sidebar">	

<li style="width: 100%;" <?php if($tab === 'salelist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salelist"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
<?=$lang_salereportall?> </a></li>




<li style="width: 100%;" <?php if($tab === 'salereport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereport?>
 </a></li>


<li style="width: 100%;" <?php if($tab === 'salecustomerreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salecustomerreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> <?=$lang_cusstatsalelist?></a></li>


<li style="width: 100%;" <?php if($tab === 'returnreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/returnreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>  
<?=$lang_reportreturnproduct?></a></li> 



<li style="width: 100%;" <?php if($tab === 'supplierreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/supplierreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
<?=$lang_salereportsupplier?></a></li>



<li style="width: 100%;" <?php if($tab === 'salesumaryreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salesumaryreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
<?=$lang_salereportsummary?></a></li>

</ul>




</div>

</div>




<div class="panel panel-default">
		<div class="panel-body">
		
	
		<ul class="nav nav-pills nav-sidebar">	

<li style="width: 100%;" <?php if($tab === 'customerscore'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/customerscore"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
<?=$lang_cuspoint?></a></li>


</ul>

</div>
</div>







</div>