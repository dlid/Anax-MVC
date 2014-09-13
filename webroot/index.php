<?php

require __DIR__.'/config_with_app.php'; 

$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
 
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

// Include support for comments
$di->set('CommentController', 'Phpmvc\Comment\CommentController');
$di->setShared('comments', 'Phpmvc\Comment\PageComments');

$app->router->add('', function() use ($app, $di) {
  $app->theme->setTitle("Me");
 
	$content = $app->fileContent->get('me.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');

	$byline = $app->fileContent->get('byline.md');
	$byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

	$app->views->add('me/page', [
	    'content' => $content,
	    'byline' => $byline,
	]);

	// Add comments section
  $di->comments->addToPage($app);

});

$app->router->add('report', function() use ($app, $di) {
  $app->theme->setTitle("Redovisning");
 
	$content = $app->fileContent->get('redovisning.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');

	$byline = $app->fileContent->get('byline.md');
	$byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

	$app->views->add('me/page', [
	    'content' => $content,
	    'byline' => $byline,
	]);

	// Add comments section
  $di->comments->addToPage($app);



});
 
$app->router->add('source', function() use ($app, $di) {
 
    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");
 
	 	$di->comments->includeParams(['path']);
    
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);

    if( $source->getRealPath() ) {
    	$app->theme->setTitle("Källkod för " . basename($source->getRealPath()) );
    }

 
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);

    // Add comments section, also add the 
    // current file/folder being shown. That way
    // there will be different comment flows per
    // file
  	$di->comments->addToPage($app);


});
 
$app->router->handle();
$app->theme->render();