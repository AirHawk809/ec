<template>
  <div>
    <v-card :loading="loading">
      <v-card-title>新規登録</v-card-title>
      <v-card-text>
        <form class="form" @submit.prevent="register">
          <v-text-field label="氏名" v-model="registerForm.name"></v-text-field>
          <v-text-field label="メールアドレス" v-model="registerForm.email"></v-text-field>
          <v-text-field label="パスワード" v-model="registerForm.password"></v-text-field>
          <v-text-field label="パスワード確認" v-model="registerForm.password_confirmation"></v-text-field>
          <v-btn type="submit">登録</v-btn>
        </form>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      registerForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  methods: {
    async register() {
      this.loading = true
      await this.$store.dispatch('auth/register', this.registerForm)
      this.$router.push('/')
    }
  }
}
</script>