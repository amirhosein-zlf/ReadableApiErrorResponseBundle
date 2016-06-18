This bundle is usually used in conjunction with the [FOSRestBundle][] for returning readable exception messages.

By default, when a controller throws an exception, a response is returned with a status code of 500 and the content set to `"internal error`". The problem, however, is that exceptions you throw which contain helpful information are lost.

This means you have no way of providing useful error messages to developers who are going to use your API, and your UI application has no way of providing helpful messages to end users.

This bundle makes that as easy as a simple `composer install` and registration of the bundle in your `AppKernel`.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require azlf/readable-api-response-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new <vendor>\<bundle-name>\<bundle-long-name>(),
        );

        // ...
    }

    // ...
}
```

# Usage

That's all you need to do to be able to return exceptions that make sense to both users and computers. To try out the bundle, add this to an action inside one of your controllers:

```php
    public function indexAction()
    {
        throw new \Exception('This is a test exception.');
    }
```

Now, open that page in your browser, and you must see a response like this:

```
```

[FOSRestBundle]: https://github.com/FriendsOfSymfony/FOSRestBundle
