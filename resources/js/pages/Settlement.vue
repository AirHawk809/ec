<template>
  <div class="container">
    <!-- form class="h-adr">
      <span class="p-country-name" style="display:none;">Japan</span>

      〒<input type="text" class="p-postal-code" size="3" maxlength="3" placeholder="000">
      <input type="text" class="p-postal-code" size="4" maxlength="4" placeholder="0000"><br>

      <input type="text" class="p-region" placeholder="都道府県"/><br>
      <input type="text" class="p-locality" placeholder="市区町村" /><br>
      <input type="text" class="p-street-address" placeholder="区画" /><br>
      <input type="text" class="p-extended-address" placeholder="番地" />
    </form-->
    カード番号
    <div id="card-number"></div>
    有効期限
    <div id="card-expiry"></div>
    セキュリティコード
    <div id="card-cvc"></div>
    <button @click="submit">確定</button>
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
      cardNumber: null,
      cardExpity: null,
      cardCvc: null,
      card: {
        number: null,
        expiry: null,
        cvc: null
      },
      stripe: null,
      show_result: false,
      result_message: "",
    }
  },
  async mounted() {
    this.stripe = await loadStripe('pk_test_51HxR0jBhrqWrgmxZ9gLw0V8y0nq7XYNNPvKut1ya3bhSKrtEZsEBrxkSi6gLmUdPe5zlEQgSX9k2WwjWhB4KBWHc001WLEOGam');
    const elements = await this.stripe.elements()
    const elementStyles = {
      base: {
        color: '#32325D',
        fontWeight: 500,
        fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
        fontSize: '20px',
        fontSmoothing: 'antialiased',
        '::placeholder': {
          color: '#CFD7DF'
        },
        ':-webkit-autofill': {
          color: '#e39f48'
        }
      },
      invalid: {
        color: '#E25950',
        '::placeholder': {
          color: '#FFCCA5'
        }
      }
    }
    const elementClasses = {
      focus: 'focused',
      empty: 'empty',
      invalid: 'invalid'
    }
    this.cardNumber = elements.create('cardNumber', {
      style: elementStyles,
      classes: elementClasses
    })
    this.cardNumber.mount('#card-number');
    this.cardNumber.addEventListener('change', event => {
      //this.card.number = event.complete
      if (event.complete) {
        // this.cardExpiry.focus()
      }
    })
    this.cardExpiry = elements.create('cardExpiry', {
      style: elementStyles,
      classes: elementClasses
    })
    this.cardExpiry.mount('#card-expiry')
    this.cardExpiry.addEventListener('change', event => {
      //this.card.expiry = event.complete
      if (event.complete) {
        // this.cardCvc.focus()
      }
    })
    this.cardCvc = elements.create('cardCvc', {
      style: elementStyles,
      classes: elementClasses
    })
    this.cardCvc.mount('#card-cvc')
    this.cardCvc.addEventListener('change', event => {
      //this.card.cvc = event.complete
    })
  },
  methods: {
    async submit() {
      const response = await axios.post('/api/client')
      const clientSecret = response.data.client_secret
      console.log(response)
      const {paymentIntent, error} = await this.stripe.confirmCardPayment(clientSecret, {
        payment_method: {
          card: this.cardNumber,
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
  }
};
</script>
