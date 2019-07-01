v<template>
  <div class="m-search">
    <div class="m-search--wrap">
      <div
        class="m-search__input"
        @click="openSuggestBar()">
        <input
          v-model="inputWord"
          type="text"
          placeholder="カテゴリ・利用シーン・店名・キーワード"
          @input="onInput">
        <i
          class="fa-eat" />
      </div>
      <div>
        <button
          type="button"
          class="m-btn"
          btn-type="search-obsessed"
          @click="openObsessedBar()">
          <span class="mr-3">こだわり条件</span>
        </button>
      </div>
      <div>
        <button
          type="button"
          class="m-btn"
          :disabled="!isInputed"
          @click="searchRestaurants()">
          {{ searchButtonTitle }}
        </button>
      </div>
    </div>
    <!-- SuggestBar -->
    <div
      v-if="isOpenSuggestBar"
      class="m-search__suggest">
      <div class="m-search__suggest--top">
        <div class="m-search__suggest__category-list m-search__suggest__list">
          <span class="fa-eat">
            <span class="ml-2">{{ category_title }}</span>
          </span>
          <ul class="mt-2">
            <li
              v-for="(category, index) in categories"
              :key="index"
              class="m-search__suggest__tag"
              @click="addInputWord(category.name)">
              {{ category.name }}
            </li>
          </ul>
        </div>
        <div class="m-search__suggest__situation-list m-search__suggest__list">
          <span class="fa-friends">
            <span class="ml-2">利用シーン</span>
          </span>
          <ul class="mt-2">
            <li
              v-for="(situation, index) in situationList"
              :key="index"
              class="m-search__suggest__tag"
              @click="addInputWord(situation.name)">
              {{ situation.name }}
            </li>
          </ul>
        </div>
      </div>
      <div class="m-search__suggest--bottom">
        <span class="fa-restaurant">
          <span class="ml-2">{{ restaurant_title }}</span>
        </span>
        <ul class="mt-2">
          <li
            v-for="(restaurant, index) in restaurants"
            :key="index"
            class="m-search__suggest__tag"
            @click="addInputWord(restaurant.name)">
            {{ restaurant.name }}
          </li>
        </ul>
      </div>
    </div>
    <!-- Obsesed Bar -->
    <div
      v-if="isOpenObsessedBar"
      class="m-search__suggest">
      <p
        v-if="!isInputed"
        class="m-search__suggest--caution">
        カテゴリ・利用シーン・店名・キーワードを選択してください
      </p>
      <table class="m-search__suggest__table">
        <tr>
          <th class="fa-yen">
            予算
          </th>
          <td class="budget-type td">
            <div class="budget-type--switch mr-3">
              <input
                id="on"
                v-model="budget_meal_type"
                type="radio"
                value="1"
                :checked="true">
              <label
                for="on"
                class="switch-on">
                <span class="fa-lunch" />
              </label>
              <input
                id="off"
                v-model="budget_meal_type"
                type="radio"
                value="0">
              <label
                for="off"
                class="switch-off">
                <span class="fa-dinner" />
              </label>
            </div>
            <div>
              <label>
                <select
                  v-model="budget"
                  class="form-control">
                  <option
                    disabled
                    value="">未選択</option>
                  <option
                    v-for="(price, index) in priceList"
                    :key="index"
                    :value="price"> ~ {{ price }}円</option>
                </select>
              </label>
            </div>
          </td>
        </tr>
        <tr>
          <th class="fa-map">
            エリア
          </th>
          <td class="td">
            <div>
              <label>
                <select
                  v-model="nearest_station"
                  class="form-control">
                  <option
                    disabled
                    value="">未選択</option>
                  <option
                    value="渋谷">渋谷</option>
                  <option
                    disabled
                    value="新宿">新宿(未対応)</option>
                  <option
                    disabled
                    value="六本木">六本木(未対応)</option>
                </select>
              </label>
            </div>
          </td>
        </tr>
      </table>
      <div class="clearObsesed--wrap">
        <button
          class="clearObsesed__btn"
          @click="clearObsesed()">
          こだわり条件をクリアする
        </button>
      </div>
    </div>
    <!-- overlay -->
    <div
      v-if="isOpenSuggestBar"
      class="m-search__suggest-overlay"
      @click.self="closeSuggestBar()" />

    <div
      v-if="isOpenObsessedBar"
      class="m-search__suggest-overlay"
      @click.self="closeObsessedBar()" />
  </div>
</template>
<script>
export default {
  props: {
    priceList: {required: true, type: Array},
    situationList: {required: true, type: Array},
    parameter: {required: true, type: Object},
    searchButtonTitle: {required: true, type: String},
  },
  data (){
    return {
      inputWord: '',
      isInputed: false,
      isOpenSuggestBar: false,
      isOpenObsessedBar: false,
      category_name: '',
      category_title: '',
      restaurant_title: '',
      categories: [],
      popularCategories: [],
      popularRestaurants: [],
      restaurants: [],
      budget_meal_type: '',
      max_budget: '',
      budget: '',
      opening_hours: '',
      nearest_station: ''
    }
  },
  created () {
    this.category_title = '人気のカテゴリ'
    this.restaurant_title = '人気のレストラン'

    this.assigningInitialParameter()

    this.fetchPopularCategories()
    this.fetchPopularRestaurants()
  },
  methods: {
    openSuggestBar (){
      this.isOpenSuggestBar = true
    },
    closeSuggestBar (){
      this.isOpenSuggestBar = false
    },
    openObsessedBar (){
      this.isOpenObsessedBar = true
    },
    closeObsessedBar (){
      this.isOpenObsessedBar = false
    },
    clearObsesed (){
      this.budget = ''
      this.budget_meal_type = ''
      this.nearest_station = ''
    },
    addInputWord (name) {
      this.inputWord = name
      this.isInputed = true
      this.closeSuggestBar()
    },
    onInput: function() {
      if (this.inputWord) {
        this.fetchCategories()
        this.fetchRestaurants()
        this.isInputed = true
      }

      if (!this.inputWord) {
        this.categories = this.popularCategories
        this.restaurants = this.popularRestaurants
        this.isInputed = false
      }
    },
    assigningInitialParameter () {
      if (this.parameter['word']) {
        this.inputWord = this.parameter['word']
        this.isInputed = true
      }
      if (this.parameter['budget']) { this.budget = this.parameter['budget'] }
      if (this.parameter['budget_meal_type']) { this.budget_meal_type = this.parameter['budget_meal_type'] }
      if (this.parameter['nearest_station']) { this.nearest_station = this.parameter['nearest_station'] }
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
          this.restaurant_title = 'レストラン'
        })
        .catch(() => {
        })
    },
    searchRestaurants () {
      if (this.inputWord) {
        let url = `/q?word=${this.inputWord}&budget_meal_type=${this.budget_meal_type}&budget=${this.budget}&nearest_station=${this.nearest_station}`

        window.location.href = url
      }
    }
  }
}
</script>
<style lang="scss" scoped>
</style>