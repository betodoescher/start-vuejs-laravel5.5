<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-12">
      <app-radio label="Todas as suas dúvidas foram esclarecidas?" :selected="form.em_duvidas_esclarecidas" field="em_duvidas_esclarecidas" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Segurança no diagnóstico" :selected="form.em_seguranca_diagnostico" field="em_seguranca_diagnostico" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Atenção" :selected="form.em_atencao" field="em_atencao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Simpatia" :selected="form.em_simpatia" field="em_simpatia" :options="questionario" @setValue="setValueButton" />
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
import Radio from "../../global/Radio"

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
    },
    setValueButton(key, field) {

      switch (field) {
        case "em_duvidas_esclarecidas":
          this.form.em_duvidas_esclarecidas = key.value;
          break;
        case "em_seguranca_diagnostico":
          this.form.em_seguranca_diagnostico = key.value;
          break;
        case "em_atencao":
          this.form.em_atencao = key.value;
          break;
        case "em_simpatia":
          this.form.em_simpatia = key.value;
          break;
      }
    }
  }
};
</script>
