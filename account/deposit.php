<?php 

session_start();

if(!isset($_SESSION['id'])){
header("Location:../login.html");
exit();


}
include "api/classes/DBConnection.php";
include "api/classes/user.php";
include "api/classes/NewUser.php";
include "api/classes/transaction.php";
include "api/functions/db_connect.php";
include "api/functions/functions.php";

$conn = new DBConnection;
$conn->connect();

$user = new User;
$user->id = $_SESSION['id'];
$user->setDetails();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Binance</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/content.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha512-Nqct4Jg8iYwFRs/C34hjAF5og5HONE2mrrUV1JZUswB+YU7vYSPyIjGMq+EAQYDmOsMuO9VIhKpRUa7GjRKVlg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />
   
  </head>
  <body>
    <div class="sidebar">
      <ul>
        <li><a href="#">Overview</a></li>
        <li><a href="#">Fiat and Spot</a></li>
        <li><a href="#">Margins</a></li>
        <li><a href="#">Futures</a></li>
        <li><a href="#">P2P</a></li>
        <li><a href="#">Earn</a></li>
        <li><a href="#">Pool</a></li>
        <li><a href="#">Vanilla Options</a></li>
        <li><a href="#">BPLAY</a></li>
        <li><a href="#">Binance TR</a></li>
        <li><a href="#">Transaction History</a></li>
      </ul>
    </div>

    
    <div class="popup">
      <div class="box">

        <i class="fa fa-times close-btn" onclick="togglePop()"></i>
      <div class="title">Deposit Funds</div>
      <div class="feint">Deposit cryptocurrency to your wallet and start trading on the world's largest exchange</div>
      
      <div class="option">
      <div class="flex1">
      <h3>
      
        Deposit Crypto
      </h3>
      <div class="feint">
      Receive crypto from an external wallet with your wallet address or QR code to start trading
      
      </div>
      
      </div>
      
      <div class="flex2">
      
        <img src="img/depositimg.png">
      </div>
      </div>
      
      </div>
      
            </div>

    <div class="content-wrap">

      <div class="header-box hide-desktop">
        <div class="title hide-desktop">Overview</div>

        <div class="btn-group">
          <a href="#" class="gold-btn hide-desktop">Deposit</a>
          <a href="#" class="transp-btn hide-desktop">Withdraw</a>
        </div>
      </div>

      <div class="balance-box">
        <div class="name">Estimated Balance</div>

        <div class="amount">
          <div class="main"><?php echo $user->main_balance ?></div>
          <div class="crypt">BTC</div>
          <div class="equiv">≈ $0.000000</div>
        </div>
      </div>

      <div class="other flex">
   

      <div class="flex1">

      <span class="feint">Coin</span>
<select>
<option>BTC <span>Bitcoin</span></option>
<option>ETH<span>Ethereum</span></option>
<option>USDT<span>Tether</span></option>
<option>BNB</option>
<option>EOS</option>


</select>
<div class="minibal">Total balance: 	
<bold>0.00000000 BTC</bold></div>

<h4><i class="fa fa-bulb"></i>
Deposit Notice</h4>
<ul>
<li>1. If you have deposited, please pay attention to the text messages, site letters and emails we send to you.</li>
<li>2. Coins will be deposited after 1 network confirmations.</li>
<li>3. Until 2 confirmations are made, an equivalent amount of your assets will be temporarily unavailable for withdrawals.</li>
</ul>
      </div>
      <div class="flex2">
<!-- qr  code to scan here -->

<h3>Deposit Network</h3>


<span class="arrival">Average arrival time : 1 Minutes </span>

<div class="name"><span>BTC </span>Address</div><br>
<div class="qrcover">

<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=12kQMUkB9QJu9X5JP9H9M2qMUmrGtDakkV"><br>

</div>

<div class="walletaddress">12kQMUkB9QJu9X5JP9H9M2qMUmrGtDakkV</div>


<div class="info">Send Only <span>BTC </span>to this wallet address</div><br>
<div class="feint">

Sending Coin or token other than BTC to this address may result in the loss of your deposit
</div>

<img src="btcimg">


      </div>
        </div>
        <!----Box-->
        
    </div>

    <footer>
<ul>
    <h2>About Us</h2>
    <a>About</a>
    <a>Careers</a>
    <a>Business Contacts</a>
    <a></a>
</ul>



    </footer>

    <script>


var isPopOpen = true;
var popup = document.querySelector(".popup");

      function togglePop(){

if(isPopOpen == true){
  popup.style.display = "none";
  isPopOpen = false;

}
else{
  popup.style.display = "block";
  isPopOpen = true;

}

      }
    </script>
  </body>
</html>
