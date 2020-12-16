<template>
  <div>
    <v-card :loading="loading">
      <v-card-title>ログイン</v-card-title>
      <v-card-text>
        <form class="form" @submit.prevent="login">
          <v-text-field label="メールアドレス" v-model="loginForm.email"></v-text-field>
          <v-text-field label="パスワード" v-model="loginForm.password"></v-text-field>
          <v-btn type="submit">ログイン</v-btn>
        </form>
      </v-card-text>
    </v-card>
    <div>
      アカウントがない場合は
      <router-link to="/register">新規登録</router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      loginForm: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async login() {
      this.loading = true
      await this.$store.dispatch('auth/login', this.loginForm)
      this.$router.push('/')
    }
  }
}
</script>
