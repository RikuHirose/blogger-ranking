<template>
  <div class="">
    <a
      class="pl-3 m-header-list--link"
      @click="showLoginModal()">ログイン</a>
    <a
      class="pl-3 m-header-list--link"
      @click="showRegisterModal()">会員登録</a>
  </div>
</template>

<script>
import LoginModal from './modal/loginModal.vue'
import RegisterModal from './modal/registerModal.vue'
export default {
  props: {
    redirectUrl: {required: true, type: String},
  },
  data (){
    return {
    }
  },
  created () {
  },

  methods: {
    showLoginModal () {
      this.$modal.show(LoginModal, {
        title: 'ログイン',
        redirectUrl: this.redirectUrl
      }, {
        height: 'auto',
        width: '320'
      })
    },
    showRegisterModal () {
      this.$modal.show(RegisterModal, {
        title: '会員登録',
        redirectUrl: this.redirectUrl
      }, {
        height: 'auto',
        width: '320'
      })
    }
  }
}
</script>