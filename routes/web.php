<?php

$router->get('label/{name}/isExists', 'LabelController@checkExistance');
$router->get('label', 'LabelController@index');
$router->post('label', 'LabelController@create');
$router->patch('label/{labelId}', 'LabelController@update');
$router->delete('label/{labelId}', 'LabelController@delete');

$router->get('article', 'ArticleController@index');
$router->post('article', 'ArticleController@create');
$router->delete('article/{articleId}', 'ArticleController@delete');
