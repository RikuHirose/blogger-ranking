<template>
  <div class="m-modal">
    <div class="m-modal__header">
      <p class="m-modal__header__ttl">
        {{ title }}
      </p>
      <button
        class="m-modal__header__close-btn"
        type="button"
        @click="$emit('close')">
        X
      </button>
    </div>
    <div class="m-modal__content">
      <div class="social-content">
        <a
          class="m-btn w-100 mb-3"
          href="/auth/login/facebook"
          btn-type="facebook">
          Facebookでログインする
        </a>
      </div>
      <div class="mail-content">
        <div class="m-frmTextbox">
          <label>
            メールアドレス
            <span
              v-if="errors.email"
              class="error-message">
              {{ errors.email[0] }}
            </span>
          </label>
          <input
            v-model="email"
            class="form-control"
            type="email"
            required>
        </div>
        <div class="m-frmTextbox">
          <label>
            パスワード
            <span
              v-if="errors.password"
              class="error-message">
              {{ errors.password[0] }}
            </span>
          </label>
          <input
            v-model="password"
            class="form-control"
            type="password"
            required>
        </div>
        <div class="m-frmTextbox">
          <button
            class="form-control m-btnS"
            type="submit"
            btn-type="primary"
            @click="postLogin()">
            {{ title }}する
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: {required: true, type: String},
    redirectUrl: {required: true, type: String},
  },
  data (){
    return {
      email: '',
      password: '',
      errors: []
    }
  },
  created () {
  },

  methods: {
    postLogin () {
      this.$axios
        .post('/login', {
          email: this.email,
          password: this.password,
        })
        .then(() => {
          window.location.href = this.redirectUrl
        })
        .catch((err) => {
          this.errors = err.response.data.errors
        })
    }
  }
}
</script>
<style lang="scss" scoped>

</style>