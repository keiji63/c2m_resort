
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="apartment_brand_id" ng-change="Selectbrand()">
<option value="0"><?=$lang_selectbrand?></option>
	<option ng-repeat="x in listbrand" value="{{x.apartment_brand_id}}">
		{{x.apartment_brand_name}}
	</option>
</select>
</div>

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_searchroomname?>" style="width: 300px;">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1','',apartment_brand_id)" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>
<br />


<center ng-if="list==''">
<h1 style="font-weight: bold;"><?=$lang_cannotfound?></h1>
</center>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_roomname?></th>
			<th style="text-align: center;"><?=$lang_brand?></th>
			<th style="text-align: center;"><?=$lang_pricerent?></th>
			<th style="text-align: center;"><?=$lang_status?></th>
		</tr>
	</thead>
	<tbody>
	

		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>

			<td>{{x.apartment_room_name}}</td>
			<td>{{x.apartment_brand_name}}</td>
	
			<td align="right">{{ x.apartment_room_price | number:2 }}</td>
			
		
			<td align="right">
			<span ng-if="x.apartment_room_status == '0'" style="color: #000;"><?=$lang_roomblank?></span>
			<span ng-if="x.apartment_room_status == '1'" style="color: orange;"><?=$lang_roomreserved?></span>
			<span ng-if="x.apartment_room_status == '2'" style="color: green;"><?=$lang_roomcheckin?></span>
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

	</div>


	<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.searchtext = '';

$scope.apartment_brand_id = '0';



$scope.getbrand = function(){

$http.get('Report_brand/getbrand')
       .then(function(response){
          $scope.listbrand = response.data; 
                 
        });
   };
$scope.getbrand();


$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage,apartment_brand_id){
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

 $http.post("Stock/Getstock",{
apartment_brand_id: apartment_brand_id,
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
          $scope.list = data.list; 
                 $scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;
        });
   };
$scope.getlist('','1','','');



$scope.Selectbrand = function(){
$scope.getlist('','1','10',$scope.apartment_brand_id);

};










});
	</script>
