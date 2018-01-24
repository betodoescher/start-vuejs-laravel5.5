<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-4">
      <b-form-group label="Aparência e organização das instalações">
        <b-form-radio-group v-model="form.aparencia"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Conforto">
        <b-form-radio-group v-model="form.conforto"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Limpeza">
        <b-form-radio-group v-model="form.limpeza"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>
     
  </div>
</div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import BootstrapVue from "bootstrap-vue";
import { FormRadio } from "bootstrap-vue/es/components";
import { FormGroup } from "bootstrap-vue/es/components";
Vue.use(FormRadio);
Vue.use(FormGroup);

import { questionario } from "../../store/quetionario";

export default {
  name: "app-instalacoes",
  data() {
    return {
      questionario,
      form: new Form({
      })
    };
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    }
  }
};
</script>
