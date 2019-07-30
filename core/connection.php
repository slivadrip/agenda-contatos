<?php
/**
 * connection.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */
use Core\Database\QueryBuilder;
use Core\Database\DatabaseConnection;
use Core\Router;
use Core\App;

require 'core/Helper.php';
require 'web.php';

App::bind('database', new QueryBuilder(DatabaseConnection::connect()));
