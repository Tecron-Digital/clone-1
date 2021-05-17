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
    <link rel="stylesheet" href="css/library.css" />
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

      <div class="header-box hide-mobile">
        <div class="title hide-mobile">Overview</div>

        <div class="btn-group">
          <a href="#" class="gold-btn hide-mobile">Deposit</a>
          <a href="#" class="transp-btn hide-mobile">Withdraw</a>
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

      <div class="other">
        <div class="extra-box">
          <div class="row">
            <div class="name">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-124czaz"><path d="M6.093 8.889c-.567 0-1.031-.438-1.031-.972 0-.535.464-.973 1.03-.973h12.846V5H6.093C4.38 5 3 6.303 3 7.917v8.166C3 17.697 4.381 19 6.093 19H21V8.889H6.093zm12.845 8.167H6.093c-.567 0-1.031-.438-1.031-.973v-5.415c.33.107.68.165 1.03.165h12.846v6.223z" fill="currentColor"></path><path d="M15.845 12.573l-1.453 1.371 1.453 1.38 1.464-1.38-1.464-1.37z" fill="currentColor"></path></svg>   
            Fiat and Spot</div>

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
            <div class="name"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-124czaz"><path d="M20 5v6.87h-2V8.42L6.42 20 5 18.58 16.58 7h-3.43V5H20z" fill="currentColor"></path><path d="M8.17 5.02c-1.72-.01-3.12 1.39-3.13 3.11-.01 1.72 1.39 3.12 3.11 3.13 1.72.01 3.12-1.39 3.13-3.11v-.02c0-1.72-1.39-3.11-3.11-3.11zm.02 4.24c-.62.01-1.12-.49-1.13-1.11v-.02c0-.61.5-1.11 1.11-1.11.62-.01 1.12.49 1.13 1.11.01.62-.49 1.12-1.11 1.13zM19.09 14.65c-.57-.56-1.34-.9-2.2-.91-1.72 0-3.11 1.39-3.11 3.11s1.39 3.11 3.11 3.11S20 18.57 20 16.85c0-.86-.35-1.64-.91-2.2zm-2.22 3.31c-.61-.01-1.1-.5-1.1-1.11 0-.61.5-1.11 1.11-1.11h.01c.61.01 1.11.51 1.1 1.12-.01.61-.51 1.11-1.12 1.1z" fill="currentColor"></path></svg>Cross Margin</div>

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
            <div class="name">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-124czaz"><path d="M20 5v6.87h-2V8.42L6.42 20 5 18.58 16.58 7h-3.43V5H20z" fill="currentColor"></path><path d="M8.17 5.02c-1.72-.01-3.12 1.39-3.13 3.11-.01 1.72 1.39 3.12 3.11 3.13 1.72.01 3.12-1.39 3.13-3.11v-.02c0-1.72-1.39-3.11-3.11-3.11zm.02 4.24c-.62.01-1.12-.49-1.13-1.11v-.02c0-.61.5-1.11 1.11-1.11.62-.01 1.12.49 1.13 1.11.01.62-.49 1.12-1.11 1.13zM19.09 14.65c-.57-.56-1.34-.9-2.2-.91-1.72 0-3.11 1.39-3.11 3.11s1.39 3.11 3.11 3.11S20 18.57 20 16.85c0-.86-.35-1.64-.91-2.2zm-2.22 3.31c-.61-.01-1.1-.5-1.1-1.11 0-.61.5-1.11 1.11-1.11h.01c.61.01 1.11.51 1.1 1.12-.01.61-.51 1.11-1.12 1.1z" fill="currentColor"></path></svg>  
            Isolated Margin</div>

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
            <div class="name">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-124czaz"><path d="M22 7.65992L20.59 9.08001L17.36 5.85001L17.35 9.3201H17.34C17.3382 12.4146 16.1081 15.3819 13.92 17.57C11.7318 19.7582 8.76452 20.9883 5.67 20.99H3V18.99H5.67C8.23352 18.9864 10.691 17.9664 12.5037 16.1538C14.3164 14.3411 15.3364 11.8836 15.34 9.32008H15.35V5.84001L12.11 9.08001L10.69 7.66001L16.35 2.01001L22 7.65992Z" fill="currentColor"></path><path d="M4.99927 14.9915H2.99927V16.9915H4.99927V14.9915Z" fill="currentColor"></path><path d="M4.99927 10.9957H2.99927V12.9957H4.99927V10.9957Z" fill="currentColor"></path><path d="M4.99927 7H2.99927V9H4.99927V7Z" fill="currentColor"></path><path d="M18.9949 18.9915V20.9915H20.9949V18.9915H18.9949Z" fill="currentColor"></path><path d="M14.9993 18.9915V20.9915H16.9993V18.9915H14.9993Z" fill="currentColor"></path><path d="M4.99927 3.00427H2.99927V5.00427H4.99927V3.00427Z" fill="currentColor"></path></svg>
            USDⓈ-M Futures</div>

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
            <div class="name">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-124czaz"><path d="M22 7.65992L20.59 9.08001L17.36 5.85001L17.35 9.3201H17.34C17.3382 12.4146 16.1081 15.3819 13.92 17.57C11.7318 19.7582 8.76452 20.9883 5.67 20.99H3V18.99H5.67C8.23352 18.9864 10.691 17.9664 12.5037 16.1538C14.3164 14.3411 15.3364 11.8836 15.34 9.32008H15.35V5.84001L12.11 9.08001L10.69 7.66001L16.35 2.01001L22 7.65992Z" fill="currentColor"></path><path d="M4.99927 14.9915H2.99927V16.9915H4.99927V14.9915Z" fill="currentColor"></path><path d="M4.99927 10.9957H2.99927V12.9957H4.99927V10.9957Z" fill="currentColor"></path><path d="M4.99927 7H2.99927V9H4.99927V7Z" fill="currentColor"></path><path d="M18.9949 18.9915V20.9915H20.9949V18.9915H18.9949Z" fill="currentColor"></path><path d="M14.9993 18.9915V20.9915H16.9993V18.9915H14.9993Z" fill="currentColor"></path><path d="M4.99927 3.00427H2.99927V5.00427H4.99927V3.00427Z" fill="currentColor"></path></svg>  
            COIN-M Futures</div>

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
