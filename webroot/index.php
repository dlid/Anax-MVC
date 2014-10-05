<?php

require __DIR__.'/config_with_app.php'; 

$app->theme->configure(ANAX_APP_PATH . 'config/theme_void.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
 
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app->session();

$di->set('form', 'Mos\HTMLForm\CForm');

// Include support for comments
$di->setShared('comments', 'Anax\Comments\Comment');
$di->setShared('pages', 'Anax\Comments\Page');

// Include database support
$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/database_sqlite.php');
    $db->connect();
    return $db;
});

$di->set('UsersController', '\Anax\Users\UsersController');

$di->set('CommentController', function() use ($di) {
    $controller = new \Anax\Comments\CommentController();
    $controller->setDI($di);
    return $controller;
});



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
  $di->comments->addToView('main-footer');

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
  $di->comments->addToView('main-footer');
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

  	$di->comments->addToView('main-footer');

});

$app->router->add('theme', function() use ($app, $di) {

  $app->theme->setTitle("Tema");

  $main = $app->fileContent->get('theme.md');
  $main = $app->textFilter->doFilter($main, 'shortcode, markdown');

  $app->views->addString($main, 'main');

  $app->views->addString('mainbanner-coffee.png', 'banner');

  $di->comments->addToView('main-footer');

});

$app->router->add('theme/type', function() use ($app, $di) {

  $app->theme->setTitle("Tema");

   $content = $app->fileContent->get('typography.html');

  $app->views->addString($content, 'main');
  $app->views->addString($content, 'sidebar');

  $app->theme->addStylesheet('css/void-base/show-grid.css');

  $di->comments->addToView('main-footer');

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

   $di->comments->addToView('main-footer');

});

$app->router->add('test', function() use ($app, $di) {
  $app->theme->setTitle("Tester");
  $app->views->addString("<h1>Tester</h1><p>Här tänker jag lägga upp tester</p><ul><li><a href='test/cform'>CForm</a></li></ul>", 'main');
   $di->comments->addToView('main-footer');
});


$app->router->add('test/cform', function() use ($app, $di) {
    $app->views->addString(  $di->navbar->getSubmenu(), 'sidebar' );
    $app->theme->setTitle("CForm tests");
    $app->views->add('default/page', [
        'title' => "CForm Tests",
        'content' => "<p>Välj test i menyn till höger</p>"
    ]);
});


$di->set('FormTestController', '\App\FormTest\FormTestController');

// Add routes for CForm test
$app->router->add('test/cform/array', [ 'controller' => 'form-test', 'action' => 'array' ]);
$app->router->add('test/cform/checkbox', [ 'controller' => 'form-test', 'action' => 'checkbox' ]);
$app->router->add('test/cform/creditcard', [ 'controller' => 'form-test', 'action' => 'creditcard' ]);
$app->router->add('test/cform/multicheckbox', [ 'controller' => 'form-test', 'action' => 'multicheckbox' ]);
$app->router->add('test/cform/test1', [ 'controller' => 'form-test', 'action' => 'test1' ]);
$app->router->add('test/cform/test2', [ 'controller' => 'form-test', 'action' => 'test2' ]);
$app->router->add('test/cform/test3', [ 'controller' => 'form-test', 'action' => 'test3' ]);
$app->router->add('test/cform/test4', [ 'controller' => 'form-test', 'action' => 'test4' ]);
$app->router->add('test/cform/test5', [ 'controller' => 'form-test', 'action' => 'test5' ]);
$app->router->add('test/cform/test6', [ 'controller' => 'form-test', 'action' => 'test6' ]);
$app->router->add('test/cform/validation', [ 'controller' => 'form-test', 'action' => 'validation' ]);



$app->router->add('setup', function() use ($app) {
 
    $app->db->setVerbose();

    $app->db->dropTableIfExists('comment')->execute();

     $app->db->createTable(
        'comment',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'resource' => ['varchar(100)'],

            // http://www.eph.co.uk/resources/email-address-length-faq/#emailmaxlength
            'email' => ['varchar(254)'],
            'content' => ['text'],
            'name' => ['varchar(80)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
            'deleted' => ['datetime']
        ]
    )->execute();


    $app->db->dropTableIfExists('user')->execute();
 
    $app->db->createTable(
        'user',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'acronym' => ['varchar(20)', 'unique', 'not null'],
            'email' => ['varchar(80)'],
            'name' => ['varchar(80)'],
            'password' => ['varchar(255)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
            'deleted' => ['datetime'],
            'active' => ['datetime'],
        ]
    )->execute();

   $app->db->insert(
        'user',
        ['acronym', 'email', 'name', 'password', 'created', 'active']
    );
 
    $now = date(DATE_RFC2822);
 
    $app->db->execute([
        'admin',
        'admin@dbwebb.se',
        'Administrator',
        password_hash('admin', PASSWORD_DEFAULT),
        $now,
        $now
    ]);
 
    $app->db->execute([
        'doe',
        'doe@dbwebb.se',
        'John/Jane Doe',
        password_hash('doe', PASSWORD_DEFAULT),
        $now,
        $now
    ]);

    exit;

});

if( $di->request->getGet(null) == "show_grid" ) {
  $app->theme->addStylesheet('css/void-base/show-grid.css');
}


 
$app->router->handle();
$app->theme->render();