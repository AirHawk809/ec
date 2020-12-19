<template>
  <div class="container">
    <form class="h-adr">
      <span class="p-country-name" style="display:none;">Japan</span>

      〒<input type="text" class="p-postal-code" size="3" maxlength="3" placeholder="000">
      <input type="text" class="p-postal-code" size="4" maxlength="4" placeholder="0000"><br>

      <input type="text" class="p-region" placeholder="都道府県"/><br>
      <input type="text" class="p-locality" placeholder="市区町村" /><br>
      <input type="text" class="p-street-address" placeholder="区画" /><br>
      <input type="text" class="p-extended-address" placeholder="番地" />
    </form>
    <div id="card-element"></div>
    <button @click="submit">Submit Payment</button>
    <div v-if="show_result">{{result_message}}</div>
    <div id="card-errors" ref="cardErrors" role="alert"></div>
  </div>
</template>

<script>
import {loadStripe} from '@stripe/stripe-js'

export default {
  data() {
    return {
      /* locale: {
        zip,
        country,
        city,
        state,
        address,
      }, */
      card: null,
      stripe: null,
      show_result: false,
      result_message: "",
    }
  },
  async mounted() {
    this.stripe = await loadStripe('pk_test_51HxR0jBhrqWrgmxZ9gLw0V8y0nq7XYNNPvKut1ya3bhSKrtEZsEBrxkSi6gLmUdPe5zlEQgSX9k2WwjWhB4KBWHc001WLEOGam');
    const elements = await this.stripe.elements()
    this.card = elements.create('card', {hidePostalCode: true})
    this.card.mount('#card-element')
    this.card.addEventListener('change', ({error}) => {
      const displayError = this.$refs.cardErrors
      if (error) {
        displayError.textContent = error.message
      } else {
        displayError.textContent = ''
      }
    })
  },
  methods: {
    async submit() {
      const self = this;
      self.show_result = false;
      this.stripe.createToken(this.card).then(async result => {
        console.log("result: " + JSON.stringify(result))
        // エラーの場合
        if (result.error) {
          self.show_result = true;
          self.result_message = result.error.message
          // 成功の場合
        } else {
          self.show_result = true
          self.result_message = "token_id: " + result.token.id
          const response = await axios.get('/api/client')
          const clientSecret = response.data.client_secret
          console.log(response)
          const {paymentIntent, error} = await this.stripe.confirmCardPayment(clientSecret, {
            payment_method: {
              card: this.card,
              billing_details: {
                name: response.data.metadata.username,
              }
            }
          })
          if (error) {
            console.log(error)
          } else if (paymentIntent && paymentIntent.status === 'succeeded') {
            console.log(paymentIntent)
          }
        }
      })
    }
  }
};
</script>
