<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-12">
      <app-radio label="Clareza na transmissão da informação" :selected="form.enf_clareza" field="enf_clareza" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Atendimento" :selected="form.enf_atendimento" field="enf_atendimento" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Atenção" :selected="form.enf_atencao" field="enf_atencao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Simpatia" :selected="form.enf_simpatia" field="enf_simpatia" :options="questionario" @setValue="setValueButton" />
    </div>

    <!-- <div class="form-group col-md-12">
      <app-radio label="Grau de ruído" :selected="form.enf_grau_ruido" field="enf_grau_ruido" :options="questionario" @setValue="setValueButton" />
    </div> -->

     <div class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.enf_observacoes" class="form-control" rows="4" id="comment"></textarea>
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
      },
      dadosPai: {
          type: Object
      }
  },
  watch: {
    dadosPai: function(param) {
      this.form = Object.assign({}, this.form, param);
    }
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    },
    setValueButton(key, field) {

      switch (field) {
        case "enf_clareza":
          this.form.enf_clareza = key.value;
          break;
        case "enf_atendimento":
          this.form.enf_atendimento = key.value;
          break;
        case "enf_atencao":
          this.form.enf_atencao = key.value;
          break;
        case "enf_simpatia":
          this.form.enf_simpatia = key.value;
          break;
        case "enf_grau_ruido":
          this.form.enf_grau_ruido = key.value;
          break;
      }
    }
  }
};
</script>
