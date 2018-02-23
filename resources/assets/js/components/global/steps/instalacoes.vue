<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Pastoral da Saúde" :selected="form.if_pastoral_saude" field="if_pastoral_saude" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Estacionamento" :selected="form.if_estacionamento" field="if_estacionamento" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Recepção central" :selected="form.if_recepcao" field="if_recepcao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Setor de internação" :selected="form.if_internacao" field="if_internacao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Segurança" :selected="form.if_seguranca" field="if_seguranca" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Sinalização" :selected="form.if_sinalizacao" field="if_sinalizacao" :options="questionario" @setValue="setValueButton" />
    </div>


    <!-- <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Grau de ruído" :selected="form.if_grau_ruido" field="if_grau_ruido" :options="questionario" @setValue="setValueButton" />
    </div> -->

    <div class="form-group col-md-12">
      <app-radio label="Conforto" :selected="form.if_conforto" field="if_conforto" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Limpeza" :selected="form.if_limpeza" field="if_limpeza" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Atendimento as solicitações" :selected="form.if_atendimento_solicitacoes" field="if_atendimento_solicitacoes" :options="questionario" @setValue="setValueButton" />
    </div>

    <!-- <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Instalações do apartamento" :selected="form.if_instalacoes_apartamento" field="if_instalacoes_apartamento" :options="questionario" @setValue="setValueButton" />
    </div> -->

    <div class="form-group col-md-12">
      <app-radio label="Aparência e organização das instalações" :selected="form.if_aparencia" field="if_aparencia" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Roupa de cama e banho" :selected="form.if_roupa_cama" field="if_roupa_cama" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Serviços de conveniência" :selected="form.if_conveniencia" field="if_conveniencia" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.if_observacoes" class="form-control" rows="4" id="comment"></textarea>
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
  name: "app-instalacoes",
  data() {
    return {
      questionario,
      form: new Form({
        if_pastoral_saude: null,
        if_estacionamento: null,
        if_recepcao: null,
        if_internacao: null,
        if_seguranca: null,
        if_sinalizacao: null,
        if_atendimento_solicitacoes: null,
        if_instalacoes_apartamento: null,
        if_grau_ruido: null,
        if_aparencia: null,
        if_conforto: null,
        if_limpeza: null,
        if_roupa_cama: null,
        if_conveniencia: null,
        if_observacoes: null
      })
    };
  },
  props: {
      tipo: {
          type: Number
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
        case "if_estacionamento":
          this.form.if_estacionamento = key.value;
          break;
        case "if_recepcao":
          this.form.if_recepcao = key.value;
          break;
        case "if_internacao":
          this.form.if_internacao = key.value;
          break;
        case "if_seguranca":
          this.form.if_seguranca = key.value;
          break;
        case "if_sinalizacao":
          this.form.if_sinalizacao = key.value;
          break;
        case "if_atendimento_solicitacoes":
          this.form.if_atendimento_solicitacoes = key.value;
          break;
        case "if_instalacoes_apartamento":
          this.form.if_instalacoes_apartamento = key.value;
          break;
        case "if_grau_ruido":
          this.form.if_grau_ruido = key.value;
          break;
        case "if_aparencia":
          this.form.if_aparencia = key.value;
          break;
        case "if_conforto":
          this.form.if_conforto = key.value;
          break;
        case "if_roupa_cama":
          this.form.if_roupa_cama = key.value;
          break;
        case "if_limpeza":
          this.form.if_limpeza = key.value;
          break;
        case "if_conveniencia":
          this.form.if_conveniencia = key.value;
          break;
      }
    }
  }
};
</script>
