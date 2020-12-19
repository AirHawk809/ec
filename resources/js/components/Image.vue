<template>
  <div class="image">
    <figure class="product__wrapper">
      <img
        class="product__image"
        :src="image.url"
        :alt="`product by ${image.user.name}`"
      >
    </figure>
    <a :href="image.url"></a>
  </div>
</template>

<script>
export default {
  props: {
    image: {
      type: Object,
      required: true
    }
  }
}
</script>