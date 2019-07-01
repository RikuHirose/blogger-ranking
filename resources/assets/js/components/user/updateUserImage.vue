<template>
  <div class="center-block">
    <div class="text-center">
      <img
        :src="currentUser.image.url"
        class="rounded-circle img-circle"
        style="width: 112px; height: 112px;">
    </div>
    <p class="text-center">
      <button
        class="m-btn"
        btn-type="primary"
        @click="showImageChangeModal()">
        プロフィール写真を変更
      </button>
    </p>
  </div>
</template>

<script>
import showImageChangeModal from '../modal/imageChangeModal.vue'
export default {
  props: {
    currentUser: {required: true, type: Object},
  },
  data (){
    return {
    }
  },
  created () {
  },

  methods: {
    showImageChangeModal () {
      this.$modal.show(showImageChangeModal, {
        title: 'プロフィール写真を変更'
      }, {
        height: 'auto',
        width: '340'
      })
    },
  }
}
</script>