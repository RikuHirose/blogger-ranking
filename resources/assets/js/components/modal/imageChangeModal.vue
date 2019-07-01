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
      <input
        id="avator-input"
        style="display: none"
        type="file"
        accept="image/png,image/jpeg,image/gif"
        @change="uploadImage">
      <div class="m-frmTextbox">
        <button
          type="button"
          class="btn btn-primary btn-lg btn-block"
          @click="selectImage()">
          写真をアップロード
        </button>
        <button
          type="button"
          class="btn btn-secondary btn-lg btn-block">
          現在の写真を削除
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: {required: true, type: String},
  },
  data (){
    return {
      email: '',
      password: '',
    }
  },
  created () {
  },

  methods: {
    selectImage () {
      const input = document.querySelector('#avator-input')
      input.click()
    },
    uploadImage(e) {
      e.preventDefault()

      if (e.target.files.length === 0) {
        return null
      }
      const imagefile = e.target.files[0]
      const formData = new FormData()
      formData.append('image', imagefile)
      let config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }

      this.$axios
        .post('/api/v1/users/changeImage', formData, config)
        .then(() => {
          // window.location.href = '/'
        })
        .catch((err) => {
          alert(err)
        })

    },
  }
}
</script>
<style lang="scss" scoped>

</style>