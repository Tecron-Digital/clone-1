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

    <link rel="stylesheet" href="../static/styles.css">
    <link rel="icon" href="../static/logo/binance_icon.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js' integrity='sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' integrity='sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==' crossorigin='anonymous' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' integrity='sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==' crossorigin='anonymous' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.1/tailwind.min.css' integrity='sha512-BAK6UB671tmfzrkeH1CacTvgHQ3aLAFnT2KsigdATsc5X7+3u42tb5vjmAoDiqtxphP5dNZ3cDygivTsGEJhGw==' crossorigin='anonymous' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/content.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha512-Nqct4Jg8iYwFRs/C34hjAF5og5HONE2mrrUV1JZUswB+YU7vYSPyIjGMq+EAQYDmOsMuO9VIhKpRUa7GjRKVlg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />
   
  </head>
  <body>
  <nav class="navbar navbar-dark navbar-expand-md head-text" style="z-index: 2000;">
        <div class="navbar-brand">
            <div class="mt-1 pt-1">
                <img src="../static/logo/logo-1.png" alt="logo" height="20" class="image mb-2 pl-2" loading="lazy">
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown pr-2 pl-1">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-th"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item py-2 text-sm" href="#">Action 1</a>
                        <a class="dropdown-item py-2 text-sm" href="#">Another action</a>
                        <a class="dropdown-item py-2 text-sm" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown pr-1 pl-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Buy Crypto
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Bank Deposit</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Credit/Debit Card</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>P2P Trading</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Third-Party Management</a>
                    </div>
                </li>

                <li class="nav-item pr-1 pl-1">
                    <a class="nav-link" href="#">Markets</a>
                </li>

                <li class="nav-item dropdown pr-1 pl-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Trade
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Convert</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Classic</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Advanced</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Margin</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>P2P</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Stock Token</a>
                    </div>
                </li>

                <li class="nav-item dropdown pr-1 pl-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Derivatives
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>USD$-M Futures</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>COIN-M Futures</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Vanilla Options</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Leveraged Tokens</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Battle</a>
                    </div>
                </li>

                <li class="nav-item dropdown pr-1 pl-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Finance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Binance Earn</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Binance Pool</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Binance Visa Card</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Crypto loans</a>
                        <a class="dropdown-item py-2 text-sm" href="#"><i class="bi bi-suit-diamond-fill text-yellow-400 diamond-size pr-2"></i>Liquid Swap</a>
                    </div>
                </li>
            </ul>
            <div class="ml-auto">
                <ul class="navbar-nav">

                <?php  if(!isset($_SESSION["Logged In"])){  ?>
                    <li class="nav-item pr-3 mr-1">
                        <a class="nav-link" href="login.html">Log In</a>
                    </li>
                    <li class="nav-item pl-1 pr-2">
                        <a class="nav-link btn btn-sm btn-warning button-navs" href="register.html">Register</a>
                    </li>

                    <?php }  else {?>
                    
                      <li class="nav-item pr-3 mr-1">
                        <a class="nav-link" href="login.html">
                        <i class="fa fa-user"></i>
                        </a>
                    </li>



                      <?php }?>
                    <li class="nav-item pl-1 pr-2">
                        <a class="nav-link" href="#">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">English</a>
                    </li>
                    <span class="navbar-text">
                            |
                        </span>
                    <li class="nav-item">
                        <a class="nav-link" href="#">USD</a>
                    </li>
                </ul>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    </nav>

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

<img src="btc.png">


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
