<template>
  <div>
      <div class="row"> 
<pre>{{form}}</pre>
        <div class="form-group col-md-3">
          <label>Você é?</label>
            <b-form-radio-group v-model="form.idetificacao"
                                    :options="tipo_pessoa"
                                    plain/>
            <input v-if="form.servico == 1"  name="qual_servico" v-model="form.qual_servico" class="form-control" type="text" placeholder="Qual amigo ou familiar?">
        </div>

        <div class="form-group col-md-3">
          <label>Preenchido por?</label>
            <b-form-radio-group v-model="form.prenchido_por"
                                    :options="tipo_acompanhante"
                                    plain/>
            <input v-if="form.servico == 1"  name="qual_servico" v-model="form.qual_servico" class="form-control" type="text" placeholder="Qual amigo ou familiar?">
          <input v-if="form.por == 3"  name="outros" v-model="form.outros" class="form-control" type="text" placeholder="Quem está preenchendo?">
        </div>

        <div class="form-group col-md-6">
          <label>Nome do cliente paciente</label>
          <input name="nome" v-model="form.nome" class="form-control" type="text">
        </div>

        <div class="form-group col-md-2">
          <label>Data de nascimento</label>
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
          <label>Telefone para contato</label>
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
        <div v-if="tipo == 2" class="form-group col-md-6">
          <label>Unidade de internação</label>
              <select v-model="form.unidade_internacao" class="form-control">
                  <option v-for="option in andar" v-bind:value="option.value" v-bind:key="option.value">
                      {{ option.text }}
                  </option>
              </select>
        </div>

        <div v-if="tipo == 2" class="form-group col-md-6">
          <label>Quarto</label>
          <input name="quarto" v-model="form.quarto" class="form-control" type="integer">
        </div>

        <div v-if="tipo == 2" class="form-group col-md-3">
          <label>Impedimento</label>
            <b-form-radio-group v-model="form.impedimentos"
                                    :options="impedimento"
                                    plain/>
        </div>

    </div>
  </div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import Datepicker from "vuejs-datepicker";
import { FormRadio } from "bootstrap-vue/es/components";
import { FormGroup } from "bootstrap-vue/es/components";

Vue.use(FormRadio);
Vue.use(FormGroup);

import { unidade } from "../../../services/store/unidade";
import { andar } from "../../../services/store/andar";

import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);

export default {
  name: "app-identificacao",
  data() {
    return {
      unidade,
      andar,
      tipo_pessoa: [
        { text: "Paciente", value: 1 },
        { text: "Visitante", value: 2 },
        { text: "Acompanhante", value: 3 }
      ],
      tipo_acompanhante: [
        { text: "Paciente", value: 1 },
        { text: "Acompanhante", value: 2 },
        { text: "Outros", value: 3 }
      ],
      impedimento: [
        { text: "Restrição de visita", value: 1 },
        { text: "Paciente de longa permanência", value: 2 }
      ],
      form: new Form({
        idetificacao: null,
        prenchido_por: null,
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
    }
  },
  components: {
    "app-datepicker": Datepicker
  }
};
</script>
