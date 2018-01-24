<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">


    <div class="form-group col-md-3">
      <b-form-group label="Recepção">
        <b-form-radio-group v-model="form.atend_recepcao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Enfermagem">
        <b-form-radio-group v-model="form.atend_enfermagem"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Equipe médica">
        <b-form-radio-group v-model="form.atend_equipe_medica"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-4">
      <b-form-group label="Realização de exames laboratoriais">
        <b-form-radio-group v-model="form.atend_exames"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Realização de exames de imagem">
        <b-form-radio-group v-model="form.atend_imagem"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Administração da medicação">
        <b-form-radio-group v-model="form.atend_medicacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Imobilizações e curativos">
        <b-form-radio-group v-model="form.atend_curativos"
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
  name: "app-atendimento",
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
