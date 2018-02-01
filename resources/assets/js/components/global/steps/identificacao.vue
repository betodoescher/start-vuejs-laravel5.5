<template>
  <div>
      <div class="row"> 

        <div class="form-group col-md-6">
          <label>Nome do cliente paciente</label>
          <input name="nome" v-model="form.nome" class="form-control" type="text">
        </div>

        <div class="form-group col-md-2">
          <label>Nascimento</label>
          <app-datepicker v-model="form.data_nascimento" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
        </div>

        <div class="form-group col-md-2">
          <label>Internação inicío</label>
          <app-datepicker v-model="form.data_inicio_internacao" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
        </div>

        <div class="form-group col-md-2">
          <label>Internação fim</label>
          <app-datepicker v-model="form.data_fim_internacao" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
        </div>

        <div class="form-group col-md-6">
          <label>Endereço</label>
          <input name="endereco" v-model="form.endereco" class="form-control" type="text">
        </div>

        <div class="form-group col-md-3">
          <label>Telefone</label>
           <the-mask :mask="['(##) ####-####', '(##) #####-####']" v-model.trim="form.telefone" class="form-control" placeholder="( )"  type="text"/>
        </div>

        <div class="form-group col-md-3">
          <label>Email</label>
           <input  v-model.trim="form.email" class="form-control"  type="text"/>
        </div>


        
        <div v-if="tipo == 2" class="form-group col-md-6">
          <label>Unidade de internação</label>
              <select v-model="form.unidade_internacao" class="form-control">
                  <option v-for="option in unidade" v-bind:value="option.value" v-bind:key="option.value">
                      {{ option.text }}
                  </option>
              </select>
        </div>
        <div v-if="tipo == 2" class="form-group col-md-3">
          <label>Andar</label>
              <select v-model="form.andar" class="form-control">
                  <option v-for="option in andar" v-bind:value="option.value" v-bind:key="option.value">
                      {{ option.text }}
                  </option>
              </select>
        </div>

        <div v-if="tipo == 2" class="form-group col-md-3">
          <label>Quarto</label>
          <input name="quarto" v-model="form.quarto" class="form-control" type="integer">
        </div>

        <div class="form-group col-md-6">
          <app-radio label="Você é?" :selected="form.idetificacao" field="idetificacao" :options="tipo_pessoa" @setValue="setValueButton" />
        </div>

        <div class="form-group col-md-6">
          <app-radio label="Preenchido por?" :selected="form.prenchido_por" field="prenchido_por" :options="tipo_acompanhante" @setValue="setValueButton" />
          
          <input v-if="form.prenchido_por == 3"  name="outros" v-model="form.preenchido_por_nome" class="form-control" type="text" placeholder="Quem está preenchendo?">
        </div>

        <div v-if="tipo == 2" class="form-group col-md-12">
          <app-radio label="Impedimento?" :selected="form.impedimentos" field="impedimentos" :options="impedimento" @setValue="setValueButton" />
        </div>

    </div>
  </div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import Datepicker from "vuejs-datepicker";

import Radio from "../../global/Radio"

import { unidade } from "../../../services/store/unidade";
import { andar } from "../../../services/store/andar";
import { tipo_pessoa } from "../../../services/store/tipo_pessoa";
import { tipo_acompanhante } from "../../../services/store/tipo_acompanhante";
import { impedimento } from "../../../services/store/impedimento";

import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);

export default {
  name: "app-identificacao",
  data() {
    return {
      unidade,
      andar,
      tipo_pessoa,
      tipo_acompanhante,
      impedimento,
      form: new Form({
        idetificacao: null,
        prenchido_por: null,
        preenchido_por_nome: null,
        nome: null,
        data_nascimento: null,
        data_inicio_internacao: null,
        data_fim_internacao: null,
        endereco: null,
        telefone: null,
        email: null,
        unidade_internacao: null,
        andar: null,
        quarto: null,
        impedimentos: null
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
      if (this.form.data_nascimento) {
        this.form.data_nascimento = moment(this.form.data_nascimento).format(
          "YYYY-MM-DD"
        );
      }
      if (this.form.data_inicio_internacao) {
        this.form.data_inicio_internacao = moment(this.form.data_inicio_internacao).format(
          "YYYY-MM-DD"
        );
      }
      if (this.form.data_fim_internacao) {
        this.form.data_fim_internacao = moment(this.form.data_fim_internacao).format(
          "YYYY-MM-DD"
        );
      }

      this.$emit("on-validate", this.$data, true);
      return true;
    },
    setValueButton(key, field) {

      switch (field) {
        case "idetificacao":
          this.form.idetificacao = key.value;
          break;
        case "prenchido_por":
          this.form.prenchido_por = key.value;
          break;
        case "impedimentos":
          this.form.impedimentos = key.value;
          break;
       
      }
    },
  },
  components: {
    "app-datepicker": Datepicker
  }
};
</script>
