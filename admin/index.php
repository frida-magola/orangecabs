<?php 

if(isset($_GET['p'])){

    $p = $_GET['p'];

}else{

    $p = 'madmin';
}

ob_start();

if($p === 'madmin'){

    require 'maps.php';
}

elseif($p === 'users'){

    require 'users.php';
}
elseif($p === 'drivers'){

    require 'alldrivers.php';
}
elseif($p === 'driver'){

    require 'driver.php';
}
elseif($p === 'cars'){

    require 'cars.php';
}
elseif($p === 'chat'){

    require 'chat.php';
}
elseif($p === 'riders'){

    require 'riders.php';
}
elseif($p === 'graphbook'){

    require 'graphbook.php';
}
elseif($p === 'history'){

    require 'historyApp.php';
}
// elseif($p === 'adddrivers'){

//     require 'addDriver.php';
// }

elseif($p === 'filemanager'){

    require 'filemanager.php';
}

elseif($p === 'payment'){

    require 'payment.php';
}
elseif($p == 'profile'){

    require 'profile.php';
}

$content = ob_get_clean();

require 'madmin.php';

?>