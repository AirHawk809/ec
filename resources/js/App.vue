<template>
  <v-app>
    <div>
      <header>
        <navbar />
      </header>
      <main>
        <div class="container">
          <router-view />
        </div>
      </main>
      <footer />
    </div>
  </v-app>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'

export default {
  components: {
    Navbar,
    Footer
  }
}
</script>