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
          Facebookで登録する
        </a>
      </div>
      <div class="mail-content">
        <div class="m-frmTextbox">
          <label>
            お名前
            <span
              v-if="errors.name"
              class="error-message">
              {{ errors.name[0] }}
            </span>
          </label>
          <input
            v-model="name"
            class="form-control"
            type="text"
            required>
        </div>
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
          <label>パスワードの確認</label>
          <input
            v-model="password_confirmation"
            type="password"
            class="form-control"
            required>
        </div>
        <div class="m-frmTextbox">
          <p style="font-size: 8px; padding: 16px 0;">
            登録すると<a href="/term">利用規約</a>および<a href="/privacy">プライバシーポリシー</a>に同意したことになります。
          </p>
        </div>
        <div class="m-frmTextbox">
          <button
            class="form-control m-btnS"
            type="submit"
            btn-type="primary"
            @click="postRegister()">
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
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errors: []
    }
  },
  created () {
  },

  methods: {
    postRegister () {
      this.$axios
        .post('/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
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