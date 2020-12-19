<template>
  <div>
    <div class="product">
      <figure class="product__wrapper">
        <img
          class="product__image"
          :src="item.products[0].url"
        >
      </figure>
      <router-link :to="`/products/${item.id}`"></router-link>
      <div class="product__username">
        {{ item.title }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  }
}
</script>