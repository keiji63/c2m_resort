
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
		
		<ul class="nav nav-pills">	




<li style="width: 100%;" <?php if($tab === 'user_owner'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/user_owner"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	<?=$lang_staff?> </a></li>


<li style="width: 100%;" <?php if($tab === 'brand'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/brand"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	<?=$lang_brand?> </a></li>
	


<li style="width: 100%;" <?php if($tab == 'stock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/stock">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	
<?=$lang_lookstock?></a></li>



<li style="width: 100%;" <?php if($tab === 'report_user'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/report_user"  style="font-size: 13px;"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> <?=$lang_salereportstaff?> </a></li>


<li style="width: 100%;" <?php if($tab === 'report_brand'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/report_brand"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>	<?=$lang_salereportbrand?> </a></li>
	

<li style="width: 100%;" <?php if($tab === 'returnreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/returnreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>	<?=$lang_reportreturnproduct?> </a></li>
	


	
</ul>


		</div>
	</div>

	</div>
