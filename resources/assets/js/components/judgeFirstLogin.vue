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
      categories: []
    }
  },
  created () {
    this.getCategories()
  },
  methods: {
    getCategories () {
      let url = '/api/v1/categories'

      this.$axios.get(url)
        .then((res) => {
          this.categories = res.data.categories

          if (this.user.first_login == true) {
            this.showLoginModal(this.categories)
          }
        })
        .catch(err => {
          alert(err)
        })
    },
    showLoginModal (categories) {
      this.$modal.show(FirstLoginModal, {
        title: 'ブログ情報を記入する',
        lastMounth: this.lastMounth,
        categories: categories
      }, {
        height: 'auto',
        width: '320'
      })
    },
  }
}
</script>