<?php 

  function setLanguage()
  {
  	if (isset($_GET['lan'])) {
  		if ($_GET['lan'] == 'esp') {
  			require_once ('language/ESP.php');
  		}elseif ($_GET['lan'] == 'fr') {
  			require_once ('language/FR.php');
  		}else {
  			require_once ('language/EN.php');
  		}
  	}
  	else {
  			require_once ('language/EN.php');
  		}
  }
  function setLanguageS()
  {
    if (isset($_COOKIE['lan'])) {
      if ($_COOKIE['lan'] == 'esp') {
        require_once ('language/ESP.php');
      }elseif ($_COOKIE['lan'] == 'fr') {
        require_once ('language/FR.php');
      }else {
        require_once ('language/EN.php');
      }
    }
    else {
        require_once ('language/EN.php');
      }
  }
      
      if(!isset($_COOKIE['lan'])){
        if (isset($_GET['lan'])) {
        setcookie('lan', $_GET['lan'], time() + (86400 * 30), "/"); 
        setLanguage();} else{
          setLanguage();
        }
      }elseif(isset($_COOKIE['lan'])) {
        if(isset($_GET['lan'])){
          setLanguage();
         setcookie('lan', $_GET['lan'], time() + (86400 * 30), "/");    
        }else {setLanguageS();
      }}
?>