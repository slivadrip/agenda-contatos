<?php

/**
 * index.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */
require 'vendor/autoload.php';
require 'core/connection.php';

use Core\{Router, Request};

Router::validate(Request::uri(), Request::method());
