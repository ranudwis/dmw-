<?php

$router->get('label/{name}/isExists', 'LabelController@checkExistance');
$router->get('label', 'LabelController@index');
$router->post('label', 'LabelController@create');
$router->patch('label/{labelId}', 'LabelController@update');
$router->delete('label/{labelId}', 'LabelController@delete');

$router->get('article', 'ArticleController@index');
$router->post('article', 'ArticleController@create');
$router->delete('article/{articleId}', 'ArticleController@delete');

$router->get('course', 'CourseController@index');
$router->get('course/{slug}', 'CourseController@show');

$router->get('course/{slug}/exam', 'CourseExamController@index');
$router->get('course/{slug}/exam/{examId}', 'CourseExamController@show');

$router->get('semester', 'SemesterController@index');
$router->get('semester/{slug}', 'SemesterController@show');

$router->get('exam', 'ExamController@index');
$router->post('exam', 'ExamController@create');
