<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Estacionamento">
        <b-form-radio-group v-model="form.if_estacionamento"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Recepção central">
        <b-form-radio-group v-model="form.if_recepcao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Setor de internação">
        <b-form-radio-group v-model="form.if_internacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Segurança">
        <b-form-radio-group v-model="form.if_internacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Sinalização">
        <b-form-radio-group v-model="form.if_sinalizacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>
    
    

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Grau de ruído">
        <b-form-radio-group v-model="form.if_grau_ruido"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Conforto">
        <b-form-radio-group v-model="form.if_conforto"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Limpeza">
        <b-form-radio-group v-model="form.if_limpeza"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-4">
      <b-form-group label="Atendimento as solicitações">
        <b-form-radio-group v-model="form.if_atendimento_solicitacoes"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-4">
      <b-form-group label="Instalações do apartamento">
        <b-form-radio-group v-model="form.if_instalacoes_apartamento"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Aparência e organização das instalações">
        <b-form-radio-group v-model="form.if_aparencia"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    

    <div v-if="tipo == 2" class="form-group col-md-3">
      <b-form-group label="Roupa de cama e banho">
        <b-form-radio-group v-model="form.if_roupa_cama"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>
    
    <div v-if="tipo == 2" class="form-group col-md-3">
      <b-form-group label="Atendimento as solicitações">
        <b-form-radio-group v-model="form.if_atendimento_solicitacoes"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-3">
      <b-form-group label="Serviços de conveniência">
        <b-form-radio-group v-model="form.if_conveniencia"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.if_observacoes" class="form-control" rows="4" id="comment"></textarea>
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
  name: "app-instalacoes",
  data() {
    return {
      questionario,
      form: new Form({
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
        if_atendimento_solicitacoes: null,
        if_conveniencia: null,
        if_observacoes: null
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
