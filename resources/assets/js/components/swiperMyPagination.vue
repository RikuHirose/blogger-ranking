<template>
  <div class="swiper-my-pagination" />
</template>
<!-- サムネイル付きのスライダー -->
<script>
export default {
  props: {
    restaurant: {required: true, type: Object},
  },
  data (){
    return {
      pagination: {
        el: '.swiper-my-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          console.log(index, className)
          return '<span class="' + className + '">' + '<img src="https://haniwaman.com/wp-content/uploads/2018/05/swiper-thumbnail' + (index + 1) + '.png" alt="">' + '</span>'
        },
      }
    }
  },
  created () {

  },
  methods: {

  }
}
</script>
<style lang="scss">
.swiper-my-pagination .swiper-pagination-bullet {
  width: auto;
  height: auto;
  border-radius: 0;
}
.swiper-container-horizontal > .swiper-my-pagination.swiper-pagination-bullets .swiper-pagination-bullet {
  margin: 0;
}
.swiper-my-pagination img {
  box-shadow: none;
  margin: 0;
  vertical-align: bottom;
}
.swiper-my-pagination {
  display: table;
}
.swiper-my-pagination {
  display: table;
  table-layout: fixed;
}
.swiper-my-pagination .swiper-pagination-bullet {
  display: table-cell;
  padding: 2px;
  background: transparent;
  opacity: 1;
}
.swiper-my-pagination .swiper-pagination-bullet-active {
  background: transparent;
  opacity: 0.6;
}
</style>