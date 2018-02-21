<?php

class AutocompleteField extends TextField
{

    /**
     * This contains the suggestion data source for the field. Should be used
     * when there is a small set of data, otherwise we should use an endpoint
     * instead.
     *
     * The data in the array should just be a list of strings that the entered
     * text will compare against directly, e.g.
     *
     * ```
     * [
     *   'abc',
     *   'def',
     *   'ghi'
     * ]
     * ```
     *
     * @var array
     */
    protected $suggestionData = [];

    /**
     * Overloading constructor to add data parameter to populate the suggestion data with.
     *
     * @param string $name
     * @param string $title
     * @param array $data
     * @param string $value
     * @param int $maxLength
     * @param Form $form
     */
    public function __construct($name, $title = null, $data = [], $value = '', $maxLength = null, $form = null)
    {
        if (is_array($data)) {
            $this->suggestionData = $data;
        }

        parent::__construct($name, $title, $value, $maxLength, $form);
    }

    /**
     * @param array $properties
     *
     * @return string
     */
    public function Field($properties = [])
    {
        // add in custom javasctript to handle autocompletion
        Requirements::javascript('autocompletefield/javascript/dist/AutocompleteField.js');

        return parent::Field($properties);
    }

    /**
     * Helper to update the $suggestionData
     *
     * @param array $data
     */
    public function setSuggestionData($data)
    {
        $this->suggestionData = $data;
        return $this;
    }

    /**
     * Helper to access the suggestion data and convert to JSON.
     *
     * @return string
     */
    public function getSuggestionData()
    {
        return count($this->suggestionData)
            ? htmlspecialchars(json_encode($this->suggestionData), ENT_QUOTES, 'UTF-8')
            : '';
    }

    /**
     * Helper to retrieve the placeholder attribute.
     *
     * @return string|null
     */
    public function getPlaceholder()
    {
        return $this->getAttribute('placeholder');
    }

}
