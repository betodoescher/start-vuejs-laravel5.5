<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">


    <div v-if="tipo == 1" class="form-group col-md-3">
      <b-form-group label="Central de atendimento">
        <b-form-radio-group v-model="form.ta_central_agendamento"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Recepção">
        <b-form-radio-group v-model="form.ta_recepcionista"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Enfermagem">
        <b-form-radio-group v-model="form.ta_enfermagem"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Equipe médica">
        <b-form-radio-group v-model="form.ta_equipe_medica"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 1" class="form-group col-md-2">
      <b-form-group label="Entrega de laudos">
        <b-form-radio-group v-model="form.ta_entrega_laudo"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>
    
    

    <div class="form-group col-md-3">
      <b-form-group label="Administração da medicação">
        <b-form-radio-group v-model="form.ta_administracao_medicacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Imobilizações e curativos">
        <b-form-radio-group v-model="form.ta_imobilizacao_curativo"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Emergência">
        <b-form-radio-group v-model="form.ta_emergencia"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-2">
      <b-form-group label="Internação">
        <b-form-radio-group v-model="form.ta_internacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Realização de exames laboratoriais">
        <b-form-radio-group v-model="form.ta_exames"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-3">
      <b-form-group label="Realização de exames de imagem">
        <b-form-radio-group v-model="form.ta_realizacao_exame"
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

import { questionario } from "../../../services/store/quetionario";

export default {
  name: "app-atendimento",
  data() {
    return {
      questionario,
      form: new Form({
        ta_central_agendamento: null,
        ta_recepcionista: null,
        ta_enfermagem: null,
        ta_exames: null,
        ta_entrega_laudo: null,
        ta_equipe_medica: null,
        ta_realizacao_exame: null,
        ta_administracao_medicacao: null,
        ta_imobilizacao_curativo: null,
        ta_emergencia: null,
        ta_internacao: null
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
