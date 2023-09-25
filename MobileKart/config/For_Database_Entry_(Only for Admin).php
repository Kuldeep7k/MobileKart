<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	</title>
</head>
<body>
	<div id="wrapper">
		<h1> Enter Products Details</h1>
		<div id="main" class="shadow-box">
			<div id="content">
				<?php
				// check to see if the form was submitted
				if (isset($_POST['addBtn'])) {

					/* 
              <?php echo $result['product_name']; ?>
              <?php echo $result['brand']; ?>
              <?php echo  $result['model']; ?>
              <?php echo  $result['price'];  ?>
              <?php echo  $result['dprice']; ?>
              <?php echo  $result['network']; ?>
              <?php echo $result['storage']; ?>
              <?php echo $result['processor']; ?>
              <?php echo  $result['cameras']; ?>
              <?php echo  $result['battery']; ?>
              <?php echo  $result['display']; ?>
              <?php echo  $result['os']; ?>
                    <?php echo $result['images']; ?>
              */

					// get all the form data
					$pname = htmlspecialchars($_POST['pname']);
					$brand = htmlspecialchars($_POST['brand']);
					$model = htmlspecialchars($_POST['model']);
					$price = htmlspecialchars($_POST['price']);
					$dprice = htmlspecialchars($_POST['dprice']);
					$network = htmlspecialchars($_POST['network']);
					$storage = htmlspecialchars($_POST['storage']);
					$processor = htmlspecialchars($_POST['processor']);
					$cameras = htmlspecialchars($_POST['cameras']);
					$battery = htmlspecialchars($_POST['battery']);
					$display = htmlspecialchars($_POST['display']);
					$os = htmlspecialchars($_POST['os']);
					$keywords = htmlspecialchars($_POST['keywords']);
					$producturl = htmlspecialchars($_POST['producturl']);
					$file = $_FILES['photo'];
					$filename = $file['name'];
					$filepath = $file['tmp_name'];
					$filerror = $file['error'];
					if ($filerror == 0) {
						$destfile = 'img/models/' . $filename;
						//echo "$destfile";
						move_uploaded_file($filepath, $destfile);
					}
				}
				// make sure all the form data was submitted
				if (
					$pname &&
					$brand &&
					$model &&
					$price &&
					$dprice &&
					$network &&
					$storage &&
					$processor &&
					$cameras &&
					$battery &&
					$display &&
					$os &&
					$keywords
				) {
					// setup some vars

					// CONNECT TO THE DB
					$hostname = "localhost";
					$username = "root";
					$pd = "";
					$dbname = "mobilekart";

					$con = mysqli_connect($hostname, $username, $pd, $dbname) or die("Database connection not established.");

					mysqli_query($con, "INSERT INTO products (product_name,brand,model,
							 price,dprice,network,storage,processor,cameras,battery,display,os,keywords,images,url) VALUES
							 ('$pname'
                               ,'$brand'
                               ,'$model'
                               ,'$price'
                               ,'$dprice'
                               ,'$network'
                               ,'$storage'
                               ,'$processor'
                               ,'$cameras'
                               ,'$battery'
                               ,'$display'
                               ,'$os','$keywords','$destfile','$producturl')");

					// make sure entry was created
					if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM products WHERE product_name='$pname'"))) {
						echo 'New entry was added';
					} else
						echo 'An error occured. No new entry was added.';
				} else
					echo 'Please provided all data. The entire form is required.';
				?>
				<form action="" method="POST" name="" enctype="multipart/form-data">
					<table>
						<tr><br>
						</tr>
						<tr>
							<td>product_name:</td>
							<td><input type="text" size="100" name="pname" value="<?php echo isset($pname) ? $pname : ""; ?>" /></td>
						</tr>
						<tr>
							<td>brand:</td>
							<td><input type="text" size="100" name="brand" value="<?php echo isset($brand) ? $brand : ""; ?>" /></td>
						</tr>
						<tr>
							<td>model:</td>
							<td><input type="text" size="100" name="model" value="<?php echo isset($model) ? $model : ""; ?>" /></td>
						</tr>
						<tr>
							<td>price:</td>
							<td><input type="text" size="100" name="price" value="<?php echo isset($price) ? $price : ""; ?>" /></td>
						</tr>
						<tr>
							<td>dprice:</td>
							<td><input type="text" size="100" name="dprice" value="<?php echo isset($dprice) ? $dprice : ""; ?>" /></td>
						</tr>
						<tr>
							<td>network:</td>
							<td><input type="text" size="100" name="network" value="<?php echo isset($network) ? $network : ""; ?>" /></td>
						</tr>
						<tr>
							<td>storage:</td>
							<td><input type="text" size="100" name="storage" value="<?php echo isset($storage) ? $storage : ""; ?>" /></td>
						</tr>
						<tr>
							<td>processor:</td>
							<td><input type="text" size="100" name="processor" value="<?php echo isset($processor) ? $processor : ""; ?>" /></td>
						</tr>
						<tr>
							<td>cameras:</td>
							<td><input type="text" size="100" name="cameras" value="<?php echo isset($cameras) ? $cameras : ""; ?>" /></td>
						</tr>
						<tr>
							<td>battery:</td>
							<td><input type="text" size="100" name="battery" value="<?php echo isset($battery) ? $battery : ""; ?>" /></td>
						</tr>
						<tr>
							<td>display:</td>
							<td><input type="text" size="100" name="display" value="<?php echo isset($display) ? $display : ""; ?>" /></td>
						</tr>
						<tr>
							<td>os:</td>
							<td><input type="text" size="100" name="os" value="<?php echo isset($os) ? $os : ""; ?>" /></td>
						</tr>
						<tr>
							<td>keywords:</td>
							<td><input type="text" size="100" name="keywords" value="<?php echo isset($keywords) ? $keywords : ""; ?>" /></td>
						</tr>
						<tr>
							<td>producturl:</td>
							<td><input type="text" size="100" name="producturl" value="<?php echo isset($producturl) ? $producturl : ""; ?>" /></td>
						</tr>
						<tr>
							<td>image:</td>
							<td><input type="file" size="100" name="photo" value="<?php echo isset($photo) ? $photo : ""; ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="addBtn" value="Add Entry" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>