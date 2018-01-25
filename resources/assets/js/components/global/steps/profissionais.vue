<template>
<div>
<div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div v-if="tipo == 1" class="form-group col-md-3">
      <b-form-group label="Central de agendamento">
        <b-form-radio-group v-model="form.atp_central_agendamento"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Recepcionista">
        <b-form-radio-group v-model="form.atp_recepcionista"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Segurança">
        <b-form-radio-group v-model="form.atp_seguranca"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Enfermagem">
        <b-form-radio-group v-model="form.atp_enfermagem"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-2">
      <b-form-group label="Equipe médica">
        <b-form-radio-group v-model="form.atp_equipe_medica"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    

    <div v-if="tipo == 3" class="form-group col-md-3">
      <b-form-group label="Técnico em imobilização">
        <b-form-radio-group v-model="form.atp_tec_imobilizacao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 1" class="form-group col-md-4">
      <b-form-group label="Téc. Em RX, tomografia, ressonância, laboratório">
        <b-form-radio-group v-model="form.atp_laboratorio"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div v-if="tipo == 1" class="form-group col-md-8">
      <b-form-group label="No agendamento foram repassadas todas as orientações sobre preparo e convênio?">
        <b-form-radio-group v-model="form.agendamento_orientacao"
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
  name: "app-profissionais",
  data() {
    return {
      questionario,
      form: new Form({
        atp_central_agendamento: null,
        atp_recepcionista: null,
        atp_seguranca: null,
        atp_enfermagem: null,
        atp_equipe_medica: null,
        atp_laboratorio: null,
        atp_tec_imobilizacao: null,
        agendamento_orientacao: null
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
