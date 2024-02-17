<!DOCTYPE html>
<html>

<head>

	<title> Nexus Bank </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
		.img1 {
			background-size: cover;
			background-repeat: no-repeat;
			width: 100%;
			height: auto;
			margin-top: -1px;
			margin-left: -1px;
		}

		ul.menu {
			list-style-type: none;
			margin: 0px;
			padding: -10px;
			width: device-width;
			height: auto;
			overflow: hidden;
			background-color: white;
		}

		.rectangle {

			height: 110px;
			width: 410px;
			background-color: gray;
			margin-top: -80px;
			margin-left: -80px;
			border-top-right-radius: 8px;
			border-top-left-radius: 8px;
		}

		.img2 {
			margin: 0px 50px;
		}

		.container {
			padding: 80px;
			padding-bottom: 0px;
			margin: 90px 150px;
			width: 250px;
			background-color: rgba(255, 255, 255, 0.9);
			float: right;
			border-width: 5px;
			border-style: inset;
			border-color: black;
			border-radius: 15px;
		}

		.bill {
			margin-top: -85px;
			margin-bottom: 50px;
			font-size: 45px;
			color: orange;
		}

		.customername {
			padding: 4px;
			margin-top: 5px;
			margin-right: 300px;
			margin-bottom: 30px;
		}

		.billtype {
			margin-left: 10px;
			height: 25px;
			width: 120px;
			border-width: 2px;
			background-color: #ddd;
			margin-bottom: 10px;
			margin-top: 5px;
		}

		.billnumber {
			padding: 4px;
			margin-top: 0px;
			margin-right: 300px;
			margin-bottom: 30px;
		}

		.cancel {
			margin-left: 0px;
			margin-bottom: 50px;
			margin-top: 30px;
			border-width: 3px;
			background-color: orange;
			font-size: 25px;
			width: 100px;
			height: 50px;
			border-radius: 15px;
		}

		.pay {
			margin-left: 40px;
			margin-bottom: 50px;
			margin-top: 30px;
			border-width: 3px;
			background-color: orange;
			font-size: 25px;
			width: 100px;
			height: 50px;
			border-radius: 15px;
		}


		@keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        body {
            animation: fadeIn 1s ease forwards;
        }

	</style>

</head>

<body background="../Mini Project Code/images/paying-with-credit-card-online.jpg" width="460px" height="345px" class="img1">


	<ul class="menu">
		<a href="RegisterCustomerHomePage.html"><img src="../Mini Project Code/images/Screenshot 2023-12-19 112744.png" align="left" width="150px" height="80px" class="img2"></a><br><br><br>
	</ul>


	<form>

		<div class="container">

			<div class="rectangle"></div>

			<h1 align="center" class="bill">Bill Payment</h1><br>

			<label>CUSTOMER NAME :</label><br>
			<input type="text" placeholder="Enter Name" class="customername"><br>

			<label>CUSTOMER PHONE NUMBER :</label><br>
			<input type="tel" placeholder="Enter Phone Number" class="customername"><br>

			BILL TYPE:<select name="Type" class="billtype">
				<option value="electricitty">Electricity Bill</option>
				<option value="water">Water Bill</option>
				<option value="telephone">Telephone Bill</option>
			</select><br><br>

			<label>BILL NUMBER :</label><br>
			<input type="text" placeholder="Enter Bill Number" class="billnumber"><br>

			<label>AMOUNT:</label><br>
			<input type="text" placeholder="Enter Amount(Rs.)" class="customername"><br>

			<a href="RegisterCustomerHomepage.html"><button type="button" class="cancel"> Cancel </button></a>
			<button type="button" class="pay"> Pay </button><br>


		</div>

	</form>


</body>

</html>