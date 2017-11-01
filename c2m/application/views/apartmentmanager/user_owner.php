
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()"><?=$lang_addstaff?> +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="ค้นหา" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover">
	<thead  style="background-color: #eee;">
		<tr>
		<th style="width: 10px;"><?=$lang_rank?></th>
			<th><?=$lang_staffname?></th>
			<th><?=$lang_email?></th>
			<th><?=$lang_password?></th>
			<th>สาขา</th>
			<th style="width: 10px;"><?=$lang_edit?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
		<td>{{$index+1}}</td>
			<td>{{x.name}}</td>
			<td>{{x.user_email}}</td>
			<td>{{x.user_password}}</td>
			<td>
			{{x.apartment_brand_name}}
			
			</td>
			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><?=$lang_edit?></button>
			</td>
		</tr>
		
	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>



</div>
</div>




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addstaff?></h4>
			</div>
			<div class="modal-body">
				






<fieldset>
                    <div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_staffname?>" ng-model="user_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>



<div class="form-group">
	<select id="" class="form-control" ng-model="apartment_brand_id" style="height: 50px;font-size: 20px;">
		<option value="0"><?=$lang_selecestaff?></option>
		<option ng-repeat="a in listbrand" value="{{a.apartment_brand_id}}">{{a.apartment_brand_name}}</option>
	</select>
</div>


<div class="form-group">
			    		    <input ng-disabled="foredit" class="form-control" placeholder="<?=$lang_email?>" ng-model="user_email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_password?>" ng-model="user_password" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

	

			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Adduser()" value="<?=$lang_addstaff?>" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Edituser()" value="<?=$lang_confirm?>" ng-show="foredit">

			    	</fieldset>








			</div>
			<div class="modal-footer">
				
				
			</div>
		</div>
	</div>
</div>



</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.bankaccount = '';
$scope.cfwd = false;
$scope.foredit = false;



$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;

$scope.apartment_brand_id = '0';
$scope.user_email = '';
$scope.user_name = '';
$scope.user_password = '';

};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.user_id = x.user_id;
$scope.apartment_brand_id = x.apartment_brand_id;
$scope.user_name = x.name;
$scope.user_email = x.user_email;
$scope.user_password = x.user_password;

};


$scope.get = function(){
   
$http.get('User_owner/get')
       .then(function(response){
          $scope.list = response.data; 
                 
        });
   };
$scope.get();


$scope.getbrand = function(){
   
$http.get('<?php echo $base_url;?>/apartmentmanager/Brand/get')
       .then(function(response){
          $scope.listbrand = response.data; 
                 
        });
   };
$scope.getbrand();



$scope.Adduser = function(){


	if($scope.user_email != '' && $scope.apartment_brand_id != '0' && $scope.user_name != '' && $scope.user_password != ''){
$http.post("User_owner/Add",{
	apartment_brand_id: $scope.apartment_brand_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password
	
	}).success(function(data){


if(data=='dup'){
	toastr.warning('<?=$lang_cannotusethisemail?>');
}else{
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
}



        });	


	}else{
	toastr.warning('<?=$lang_plz?>');
}




};




$scope.Edituser = function(){

	if($scope.user_email != '' && $scope.apartment_brand_id != '0' && $scope.user_name != '' && $scope.user_password != ''){
	

$http.post("User_owner/Edit",{
	
    user_id: $scope.user_id,
    apartment_brand_id: $scope.apartment_brand_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password

	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
        });	

	}else{
	toastr.warning('<?=$lang_plz?>');
}




};




   


});
	</script>