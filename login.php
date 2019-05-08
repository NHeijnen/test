<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
    box-sizing: border-box;
}
.header {
    background-color: green;
    color: white;
    padding: 15px;
}

.titel {
    text-align: center;
    
}

.column {
    float: left;
    padding: 15px;
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
.menu {
    width: 25%;
}
.content {
    width: 50%;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 5px;
    margin-bottom: 8px;
    background-color: #28e20b;
    color: #ffffff;
}
.menu li:hover {
    background-color: #28e20b;
}

.button {
    background-color: #28e20b;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>

<div class="header">
     <div class="titel">
         <img src="images/flowerpower.jpg" width="80" height="80">
    </div>
  
  
  <div class="titel">
    <h1> FlowerPower </h1>
    Ingelogd als:
    <div style="padding-left: 5px; padding-top: 5px;"><?php if(isset($_SESSION['gebruikersnaam'])) { echo $_SESSION['gebruikersnaam'];} else { echo "niet ingelogd"; } ?><?php if(isset($_SESSION['gebruikersnaammed'])) { echo $_SESSION['gebruikersnaammed'];} ?></div>
  </div>
 
  
</div>
    
<div class="clearfix">
  <div class="column menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php
        if(!isset($_SESSION['gebruikersnaam'])) : //check of er is ingelogd
        ?>
        <li><a href="login.php">Inloggen klanten</a></li>
        <li><a href="loginmedewerkers.php">Inloggen medewerkers</a></li>
        <?php
        else:
        ?>
        <li><a href="account.php">Account</a></li>
        <li><a href="logout.php">Uitloggen</a></li>
        
        <?php
        endif;
        ?>
        <?php
        if(!isset($_SESSION['gebruikersnaammed'])) : //check of er is ingelogd
        ?>
        <?php
        else:
        ?>
        <li><a href="artikelentoevoegen.php">Artikelen toevoegen</a></li>
        <li><a href="overzichtartikelen.php">Overzicht artikelen</a></li>
        <li><a href="account.php">Account</a></li>
        <li><a href="logout.php">Uitloggen</a></li>
        
        <?php
        endif;
        ?>
    </ul>
  </div>

  <div class="column content">
      <head>
<meta charset="utf-8">
<title>Inloggen klanten</title>
<link rel="stylesheet" href="loginstyle.css" />
</head>
<body>
<?php
require('db.php');

if (isset($_POST['gebruikersnaam'])){
    
	$gebruikersnaam = stripslashes($_REQUEST['gebruikersnaam']);
	$gebruikersnaam = mysqli_real_escape_string($con,$gebruikersnaam);
	$wachtwoord = stripslashes($_REQUEST['wachtwoord']);
	$wachtwoord = mysqli_real_escape_string($con,$wachtwoord);
	
        $query = "SELECT * FROM klant WHERE gebruikersnaam='$gebruikersnaam'
and wachtwoord='".md5($wachtwoord)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Gebruikersnaam/Wachtwoord is onjuist.</h3>
<br/>Klik hier om in te loggen <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Inloggen klanten</h1>
<form action="" method="post" name="login">
    <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" required />
    <input type="password" name="wachtwoord" placeholder="Wachtwoord" required />
    <input name="submit" type="submit" value="Login" />
</form>
<p>Nog geen account? <a href='register.php'>Registreer hier</a></p>
</div>
<?php } ?>
</body>

</div>
</div>

</body>
</html>
