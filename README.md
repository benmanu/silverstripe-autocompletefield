# AutocompleteField

## Overview

This is a basic autocomplete field that can be used as a SilverStripe form 
field which provides a suggestion list based on the current text that has been
entered into the field.

It uses a custom component built in VueJS to handle the autocomplete. The custom
component depends on the [https://github.com/paliari/v-autocomplete](v-autocomplete)
npm module.

## Installation

You can install this via:

`composer require benmanu/silverstripe-autocompletefield`

## Javascript Development

This module has [https://github.com/JeffreyWay/laravel-mix](laravel-mix) as an npm
dependency which makes it easy to do future javascript development for the module.

To get everything setup you just need to run:

`yarn install`

Once all the npm packages have been installed you can start javascript development
using either:

`yarn run dev`: which will start a watch task that rebundles the src files when files
in the `javascript/src/` folder are updated.

`yarn run prod`: which you will want to run when finished to produce a production ready
build of the javascript src files.

## TODO

There are a bunch of enhancements that will eventually be added such as:

* Ability to suggest based on an AJAX response
* Ability to customise more options such (e.g. min length of characters before
suggesting) when creating the PHP field
* Ability to pass in a DataList and have it automatically turn that into
suggestion data
