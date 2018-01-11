<template>
  <div>
    <div v-if="validacao">
        <div v-if="validacao.search('required') !== -1">
          <label class="required" v-if="label">{{label}}</label>
        </div>
        <div v-else>
          <label v-if="label">{{label}}</label>
        </div>
        
          <input :name="name" v-model.trim="valor" v-validate="'required|alpha'" :class="{'form-control': true, 'is-invalid': errors.has(this.name) }" @input="alterando" @mouseout="alterando" @click="alterando" :type="type">
            <div class="help-block invalid-feedback"  v-if="errors.has(this.name)">{{errors.first(this.name)}}</div>

    </div>
    <div v-else>
      <label v-if="label">{{label}}</label>
      <div v-if="mask">
          <the-mask :mask="mask" v-model.trim="valor" :class="{'form-control': true }" :type="type"/>
      </div>
      <div v-else>
        <input :name="name" v-model.trim="valor" :class="{'form-control': true }" :type="type">
      </div>
    </div>

    <!-- <div class="column is-12">
        <label class="label">Name</label>
        <p class="control has-icon has-icon-right">
            <input name="name" v-model="name" v-validate="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('name') }" type="text" placeholder="Name">
            <i v-show="errors.has('name')" class="fa fa-warning"></i>
            <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
        </p>
    </div> -->
  </div>

  
</template>
<script>

export default {
  name: 'app-comum',
  inject: ['$validator'],
  data () {
    return {
      valor: ''
    }
  },
  props: {
    label: {
      type: String
    },
    name: {
      type: String
    },
    validacao: {
      type: String
    },
    field: {
      type: String
    },
    type: {
      type: String,
      default: 'text'
    },
    mask: {
      type: Array
    },
    value: {
      type: String
    }
  },
  methods: {
    alterando () {
      this.errors.has(this.name)
      var resp = JSON.parse('{ "' + this.field + '": "' + this.valor + '" }')
      this.$emit('update', resp)
    }
  },
  created () {
    if (this.value) {
      this.value = this.value
    }
  }
}
</script>
<style>

</style>
