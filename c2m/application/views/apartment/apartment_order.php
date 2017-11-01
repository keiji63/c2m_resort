
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">
	

<center>

<button style="color:#000;background-color: #fff;width: ;height: ;">
 <?=$lang_roomblank?>
</button>
  <button style="color:#fff;background-color: orange;width:;height: ;">
   <?=$lang_roomreserved?> </button>   
  <button style="color:#fff;background-color: green;width: ;height: ;"> 
  <?=$lang_roomcheckin?></button>
<br /><br />
<input type="text" ng-model="searchroom" placeholder="<?=$lang_searchroomnameandcus?>" class="form-control" style="width: 200px;">
<hr />
	<div class="btn btn-default" style="width: 200px;" ng-repeat="x in categorylist | filter:searchroom"   ng-click="Openorder(x)">

<div ng-if="x.apartment_room_status=='0'" style="color:#000;background-color: #fff;width: 100%;height: 100%;">
<h1 style="font-weight: bold;">{{x.apartment_room_name}}</h1>

			<h4>{{x.apartment_room_num}} <?=$lang_bed?></h4>
			<h4><?=$lang_price?>: {{x.apartment_room_price | number}}</h4>
			<h4><?=$lang_cus?>: {{x.apartment_order_customer_name}}</h4>
</div>

<div ng-if="x.apartment_room_status=='1'" style="color:#fff;background-color: orange;width: 100%;height: 100%;">

			<h1 style="font-weight: bold;">{{x.apartment_room_name}}</h1>

			<h4>{{x.apartment_room_num}} <?=$lang_bed?></h4>
			<h4><?=$lang_price?>: {{x.apartment_room_price | number}}</h4>
			<h4><?=$lang_cus?>: {{x.apartment_order_customer_name}}</h4>
</div>


<div ng-if="x.apartment_room_status=='2'" style="color:#fff;background-color: green;width: 100%;height: 100%;">

			<h1 style="font-weight: bold;">{{x.apartment_room_name}}</h1>

			<h4>{{x.apartment_room_num}} <?=$lang_bed?></h4>
			<h4><?=$lang_price?>: {{x.apartment_room_price | number}}</h4>
			<h4><?=$lang_cus?>: {{x.apartment_order_customer_name}}</h4>
</div>








<BR />

		</div>
</center>

<hr />









<div class="modal fade" id="Openorder">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
			<center>
				<h2 style="font-weight: bold;"><?=$lang_room?> {{apartment_room_name}}</h2>
</center>




<?=$lang_cusname?>: <input type="text" ng-model="apartment_order_customer_name" class="form-control" placeholder="<?=$lang_cusname?>">

<br />

<?=$lang_tel?>: <input type="text" ng-model="apartment_order_customer_tel" placeholder="<?=$lang_tel?>" class="form-control">


<br />
<?=$lang_numcus?>: <input type="text" ng-model="apartment_order_num" placeholder="<?=$lang_numcus?>" class="form-control">

<br />
<?=$lang_roomprice?>: <input type="text" ng-model="apartment_order_price" placeholder="<?=$lang_roomprice?>" class="form-control">


<hr />

<center>
<button ng-click="Booking()" ng-if="apartment_room_status=='0'" class="btn btn-default btn-lg" style="font-size: 20px;"><?=$lang_rent?></button>




<button ng-click="Checkin()" ng-if="apartment_room_status=='1'" class="btn btn-warning" style="font-size: 20px;"><?=$lang_checkin?></button>


<button ng-click="Checkout()" ng-if="apartment_room_status=='2'" class="btn btn-primary" style="font-size: 20px;"><?=$lang_checkout?></button>




</center>


				

				
			</div>
			<div class="modal-footer">
			<button class="btn btn-default" style="float: left;" ng-click="Blanktable()">ห้องว่าง</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
</div>





















	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.howmanypeople = '1';

$scope.get_room = function(){
   
$http.get('Apartment_order/get_room')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get_room();



$scope.Get_order = function(){
$http.post("Apartment_order/get_order",{
apartment_room_id: $scope.apartment_room_id
	}).success(function(response){
$scope.roomlist = response;

if($scope.roomlist != ''){
$scope.apartment_order_num = $scope.roomlist[0].apartment_order_num;
$scope.apartment_order_price = $scope.roomlist[0].apartment_order_price;
$scope.apartment_order_customer_name = $scope.roomlist[0].apartment_order_customer_name;
$scope.apartment_order_customer_tel = $scope.roomlist[0].apartment_order_customer_tel;
}else{
	$scope.apartment_order_num = '0';
$scope.apartment_order_price = '0';
$scope.apartment_order_customer_name = '';
$scope.apartment_order_customer_tel = '';
}



        });	
};



$scope.Openorder = function(x){

$scope.apartment_room_id = x.apartment_room_id;
$scope.apartment_room_name = x.apartment_room_name;
$scope.apartment_room_status = x.apartment_room_status;

$('#Openorder').modal('show');

$scope.Get_order();
	

};


$scope.Blanktable = function(){
	
$http.post("Apartment_order/Blanktable",{
apartment_room_id: $scope.apartment_room_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_room();
$('#Openorder').modal('hide');
        });	

};



$scope.Booking = function(){
	
$http.post("Apartment_order/Booking",{
apartment_room_id: $scope.apartment_room_id,
apartment_order_customer_name: $scope.apartment_order_customer_name,
apartment_order_customer_tel: $scope.apartment_order_customer_tel,
apartment_order_num: $scope.apartment_order_num,
apartment_order_price: $scope.apartment_order_price
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_room();
$('#Openorder').modal('hide');
        });	

};



$scope.Checkin = function(){
	
$http.post("Apartment_order/Checkin",{
apartment_room_id: $scope.apartment_room_id,
apartment_order_customer_name: $scope.apartment_order_customer_name,
apartment_order_customer_tel: $scope.apartment_order_customer_tel,
apartment_order_num: $scope.apartment_order_num,
apartment_order_price: $scope.apartment_order_price
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_room();
$('#Openorder').modal('hide');
        });	

};



$scope.Checkout = function(){
	
$http.post("Apartment_order/Checkout",{
apartment_room_id: $scope.apartment_room_id,
apartment_order_customer_name: $scope.apartment_order_customer_name,
apartment_order_customer_tel: $scope.apartment_order_customer_tel,
apartment_order_num: $scope.apartment_order_num,
apartment_order_price: $scope.apartment_order_price
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_room();
$('#Openorder').modal('hide');
        });	

};












});
	</script>
