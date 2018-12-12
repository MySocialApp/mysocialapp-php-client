<?php
// Example of autoload script
spl_autoload_register(function ($class) {
    $c = explode("\\", $class);
    if (count($c) == 0 || strlen($c[0]) > 0) {
        while (count($c) > 0) {
            if (file_exists(__DIR__ . "/" . implode("/", $c) . ".php")) {
                require_once __DIR__ . "/" . implode("/", $c) . ".php";
                break;
            }
            if (count($c) == 1 && file_exists($c[0] . ".php")) {
                require_once $c[0] . ".php";
                break;
            }
            array_pop($c);
        }
    }
});

// First, create the main instance to access the API
$msa = (new \MySocialApp\MySocialAppBuilder())
    // Set the app id matching your application. Here is the test application
    ->setAppId("u470584465854a728453")
    // If you want to debug the API calls, add the following part
    ->setClientConfiguration(new \MySocialApp\Services\ClientConfiguration(10000,10000, array(), true))
    ->build();

// Create a new user account
//$session = $msa->createAccount("myotherusername", "myemail2@mydomain.com", "mypassword", "my first name");
// If the account is already created, replace the line above with this one below
$session = $msa->connectByEmail("myemail@mydomain.com", "mypassword");

if ($session instanceof \MySocialApp\Models\Error) {
    // Something went wrong, let's display the error
    echo $session;
} else {
    // Set the user external id to match another system's id
    $myAccount = $session->getAccount()->get();
//    $myAccount->setExternalId("Another external id");
    $myAccount->setExternalId("My external id, can be any string");
    $myAccount->save();

    // Add another user as a friend
    $anotherUser = $session->getUser()->getByExternalId("Another external id");
    $anotherUser->requestAsFriend();

    // Post a new message on the wall
    $myAccount->sendWallPost(
        (new \MySocialApp\Models\FeedPostBuilder())
            ->setMessage("My new message on the wall")
            ->setVisibility(\MySocialApp\Models\AccessControl::_PUBLIC)
            ->build()
    );

    // Once everything is done, disconnect
    $session->disconnect();
}
