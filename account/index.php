<?php 

session_start();
include "api/classes/DBConnection.php";
include "api/classes/user.php";
include "api/classes/NewUser.php";
include "api/classes/transaction.php";
include "api/functions/db_connect.php";
include "api/functions/functions.php";

$conn = new DBConnection;
$conn->connect();

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
          <div class="main">0.00000000</div>
          <div class="crypt">BTC</div>
          <div class="equiv">≈ $0.000000</div>
        </div>
      </div>

      <div class="other">
        <div class="extra-box">
          <div class="row">
            <div class="name">Fiat and Spot</div>

            <div class="amount">
              <div class="main">0.00000000</div>
              <div class="crypt">BTC</div>
            </div>
          </div>

          <div class="row">
            This is your spot trading account. Simply transfer funds to start trading on the world’s leading crypto exchange instantly!
          </div>

          <div class="row">
            <button class="transp-btn">Deposit</button>
            <button class="transp-btn">Transfer</button>
          </div>
        </div>
        <!----Box-->
        <div class="extra-box">
          <div class="row">
            <div class="name">Cross Margin</div>

            <div class="amount">
              <div class="main">0.00000000</div>
              <div class="crypt">BTC</div>
            </div>
          </div>

          <div class="row">
            Trade assets using funds provided by a third party with a Margin Account. Transfer funds to your Margin Account to start trading!
          </div>

          <div class="row">
            <button class="transp-btn">Transfer</button>
          </div>
        </div>
        <!---Box-->
        <div class="extra-box">
          <div class="row">
            <div class="name">Isolated Margin</div>

            <div class="amount">
              <div class="main">0.00000000</div>
              <div class="crypt">BTC</div>
            </div>
          </div>

          <div class="row">
            Trade assets using funds provided by a third party with a Margin Account. Transfer funds to your Margin Account to start trading!
          </div>

          <div class="row">
            <button class="transp-btn">View</button>
          </div>
        </div>
        <!----box-->
        <div class="extra-box">
          <div class="row">
            <div class="name">USDⓈ-M Futures</div>

            <div class="amount">
              <div class="main">0.00000000</div>
              <div class="crypt">BTC</div>
            </div>
          </div>

          <div class="row">
            Transfer USDT to your USDⓈ-M Futures account to trade USDT margined futures with no expiration and up to 125x leverage.
          </div>

          <div class="row">
      
            <button class="transp-btn">Activate</button>
          </div>
        </div>
        <!---box-->
        <div class="extra-box">
          <div class="row">
            <div class="name">COIN-M Futures</div>

            <div class="amount">
              <div class="main">0.00000000</div>
              <div class="crypt">BTC</div>
            </div>
          </div>

          <div class="row">
            Transfer funds to your Coin-Ⓜ Futures account to trade coin margined futures with or without expiry dates and up to 125x leverage.
          </div>

          <div class="row">
            <button class="transp-btn">Activate</button>
          </div>
        </div>
        <!---box-->
      </div>
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
