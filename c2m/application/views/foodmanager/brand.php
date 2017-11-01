
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()">
<?=$lang_addbrand?> +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="<?=$lang_search?>" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover">
	<thead  style="background-color: #eee;">
		<tr>
			<th><?=$lang_brandname?></th>
			<th><?=$lang_address?></th>
			<th><?=$lang_tax?></th>
			<th style="width: 10px;"><?=$lang_edit?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
			<td>{{x.food_brand_name}}</td>
			<td>
			{{x.food_brand_address}}
			


, <?=$lang_tel?>: {{x.food_brand_tel}}
			</td>
			<td>{{x.food_brand_tax_number}}</td>
			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><?=$lang_edit?></button>
			</td>
		</tr>
		
	</tbody>
</table>
<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> 
<?=$lang_downloadexcel?> </button>

</div>
</div>




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addbrand?></h4>
			</div>
			<div class="modal-body">
				






<fieldset>
                    <div class="form-group">
			    		    <input class="form-control" minlength="4" placeholder="<?=$lang_brandname?>" ng-model="food_brand_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

<div class="form-group">
			    		    <input class="form-control" minlength="4" placeholder="<?=$lang_tax?>" ng-model="food_brand_tax_number" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


<div class="form-group">
	<textarea name="food_brand_address" class="form-control" placeholder="<?=$lang_address?>" ng-model="food_brand_address" style="height: 70px;font-size: 20px;">
</textarea> 
</div>

	



 <div class="col-md-12">
			    		<br />
			    		</div>


 <div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_tel?>" ng-model="food_brand_tel" type="text" style="height: 50px;font-size: 20px;">
			    		</div>
	

			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Addbrand()" value="<?=$lang_addbrand?>" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Editbrand()" value="<?=$lang_confirm?>" ng-show="foredit">

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

$scope.food_brand_name = '';
$scope.food_brand_tax_number  = '';
$scope.food_brand_address = '';
$scope.food_brand_tel  = '';


$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;
};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.food_brand_id = x.food_brand_id;
$scope.food_brand_name = x.food_brand_name;
$scope.food_brand_tax_number = x.food_brand_tax_number;
$scope.food_brand_address = x.food_brand_address;
$scope.food_brand_tel = x.food_brand_tel;

};


$scope.get = function(){
   
$http.get('Brand/get')
       .then(function(response){
          $scope.list = response.data; 
                 
        });
   };
$scope.get();



$scope.Addbrand = function(){

if($scope.food_brand_name != '' && $scope.food_brand_address != '' && $scope.food_brand_tel != ''){
$http.post("Brand/Add",{
	food_brand_name: $scope.food_brand_name,
	food_brand_tax_number: $scope.food_brand_tax_number,
	food_brand_address: $scope.food_brand_address,
	food_brand_tel: $scope.food_brand_tel
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
        });	
}else{
	toastr.warning('<?=$lang_plz?>');
}


};




$scope.Editbrand = function(){
	if($scope.food_brand_name != '' && $scope.food_brand_address != '' && $scope.food_brand_tel != ''){
$http.post("Brand/Edit",{
	food_brand_id: $scope.food_brand_id,
	food_brand_name: $scope.food_brand_name,
	food_brand_tax_number: $scope.food_brand_tax_number,
	food_brand_address: $scope.food_brand_address,
	food_brand_tel: $scope.food_brand_tel
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