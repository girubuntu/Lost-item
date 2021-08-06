
<?php include('inc/header.php');

require('config/config.php');
require('config/db.php');

// Collecting data from query string

$item_id=$_GET['item_id'];

// Checking data it is a number or not
if(!is_numeric($item_id)){
echo "Data Error";
exit;
}  

$query =  "SELECT * FROM `founditem` WHERE `id` = '{$item_id}'";
$result = mysqli_query($conn,$query);

$post = mysqli_fetch_array($result,MYSQLI_ASSOC);

echo $post[1];
mysqli_free_result($result);


mysqli_close($conn);

?>
<head>
    <link rel="stylesheet" href="./css/itemDetails.php.css">
    <title>Item Details</title>
</head>

<main class='container-fluid mb-5'>
<h4><?php echo $post['item_name'];?></h4>

</main>

<!--footer-->
    
<?php include('inc/footer.php'); ?>