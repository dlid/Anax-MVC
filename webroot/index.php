<?php

require __DIR__.'/config_with_app.php'; 

$app->theme->configure(ANAX_APP_PATH . 'config/theme_void.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
 
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

// Include support for comments
$di->set('CommentController', 'Phpmvc\Comment\CommentController');
$di->setShared('comments', 'Phpmvc\Comment\PageComments');


$baseUrl = $di->request->getBaseUrl();

$app->views->addString('<p>Det här är David Lidströms sidor för kurmomenten under kursen <a href="http://dbwebb.se/phpmvc/">phpmvc</a> vid <a href="www.bth.se/">BTH</a>.</p>', 'footer-col-1');
$app->views->addString('<p><a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a></p>', 'footer-col-2');
$app->views->addString('<p><a href="https://github.com/dlid/Anax-MVC">Anax-MVC på GitHub</a></p>', 'footer-col-3');
$app->views->addString("<p class='social'><a href='https://www.facebook.com/david.lidstrom'><img alt='Facebook' src='{$baseUrl}/img/facebook.png' /></a><a href='https://twitter.com/davidlidstrom'><img alt='Twitter' src='{$baseUrl}/img/twitter.png' /></a><a href='http://se.linkedin.com/in/davidlidstrom'><img alt='LinkedIn' src='{$baseUrl}/img/linkedin.png' /></a></p>", 'footer-col-4');


$app->router->add('', function() use ($app, $di) {
  $app->theme->setTitle("Me");
 
	$content = $app->fileContent->get('me.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');

	$byline = $app->fileContent->get('byline.md');
	$byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

  $sidebar = $app->fileContent->get('david.html');

	$app->views->add('me/page', [
	    'content' => $content,
	    'byline' => $byline,
      'sidebar' => $sidebar
	]);

   $app->views->addString('ruben-gris.png', 'banner');

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


  $app->views->addString('computer-work.png', 'banner');


});
 
$app->router->add('source', function() use ($app, $di) {
 
    $app->theme->addStylesheet('css/void-base/source.css');
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

  	$di->comments->addToPage($app);

});

$app->router->add('theme', function() use ($app, $di) {

  $app->theme->setTitle("Tema");

  $main = $app->fileContent->get('theme.md');
  $main = $app->textFilter->doFilter($main, 'shortcode, markdown');

  $app->views->addString($main, 'main');

  $app->views->addString('mainbanner-coffee.png', 'banner');

});

$app->router->add('theme/type', function() use ($app, $di) {

  $app->theme->setTitle("Tema");

   $content = $app->fileContent->get('typography.html');

  $app->views->addString($content, 'main');
  $app->views->addString($content, 'sidebar');

  $app->theme->addStylesheet('css/void-base/show-grid.css');

});


$app->router->add('theme/regions', function() use ($app, $di) {

  $app->theme->setTitle("Tema");
  $app->views->addString('mountain.jpg', 'banner');

  $app->views->addString('<h1>[main-header]</h1><p>Här är en hel rad där man t.ex. kan sätta rubriker om man vill</p>', 'main-header');
  $app->views->addString('<h1>[main-footer]</h1><p>Här är en hel rad där man t.ex. kan sätta in kommentarfunktioner eller annat</p>', 'main-footer');

  $app->views->addString('<p>[main]</p><p>Här ska sidans huvudinnehåll placeras.</p>', 'main');
  $app->views->addString('<h1>[Sidebar]</h1><p>Här kan information som är relaterad till sidans innehåll placeras</p>', 'sidebar');


  $app->views->addString('<h1>[Flash warning]</h1><p>Här är "flash" som kan användas när något blivit fel</p>', 'flash-warning');
  $app->views->addString('<h1>[Flash info]</h1><p>Här är "flash" som kan användas för viktig information</p>', 'flash-info');
  $app->views->addString('<h1>[Flash danger]</h1><p>Här är "flash" som kan användas när något gått riktigt snett</p>', 'flash-danger');
  $app->views->addString('<h1>[Flash success]</h1><p>Här är "flash" som kan användas när något gått bra</p>', 'flash-success');

});

if( $di->request->getGet(null) == "show_grid" ) {
  $app->theme->addStylesheet('css/void-base/show-grid.css');
}


 
$app->router->handle();
$app->theme->render();