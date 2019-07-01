<template>
  <div class="w-100">
    <div class="category-list list">
      <span>{{ category_title }}</span>
      <ul
        v-for="(category, index) in categories"
        :key="index">
        <li
          class="tag"
          @click="addInputWard(category.name)">
          {{ category.name }}
        </li>
      </ul>
    </div>
    <div class="restaurant-list list">
      <span>{{ restaurant_title }}</span>
      <ul
        v-for="(restaurant, index) in restaurants"
        :key="index">
        <li
          class="tag"
          @click="addInputWard(restaurant.name)">
          {{ restaurant.name }}
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  props: {
  },
  data (){
    return {
      category_title: '',
      restaurant_title: '',
      categories: [],
      popularCategories: [],
      popularRestaurants: [],
      restaurants: [],
    }
  },
  created () {
    this.category_title = '人気のカテゴリ'
    this.restaurant_title = '人気のレストラン'
    this.fetchPopularCategories()
    this.fetchPopularRestaurants()
  },

  methods: {
    onInput: function() {
      if (this.inputWord) {
        this.fetchCategories()
        this.fetchRestaurants()
      }

      if (!this.inputWord) {
        this.categories = this.popularCategories
        this.restaurants = this.popularRestaurants
      }
    },
    fetchPopularCategories () {
      let url = '/api/v1/categories/popular'

      this.$axios.post(url)
        .then((res) => {
          this.popularCategories = res.data.categories
          this.categories = this.popularCategories
        })
        .catch(err => {
          alert(err)
        })
    },
    fetchCategories () {
      let url = '/api/v1/categories/suggest'

      this.$axios.post(url, {
        name: this.inputWord
      })
        .then((res) => {
          this.categories = res.data.categories
          this.category_title = 'カテゴリ'
        })
        .catch(err => {
          alert(err)
        })
    },
    fetchPopularRestaurants () {
      let url = '/api/v1/restaurants/popular'

      this.$axios.post(url)
        .then((res) => {
          this.popularRestaurants = res.data.restaurants
          this.restaurants = this.popularRestaurants
        })
        .catch(()=> {
        })
    },
    fetchRestaurants () {
      let url = '/api/v1/restaurants/suggest'

      this.$axios.post(url, {
        name: this.inputWord
      })
        .then((res) => {
          this.restaurants = res.data.restaurants
          this.restaurant_title = '人気のレストラン'
        })
        .catch(() => {
        })
    },
  }
}
</script>
<style lang="scss" scoped>
.tag {
  padding: 8px;
  background-color: #f4f4f5;
  color: #4a4a4b;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  display: inline-block;
  max-width: calc(100% + 8px);
  box-sizing: border-box;
  border: 0;
  border-radius: 2px;
  cursor: pointer;
  font-size: .923em;
  line-height: .923em;
  outline: none;
  text-align: left;
  text-decoration: none;
  vertical-align: middle;
  transition: all .3s ease-out;
}
.list {
  flex: 1 0 0%;
  width: 50%;
}
.category-list {
  padding-right: 8px;
}
.restaurant-list {
  padding-left: 8px;
  border-left: 1px dotted #d5d5d8;
}
</style>