<template>
  <div class="field field--autocomplete">
    <v-autocomplete
      :items="items"
      v-model="item"
      :min-len="1"
      :auto-select-one-item="false"
      :input-attrs="attributes"
      @update-items="updateItems"
    >
    </v-autocomplete>
  </div>
</template>

<script>
  export default {
    props: {
      attributes: {
        type: Object,
        required: false,
      },
      maxSuggestions: {
        type: Number,
        required: false,
        default: 6,
      },
      suggestionData: {
        type: Array,
        required: false,
      },
    },

    data() {
      return {
        data: this.suggestionData ? this.suggestionData : [],
        items: [],
        item: null
      };
    },

    methods: {
      /**
       * This is called whenever a change event occurs on the v-autocomplete
       * field.
       *
       * @param {String} query
       *
       * @return void
       */
      updateItems(query) {
        this.items = this.findSuggestions(query);
      },

      /**
       * Helper to take in the query from the field and determine which
       * suggestions from our data set match.
       *
       * @param {String} query
       *
       * @return {Array}
       */
      findSuggestions(query) {
        const suggestions = [];
        const keywords = query.split(' ');

        for (let i = 0; i < this.data.length; i += 1) {
          if (this.matchAllWords(this.data[i], keywords)) {
            suggestions.push(this.data[i]);
          }

          // provide ability to limit how many suggestions provided
          if (this.maxSuggestions !== 0 && suggestions.length === this.maxSuggestions) {
            break;
          }
        }

        return suggestions;
      },

      /**
       * Helper to determine if the provided question contains all the provided
       * words.
       *
       * @param {String} question
       * @param {Array} words
       *
       * @return {Boolean}
       */
      matchAllWords(question, words) {
        let word = '';

        // check that each word is included in the question
        for (let i = 0; i < words.length; i += 1) {
          word = words[i].toLowerCase();

          // if not found, this question does not match so we return false
          if (question.toLowerCase().indexOf(word) === -1) {
            return false;
          }
        }

        return true;
      },
    },
  };
</script>
