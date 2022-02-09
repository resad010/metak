<?php
require '../vendor/autoload.php';

$url = isset($_GET['url']) ? explode('/', ltrim($_GET['url'],'/')) : '/';

require '../routes/web.php';
