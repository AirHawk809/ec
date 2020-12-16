<template>
  <div class="container">
    <div id="card-element">
    </div>
    <button @click="submit">Submit Payment</button>
    <div v-if="show_result">{{result_message}}</div>
  </div>

</template>

<script>
import {loadStripe} from '@stripe/stripe-js'

export default {
  data() {
    return {
      card: null,
      stripe: null,
      show_result: false,
      result_message: ""
    };
  },
  async mounted() {
    this.stripe = await loadStripe('pk_test_51HxR0jBhrqWrgmxZ9gLw0V8y0nq7XYNNPvKut1ya3bhSKrtEZsEBrxkSi6gLmUdPe5zlEQgSX9k2WwjWhB4KBWHc001WLEOGam');
    const elements = await this.stripe.elements()
    this.card = elements.create("card")
    this.card.mount("#card-element")
  },
  methods: {
    submit() {
      const self = this;
      self.show_result = false;
      this.stripe.createToken(this.card).then(result => {
        console.log("result: " + JSON.stringify(result))
        // エラーの場合
        if (result.error) {
          self.show_result = true;
          self.result_message = result.error.message
          // 成功の場合
        } else {
          self.show_result = true
          self.result_message = "token_id: " + result.token.id
        }
      })
    }
  }
};
</script>
