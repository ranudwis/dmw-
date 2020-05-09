<?php

$router->post('label', 'LabelController@create');
$router->get('label/{name}/isExists', 'LabelController@checkExistance');
$router->get('label', 'LabelController@index');
