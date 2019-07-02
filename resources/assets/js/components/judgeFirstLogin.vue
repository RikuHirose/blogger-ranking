<template>
  <div />
</template>

<script>
import FirstLoginModal from './modal/FirstLoginModal.vue'
export default {
  props: {
    user: {required: true, type: Object},
    lastMounth: {required: true, type: String},
  },
  data (){
    return {
    }
  },
  created () {
    if (this.user.first_login == true) {
      this.showLoginModal()
    }
  },

  methods: {
    showLoginModal () {
      this.$modal.show(FirstLoginModal, {
        title: 'ブログ情報を記入する',
        lastMounth: this.lastMounth
      }, {
        height: 'auto',
        width: '320'
      })
    },
  }
}
</script>