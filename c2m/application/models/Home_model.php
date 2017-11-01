<?php

class Home_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



           public function Saletoday()
        {
$today = date('d-m-Y',time());

$dayfrom = strtotime($today);
$dayto = strtotime($today)+86400;

$query = $this->db->query('SELECT 
SUM(sumsale_num) as sumnum,
SUM(sumsale_discount) as sumdiscount,
SUM(sumsale_price) as sumprice
 FROM sale_list_header WHERE owner_id="'.$_SESSION['owner_id'].'" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ');

return $query->result_array();


        }



          public function Productsaletoday()
        {

$today = date('d-m-Y',time());

$dayfrom = strtotime($today);
$dayto = strtotime($today)+86400;



$query = $this->db->query('SELECT 
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numall,
    (SELECT sum(sd.product_price * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricesaleall,
    (SELECT sum(sd.product_price_discount*sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricediscountall,
    (SELECT sum((sd.product_price - sd.product_price_discount) * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=wpl.product_id AND wid.owner_id="'.$_SESSION['owner_id'].'") as product_pricebaseall


    FROM wh_product_list as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'" ORDER BY product_numall DESC LIMIT 5');

return $query->result_array();

        }



          public function Customersaletoday()
        {

$today = date('d-m-Y',time());

$dayfrom = strtotime($today);
$dayto = strtotime($today)+86400;

$query = $this->db->query('SELECT 
    wpl.cus_name as name,
    (SELECT sum(sd.sumsale_num) FROM sale_list_header as sd WHERE sd.cus_id=wpl.cus_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as sumsale_num


    FROM customer_owner as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'" ORDER BY sumsale_num DESC LIMIT 5');

return $query->result_array();

        }



          public function Productoutofstock()
        {

$query = $this->db->query('SELECT 
    product_name,product_stock_num
    FROM wh_product_list
    WHERE owner_id="'.$_SESSION['owner_id'].'" 
    ORDER BY product_stock_num ASC  LIMIT 5  ');
return $query->result_array();
        }



      



    }