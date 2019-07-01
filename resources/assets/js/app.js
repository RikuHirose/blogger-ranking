/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
import Vue from 'vue'
import VModal from 'vue-js-modal'
import { Slide } from 'vue-burger-menu'
import vueSmoothScroll from 'vue2-smooth-scroll'
import Sticky from 'vue-sticky-directive'
import { swiper, swiperSlide } from 'vue-awesome-swiper'
import mobile from 'is-mobile'
// require swiper styles
import 'swiper/dist/css/swiper.css'

Vue.prototype.$axios = window.axios

Vue.use(VModal, { dynamic: true, injectModalsContainer: true })
Vue.use(vueSmoothScroll)
Vue.use(Sticky)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('slide', Slide)
Vue.component('swiper', swiper)
Vue.component('swiperSlide', swiperSlide)

Vue.component('swiper-my-pagination', require('./components/swiperMyPagination.vue').default)
Vue.component('header-right-list', require('./components/headerRightList.vue').default)
Vue.component('header-right-list-sp', require('./components/headerRightListSp.vue').default)

/* ============================================================================
 * input
 * ========================================================================= */
Vue.component('search-restaurants-select', require('./components/input/searchRestaurantsSelect.vue').default)
Vue.component('search-restaurants-suggest', require('./components/input/searchRestaurantsSuggest.vue').default)
/* ============================================================================
 * modal
 * ========================================================================= */

/* ============================================================================
 * restaurants
 * ========================================================================= */
Vue.component('favorite-restaurant', require('./components/restaurants/favoriteRestaurant.vue').default)
Vue.component('search-restaurants', require('./components/restaurants/searchRestaurants.vue').default)
Vue.component('search-restaurants-sp', require('./components/restaurants/searchRestaurantsSp.vue').default)
/* ============================================================================
 * user
 * ========================================================================= */
Vue.component('update-user-image', require('./components/user/updateUserImage.vue').default)
Vue.component('gmap', require('./components/user/gmap.vue').default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({ // eslint-disable-line
  el: '#app',
  data() {
    return {
      swiperOption: {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
          clickable: true
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        }
      },
      swiperOptionRecoCard: {
        loop: true,
        slidesPerView: mobile() ? 1 : 3,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
          clickable: true
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        }
      },
      swiperOptionIndexRecoCard: {
        loop: true,
        slidesPerView: mobile() ? 3 : 5,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
          clickable: true
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        }
      }
    }
  }
})
