<template>
  <div class="">
    <a @click="showRegisterModal()">
      <button class="m-btn">いますぐ登録する</button>
    </a>
  </div>
</template>

<script>
import RegisterModal from '../modal/registerModal.vue'
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