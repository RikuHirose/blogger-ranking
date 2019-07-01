<template>
  <div
    id="map"
    style="height: 400px;" />
</template>
<script>
export default {
  props: {
    restaurant: {required: true, type: Object},
  },
  created () {
  },
  mounted () {
    this.geolocate()
  },
  methods: {
    geolocate: function() {
      let map
      let address = this.restaurant.address
      let geocoder = new google.maps.Geocoder() // eslint-disable-line
      geocoder.geocode({'address': address}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK) { // eslint-disable-line
          let latitude = results[0].geometry.location.lat()
          let longitude = results[0].geometry.location.lng()

          let center = {
            lat: latitude, // 緯度
            lng: longitude // 経度
          }

          map = new google.maps.Map(document.getElementById('map'), { // eslint-disable-line
            center: center, // 地図の中心を指定
            zoom: 17 // 地図のズームを指定
          })

          new google.maps.Marker({ // eslint-disable-line
            position: center, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
          })
        }
      })
    }
  }

}
</script>