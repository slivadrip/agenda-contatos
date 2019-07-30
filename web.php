<?php
/**
 * web.php
 *
 * Routers System
 * 
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */
use Core\Router;

Router::get('/', 'ContactsController@index');
Router::get('/new', 'ContactsController@new');
Router::post('/store', 'ContactsController@store');
Router::get('/edit', 'ContactsController@edit');
Router::post('/edit', 'ContactsController@update');
Router::get('/show', 'ContactsController@show');
Router::delete('/delete', 'ContactsController@delete');

Router::post('/find', 'ContactsController@find');
Router::get('/filter', 'ContactsController@filter');
