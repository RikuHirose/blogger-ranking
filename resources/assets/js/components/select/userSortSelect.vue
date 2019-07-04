<template>
  <div>
    <span class="font-weight-bold">並べ替え:  </span>
    <select
      v-model="order"
      class="m-select"
      options="categories"
      @change="fetchOrder">
      <option value="top">
        トップ
      </option>
      <option
        v-for="(category, key, index) in categories"
        :key="index"
        :value="category.id">
        {{ category.name }}
      </option>
    </select>
  </div>
</template>

<script>

export default {
  props: {
    urlFull: {required: true, type: String},
    domain: {required: true, type: String},
    categories: {required: true, type: Array},
  },
  data (){
    return {
      requestUrl: '',
      order: '',
      options: [
        {text: '新着', value: 'new'},
        {text: '価格低い順', value: 'price_asc'},
        {text: '価格高い順', value: 'price_desc'}
      ],
    }
  },
  created () {
    let paramArray = this.getParams()
    console.log(paramArray, location.search.substring(1))
    if (paramArray) {
      this.order = 'top'

      if (paramArray.category) {
        this.order = paramArray.category
      }

    } else {
      this.order = 'top'
    }

  },

  methods: {
    getParams() {
      let urlParam = location.search.substring(1)

      if (urlParam) {
        let param = urlParam.split('&')
        let paramArray = []
        let i

        for (i = 0; i < param.length; i++) {
          let paramItem = param[i].split('=')
          paramArray[paramItem[0]] = paramItem[1]
        }

        return paramArray
      }
    },
    createRequestUrl() {
      let urlParam = location.search.substring(1)

      if (urlParam) {

        let paramArray = this.getParams()

        // if (paramArray.q && !paramArray.order) {
        //   return this.requestUrl = `${this.urlFull}&order=${this.order}`
        // }

        // if (paramArray.q === '' || paramArray.q && paramArray.order) {
        //   return this.requestUrl = `${this.domain}/products?q=${paramArray.q}&order=${this.order}`
        // }

        if (this.order == 'top') {
          return this.requestUrl = `${this.domain}/ranking`
        }

        if (paramArray.category) {
          return this.requestUrl = `${this.domain}/ranking?category=${this.order}`
        }

      } else {
        return this.requestUrl = `${this.urlFull}?category=${this.order}`
      }

    },
    fetchOrder () {
      this.requestUrl = this.createRequestUrl()
      this.submitForm(this.requestUrl)
    },
    submitForm (requestUrl) {
      window.location.href = requestUrl
    }
  }
}
</script>
<style lang="scss" scoped>

</style>