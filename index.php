<?php 

if(isset($_GET['p'])){

    $p = $_GET['p'];

}else{

    $p = 'home';
}

ob_start();

if($p === 'home'){

    require 'inc/home.php';

}
elseif($p === 'aboutus'){

    require 'inc/aboutus.php';
}
elseif($p === 'appbookings'){

    require 'inc/appbook.php';
}
elseif($p === 'onlinebookings'){

    require 'inc/onlinebook.php';
}
elseif($p === 'rates'){

    require 'inc/rates.php';
}
elseif($p === 'contactus'){

    require 'inc/contact.php';
}
elseif($p == 'help'){

    require 'help/index.php';
}

$content = ob_get_clean();

require 'inc/base.php';

?>