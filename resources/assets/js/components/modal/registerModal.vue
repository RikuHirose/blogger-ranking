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
          href="/auth/login/twitter"
          btn-type="twitter">
          <i class="fa-twitter fa-fw" />
          Twitterで登録する
        </a>
      </div>
      <div class="m-frmTextbox">
        <p style="font-size: 8px; padding: 16px 0px;">
          登録すると<a href="/term">利用規約</a>および<a href="/privacy">プライバシーポリシー</a>に同意したことになります。
        </p>
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
  }
}
</script>
<style lang="scss" scoped>

</style>