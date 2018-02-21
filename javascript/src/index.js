import Vue from 'vue';
import Autocomplete from 'v-autocomplete';

import AutocompleteField from './AutocompleteField.vue';

if (document.querySelector('.autocomplete-form')) {
  Vue.use(Autocomplete);

  const autocompleteApp = new Vue({
    el: '.autocomplete-form',
    components: {
      'autocomplete-field': AutocompleteField
    }
  });
}