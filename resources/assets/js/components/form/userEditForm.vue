<template>
  <form @submit.prevent="submitForm">
    <div class="m-frmTextbox">
      <label>お名前</label>
      <input
        v-model="userForm.name"
        type="text"
        class="form-control"
        required>
    </div>
    <div class="m-frmTextbox">
      <label>概要</label>
      <textarea
        v-model="userForm.description"
        type="text"
        class="form-control"
        rows="4"
        cols="40" />
    </div>
    <div class="m-frmTextbox">
      <label>{{ lastMounth }}の売り上げ</label>
      <input
        v-model="userForm.last_mounth_sales"
        type="number"
        class="form-control"
        min="0"
        max="100000000"
        required>円
    </div>
    <div class="m-frmTextbox">
      <label>{{ lastMounth }}のPV</label>
      <input
        v-model="userForm.last_mounth_pv"
        type="number"
        class="form-control"
        min="0"
        max="100000000"
        required>pv
    </div>
    <div class="m-frmTextbox">
      <label>ブログ</label>
      <input
        v-model="userForm.blog_url"
        type="text"
        class="form-control"
        required>
    </div>
    <div class="m-frmTextbox">
      <label>ブログのカテゴリ<span class="small">(複数選択可)</span></label>
    </div>
    <v-select
      v-model="userForm.categories"
      style="margin-bottom: 8px;"
      multiple
      placeholder="ブログのカテゴリを選択する"
      :options="categories"
      label="name"
      track-by="id">
      <template #search="{attributes, events}">
        <input
          class="vs__search"
          :required="!userForm.categories.length"
          v-bind="attributes"
          v-on="events">
      </template>
    </v-select>
    <div class="m-frmTextbox">
      <label>Twitter</label>
      <input
        v-model="userForm.tw_url"
        type="url"
        class="form-control"
        required>
    </div>
    <div
      class="text-center">
      <button
        type="submit"
        class="m-btn"
        btn-type="primary">
        編集する
      </button>
    </div>
  </form>
</template>
<script>
export default {
  props: {
    lastMounth: {required: true, type: String},
    categories: {required: true, type: Array},
    currentUser: {required: true, type: Object},
  },
  data (){
    return {
      userForm: {
        name: '',
        description: '',
        last_mounth_sales: 0,
        last_mounth_pv: 0,
        blog_url: '',
        tw_url: '',
        categories: [],
      },
      errors: []
    }
  },
  created () {
    this.userForm.name = this.currentUser.name
    this.userForm.description = this.currentUser.description
    this.userForm.last_mounth_sales = this.currentUser.last_mounth_sales
    this.userForm.last_mounth_pv = this.currentUser.last_mounth_pv
    this.userForm.blog_url = this.currentUser.blog_url
    this.userForm.tw_url = this.currentUser.tw_url
    this.userForm.categories = this.currentUser.user_categories.map(category => category.category)
  },

  methods: {
    submitForm () {
      const formData = new FormData()
      formData.append('name', this.userForm.name)
      formData.append('description', this.userForm.description)
      formData.append('last_mounth_sales', parseInt(this.userForm.last_mounth_sales))
      formData.append('last_mounth_pv', parseInt(this.userForm.last_mounth_pv))
      formData.append('blog_url', this.userForm.blog_url)
      formData.append('tw_url', this.userForm.tw_url)
      this.userForm.categories.map(category => formData.append('categories[]', category.id))

      this.$axios
        .post('/mypage/update', formData)
        .then(() => {
          window.location.href = '/mypage'
        })
        .catch((err) => {
          console.log(err)
        })
    }
  }
}
</script>
<style lang="scss" scoped>

</style>