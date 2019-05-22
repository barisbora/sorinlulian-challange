<template>
    <div class="text-center" style="max-width: 400px">
        <h1>What is my device?</h1>
        <h2 class="text-primary">
            {{ detect.browserName }} v{{ detect.fullBrowserVersion }}
        </h2>
        <h5 class="mb-2">
            <i>{{ detect.getUA }}</i>
        </h5>
        <ul class="list-group">
            <li class="list-group-item" v-for="property in properties">
                <div class="property-item">
                    <span>{{ property.key }}</span>
                    <span :class="getClass(property.value)">{{ property.value }}</span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
  import detect from 'mobile-device-detect';

  export default {
    mounted() {
      if (detect) {
        for (var key in detect) {
          if (key === 'getUA') return
          this.properties.push({
            key,
            value: detect[key]
          })
        }
        this.properties = this.properties.sort()
      }
    },
    data() {
      return {
        properties: []
      }
    },
    methods: {
      getClass( value ) {
        if (value === true) return 'text-success'
        if (value === false) return 'text-danger'

        return ''
      }
    }
  }
</script>
