<template>
  <div class="">
    カテゴリ・店名・キーワードを選択してください
    <table>
      <tr>
        <th>予算</th>
        <td>
          <ul>
            <li class="meal-type__item">
              <input
                v-model="budget_meal_type"
                type="radio"
                value="1">
              <label
                class="meal-type__label meal-type__label--lunch" />
            </li>
            <li class="meal-type__item">
              <input
                v-model="budget_meal_type"
                type="radio"
                value="2">
              <label
                class="meal-type__label meal-type__label--dinner" />
            </li>
          </ul>
          <div>
            <label>
              <select
                v-model="bottom_price"
                class="form-control">
                <option
                  disabled
                  value="">未選択</option>
                <option>Default select</option>
              </select>
            </label>
            <span>~</span>
            <label>
              <select
                v-model="max_price"
                class="form-control">
                <option
                  disabled
                  value="">未選択</option>
                <option>Default select</option>
              </select>
            </label>
          </div>
        </td>
      </tr>
    </table>
  </div>
</template>
<script>
export default {
  props: {
  },
  data (){
    return {
      budget_meal_type: '',
      max_price: '',
      bottom_price: '',
    }
  },
  created () {
  },

  methods: {
    
  }
}
</script>
<style lang="scss" scoped>

</style>