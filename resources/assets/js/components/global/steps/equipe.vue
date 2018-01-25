<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-4">
      <b-form-group label="Todas as suas dúvidas foram esclarecidas?">
        <b-form-radio-group v-model="form.em_duvidas_esclarecidas"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-4">
      <b-form-group label="Segurança no diagnóstico">
        <b-form-radio-group v-model="form.em_seguranca_diagnostico"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Atenção">
        <b-form-radio-group v-model="form.em_atencao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Simpatia">
        <b-form-radio-group v-model="form.em_simpatia"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

     <div v-if="tipo == 2" class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.em_observacoes" class="form-control" rows="4" id="comment"></textarea>
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
        em_duvidas_esclarecidas: null,
        em_seguranca_diagnostico: null,
        em_atencao: null,
        em_simpatia: null,
        em_observacoes: null
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
