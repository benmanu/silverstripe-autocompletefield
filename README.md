# AutocompleteField

## Overview

This is a basic autocomplete field that can be used as a SilverStripe form 
field which provides a suggestion list based on the current text that has been
entered into the field.

It uses a custom component built in VueJS to handle the autocomplete. The custom
component depends on the [https://github.com/paliari/v-autocomplete](v-autocomplete)
npm module.

## TODO

There are a bunch of enhancements that will eventually be added such as:

* Ability to suggest based on an AJAX response
* Ability to customise more options such (e.g. min length of characters before
suggesting) when creating the PHP field
* Ability to pass in a DataList and have it automatically turn that into
suggestion data