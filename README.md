# Blade Builder

Blade Builder is simple yet powerful package that allows you to build static web sites from blade templates.
Yes, by saying blade I mean Laravel blade templates. There are two ways of using this package. We'll get to this
in usage section.

## Instalation

You will be needing composer in order to use Blade Builer.

    composer require wilgucki/blade-builder

Having package installed, run init command from your project root.

    ./vendor/bin/blade init

If you want to preview your work, set document root of your web server to _public_ directory.

## Usage

As it was mentioned before, there are two ways of using this package.

1. View files stored in _views_ directory can be accessed via index.php file from browser (only if you configure your web server).
2. As a static html file generator.

In both cases you need to create blade templates inside _views_ directory (feel free to create subdirectories). When you are done with
writing your blade template, you can preview it in browser. Just type address you've configured for this project followed by
template name. If you created some subdirectories, you need to use them as part of an address.
For instance you have index.blade.php template inside _views/about_ directory. Type http://your-address/about/index and you
will see content built from your template. What just happend? Long story short - magic. Thanks to that magic you can preview all
blade templates existing in _views_ directory (with one exception - we'll get back to this soon).

What about second way? Well it's almost the same as the first one but instead of previewing templates in browser, you can
generate static html files. Just run this command

    ./vendor/bin/blade build

Static html files are placed in _compiled_ dir. Directory structure is the same as structure inside _views_ dir.

### Usig json to fill templates with data

Writing templates can be pain in the ass, especially when dealing with tables or other repeated data. The code is bloated and
hard to read. Fortunately you can use json to store data and use it inside blade templates. To do so you need to create json file
named the same as blade template.

    views
      index.blade.php
      index.json

Json file will be parsed and passed to blade template as associative array.

    {
        "firstname": "John",
        "lastname": "Doe",
        "emails": ["mail1@mail.com", "mail2@mail.com"]
    }

Above data will be visible in blade template as: <code>$firstname</code>, <code>$lastname</code> and <code>$emails</code> array.

### Conventions

As you might noticed, views directory contains two dirs starting with underscore: _\_layouts_ and _\_partials_.
These dirs and any other dir with name starting with underscore are excluded from building response. In other words
these directories are invisible for users and static file builder. You can use them to store files like layouts and/or partial content
(header, footer, etc.).


## What's next?

Few thing I would like to add to this project:

- clear cached views,
- create example project
