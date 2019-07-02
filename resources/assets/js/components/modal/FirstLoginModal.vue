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
        <form @submit.prevent="submitForm">
          <div class="m-frmTextbox">
            <label>{{ lastMounth }}の売り上げ</label>
            <input
              v-model="userForm.last_mounth_sales"
              type="number"
              class="form-control"
              required>円
          </div>
          <div class="m-frmTextbox">
            <label>{{ lastMounth }}のPV</label>
            <input
              v-model="userForm.last_mounth_pv"
              type="number"
              class="form-control"
              required>pv
          </div>
          <div class="m-frmTextbox">
            <label>
              ブログURL
              <span class="small caution">urlはhttpsから始めてください</span>
            </label>
            <input
              v-model="userForm.blog_url"
              type="url"
              class="form-control"
              placeholder="https://example.com"
              required>
          </div>
          <div
            class="text-center">
            <button
              type="submit"
              class="m-btn"
              btn-type="primary">
              記入する
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: {required: true, type: String},
    lastMounth: {required: true, type: String},
  },
  data (){
    return {
      userForm: {
        last_mounth_sales: 0,
        last_mounth_pv: 0,
        blog_url: ''
      },
      errors: []
    }
  },
  created () {
  },

  methods: {
    submitForm () {
      const formData = new FormData()
      formData.append('last_mounth_sales', parseInt(this.userForm.last_mounth_sales))
      formData.append('last_mounth_pv', parseInt(this.userForm.last_mounth_pv))
      formData.append('blog_url', this.userForm.blog_url)
      formData.append('first_login', 0)
      this.$axios
        .post('/mypage/update', formData)
        .then(() => {
          window.location.href = '/'
        })
        .catch((err) => {
          alert(err)
        })
    }
  }
}
</script>
<style lang="scss" scoped>

</style>