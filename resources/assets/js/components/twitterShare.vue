<template>
  <div class="">
    <social-sharing
      :url="'https://farie.me/restaurants/6'"
      :title="title"
      hashtags="ブロガーランキング"
      inline-template>
      <div>
        <network network="twitter">
          <font-awesome-icon icon="fa-twitter" />
          順位をシェアしよう
          <font-awesome-icon class="fab fa-twitter" />
        </network>
      </div>
    </social-sharing>
  </div>
</template>

<script>
export default {
  props: {
    user: {required: true, type: Object},
    shareUrl: {required: true, type: String},
    rank: {required: true, type: Number},
    count: {required: true, type: Number},
  },
  data (){
    return {
      title: `${this.user.name}さんのブロガー順位は、${this.rank}位 / ${this.count}位です`
    }
  },
  created () {
    this.title = `${this.user.name}さんのブロガー順位は、${this.rank}位 / ${this.count}位です`
  },

  methods: {
  }
}
</script>