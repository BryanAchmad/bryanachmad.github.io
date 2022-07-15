<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    
    // enable extra drivers just by including them
    //~ include "./plugins/drivers/simpledb.php";
    
    $plugins = array(
        new AdminerLoginSsl(array(
            "key" => 'C:\\Users\\bryan\\.tsh\\keys\\teleport.sirclo.net\\bryan.aulya@sirclo.com', 
            "cert" => 'C:\\Users\\bryan\\.tsh\\keys\\teleport.sirclo.net\\bryan.aulya@sirclo.com-db\\teleport.sirclo.net\\apollo-production-x509.pem', 
            "ca" => 'C:\\Users\\bryan\\.tsh\\keys\\teleport.sirclo.net\\cas\\teleport.sirclo.net.pem')),
        new AdminerLoginPasswordLess(password_hash("YOUR_PASSWORD_HERE", PASSWORD_DEFAULT)),
        new AdminerJsonColumn()
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
?>