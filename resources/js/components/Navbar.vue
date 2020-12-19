<template>
  <div>
    <v-app-bar color="green" dark>
      <v-app-bar-nav-icon　@click="drawer=true" />
      <router-link class="navbar__brand" to="/">
        <v-toolbar-title>ec</v-toolbar-title>
      </router-link>
      <v-spacer></v-spacer>
      <div v-if="isLogin" class="navber__item">
          {{ username }}
      </div>
      <div v-else class="navbar__item">
        <router-link class="button button--link" to="/login" style="color: white;">
          ログイン
        </router-link>
      </div>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list nav dense>
        <v-list-item-group v-model="group">
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Account</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      group: null
    }
  },
  computed: {
    isLogin() {
      return this.$store.getters['auth/check']
    },
    username() {
      return this.$store.getters['auth/username']
    }
  }
}
</script>