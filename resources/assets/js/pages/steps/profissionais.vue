<template>
<div>
<div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-2">
      <b-form-group label="Recepcionista">
        <b-form-radio-group v-model="form.recepcionista"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Segurança">
        <b-form-radio-group v-model="form.seguranca"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Enfermagem">
        <b-form-radio-group v-model="form.enfermagem"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Equipe médica">
        <b-form-radio-group v-model="form.equipe"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-4">
      <b-form-group label="Técnico em imobilização">
        <b-form-radio-group v-model="form.imobilizacao"
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
  name: "app-profissionais",
  data() {
    return {
      questionario,
      form: new Form({
        recepcionista: null
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
