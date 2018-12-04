<?php 

if(isset($_GET['p'])){

    $p = $_GET['p'];

}else{

    $p = 'booknow';
}

ob_start();

if($p === 'search'){

    require 'book.php';

}
elseif($p === 'booknow'){

    require 'addtripnow.php';
}
elseif($p === 'help'){

    require '../help/index.php';
}
elseif($p === 'message'){

    require 'displaymessage.php';
}
elseif($p === 'profile'){

    require 'profile.php';
}

elseif($p === 'viewtrip'){

    require 'viewtrips.php';
}
elseif($p == 'historytrip'){

    require 'historytripdisplay.php';
}

elseif($p == 'mytrip'){

    require 'trippaid.php';
}

elseif($p == 'payment'){

    require 'paymentsriders.php';
}

$content = ob_get_clean();

require 'maintrips.php';

?>