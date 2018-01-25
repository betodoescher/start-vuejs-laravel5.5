<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-4">
      <b-form-group label="Clareza na transmissão da informação?">
        <b-form-radio-group v-model="form.enf_clareza"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Atendimento">
        <b-form-radio-group v-model="form.enf_atendimento"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Atenção">
        <b-form-radio-group v-model="form.enf_atencao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Simpatia">
        <b-form-radio-group v-model="form.enf_simpatia"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Grau de ruído">
        <b-form-radio-group v-model="form.enf_grau_ruido"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

     <div v-if="tipo == 2" class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.enf_observacoes" class="form-control" rows="4" id="comment"></textarea>
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

import { questionario } from "../../../services/store/quetionario";

export default {
  name: "app-equipe",
  data() {
    return {
      questionario,
      form: new Form({
        enf_clareza: null,
        enf_atendimento: null,
        enf_atencao: null,
        enf_simpatia: null,
        enf_grau_ruido: null,
        enf_observacoes: null
      })
    };
  },
  props: {
    tipo: {
      type: Number
    }
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    }
  }
};
</script>
