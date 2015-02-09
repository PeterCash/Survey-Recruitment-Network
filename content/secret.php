<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 03/02/2015
 * Time: 12:39
 */

$hash = "$2y$10$0rwFtOZelizUzbKOmdySdubSDRPNsHvCstdgTcgt995F.xSWHV4NG";

if(password_verify("abc",$hash)) {
    echo "Good";
}else{
    echo "Bad";
}

