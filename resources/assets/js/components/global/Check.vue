<template>
    <div>
      <b-form-group :label="label" label-size="sm">
          <button type="button" 
                v-for="(key, val) in options" 
                @click="onClick(key, field)" 
                :class="['btn', 
                          { 
                            'btn-outline-primary active': selected === key.value, 
                            'btn-outline-primary ': selected !== key.value  }]">
                {{ key.text }}
        </button>                      
      </b-form-group>
        
    </div>
</template>
<script>
import Vue from "vue"
import { FormGroup } from "bootstrap-vue/es/components";
Vue.use(FormGroup);

export default {
  name: "app-check",
  data() {
    return {
    }
  },
  props: {
    options: {
      type: Array
    },
    field: {
      type: String
    },
    label: {
      type: String
    },
    classLabel: {
      type: String
    },
    selected: {
      type: Number
    }
  },
  methods: {
    onClick(key, field) {
       this.$emit("setValue", key, field)
    }
  }
}
</script>
<style>

</style>
