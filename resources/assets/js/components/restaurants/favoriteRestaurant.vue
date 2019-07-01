<template>
  <div
    class="btn-wrap"
    style="display: inline-block;">
    <a
      v-if="!favorited"
      class=""
      @click="favorite()">
      <span class="fa-heart-gray" />
    </a>
    <a
      v-else
      class=""
      @click="unFavorite()">
      <span class="fa-heart-red" />
    </a>
  </div>
</template>

<script>
export default {
  props: {
    restaurant: {required: true, type: Object},
    currentUser: {required: true, type: Object},
    defaultFavorited: {required: true, type: Boolean},
  },
  data (){
    return {
      favorited: false
    }
  },
  created () {
    this.favorited = this.defaultFavorited
  },

  methods: {
    favorite () {
      let url = `/api/v1/restaurants/${this.restaurant.id}/favorite`

      this.$axios.post(url, {
        currentUser: this.currentUser
      })
        .then(() => {
          this.favorited = true
        })
        .catch(err => {
          alert(err)
        })
    },
    unFavorite () {
      let url = `/api/v1/restaurants/${this.restaurant.id}/unFavorite`

      this.$axios.post(url, {
        currentUser: this.currentUser
      })
        .then(() => {
          this.favorited = false
        })
        .catch(err => {
          alert(err)
        })
    },
  }
}
</script>