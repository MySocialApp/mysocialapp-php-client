# mysocialapp-php-client

#### MySocialApp - Seamless Social Networking features for your app
Official PHP client to interact with apps made with [MySocialApp](https://mysocialapp.io)

# What is MySocialApp?

MySocialApp’s powerful API lets you quickly and seamlessly implement social networking features within your websites, mobile and back-end applications. Our API powers billions of requests for hundred of apps every month, delivering responses in under 100ms.

### What can you do?

Add social features to your existing app, automate actions, scrape contents, analyze the users content, add bot to your app, almost anything that a modern social network can bring.. There is no limit! Any suggestion to add here? Do a PR. 

# What features are available?

| Feature | Server side API | Swift client API
| ------- | ----------- | -------------------------- |
| Profile management | :heavy_check_mark: | :heavy_check_mark:
| Feed | :heavy_check_mark: | Partially
| Comment | :heavy_check_mark: | Soon
| Like | :heavy_check_mark: | Soon
| Notification | :heavy_check_mark: | Partially
| Private messaging | :heavy_check_mark: | Soon
| Photo | :heavy_check_mark: | Soon
| User | :heavy_check_mark: | :heavy_check_mark:
| Friend | :heavy_check_mark: | :heavy_check_mark:
| URL rewrite | :heavy_check_mark: | :heavy_check_mark:
| URL preview | :heavy_check_mark: | :heavy_check_mark:
| User mention | :heavy_check_mark: | :heavy_check_mark:
| Hash tag| :heavy_check_mark: | :heavy_check_mark:
| Search users | :heavy_check_mark: | Soon
| Search news feed | :heavy_check_mark: | Soon
| Search groups | :heavy_check_mark: | Soon
| Search events | :heavy_check_mark: | Soon
| Group [optional module] | :heavy_check_mark: | Soon
| Event [optional module] | :heavy_check_mark: | Soon
| Roadbook [optional module] | :heavy_check_mark: | Soon
| Live tracking with `RideShare` ([exemple here](https://www.nousmotards.com/rideshare/follow/f6e0c27e01beb4f4-3856809369215939951-f10c31fd2dcc4576a1b488385aaa61c2)) [optional module] | :heavy_check_mark: | Soon
| Point of interest [optional module] | :heavy_check_mark: | Soon
| Admin operations | :heavy_check_mark: | Soon

Looking for official TypeScript / JavaScript client API ? [Click here](https://github.com/MySocialApp/mysocialapp-ts-client)
Looking for official Java/Kotlin client API ? [Click here](https://github.com/MySocialApp/mysocialapp-java-client)
Looking for official Swift client API ? [Click here](https://github.com/MySocialApp/mysocialapp-swift-client)

Coming soon:
* Real time downstream handlers with FCM (Android), APNS (iOS) and Web Socket.

# Prerequisites

You must have "APP ID" to target the right App. Want to [create your app](https://support.mysocialapp.io/hc/en-us/articles/115003936872-Create-my-first-app)?
#### App owner/administrator:
Sign in to [go.mysocialapp.io](https://go.mysocialapp.io) and go to API section. Your **APP ID** is part of the endpoint URL provided to your app. Which is something like `https://u123456789123a123456-api.mysocialapp.io`. Your **APP ID** is `u123456789123a123456`

#### App user:
Ask for an administrator to give you the **APP ID**.

# Usage

To use the SDK, you must use any of the currently available autoload (cf. [autoload](http://php.net/manual/en/language.oop5.autoload.php)).

Here is an example of this SDK usage. Much more examples are coming very soon.

```php
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
    // ->setClientConfiguration(new \MySocialApp\Services\ClientConfiguration(10000,10000, array(), true))
    ->build();

// Create a new user account
$session = $msa->createAccount("myusername", "myemail@mydomain.com", "mypassword", "my first name");
// If the account is already created, replace the line above with this one below
// $session = $msa->connectByEmail("myemail@mydomain.com", "mypassword");

if ($session instanceof \MySocialApp\Models\Error) {
    // Something went wrong, let's display the error
    echo $session;
} else {
    // Set the user external id to match another system's id
    $myAccount = $session->getAccount()->get();
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
```

# Demo apps using MySocialApp

* [MySocialApp Android](https://play.google.com/store/apps/details?id=io.mysocialapp.android)
* [MySocialApp iOS](https://itunes.apple.com/fr/app/mysocialapp-your-social-app/id1351250650)

# Contributions

All contributions are welcomed. Thank you