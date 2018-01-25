<template>
  <div>
      <div class="row"> 

        <div class="form-group col-md-3">
          <label>Você é?</label>
            <b-form-radio-group v-model="form.tipo"
                                    :options="tipo_pessoa"
                                    plain/>
            <input v-if="form.servico == 1"  name="qual_servico" v-model="form.qual_servico" class="form-control" type="text" placeholder="Qual amigo ou familiar?">
        </div>

        <div class="form-group col-md-3">
          <label>Preenchido por?</label>
            <b-form-radio-group v-model="form.por"
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
          <app-datepicker v-model="form.nascimento" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
        </div>

        <div class="form-group col-md-2">
          <label>Internação inicío</label>
          <app-datepicker v-model="form.ini" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
        </div>

        <div class="form-group col-md-2">
          <label>Internação fim</label>
          <app-datepicker v-model="form.fim" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
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
export default {
  name: "app-identificacao",
  data() {
    return {
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
      form: new Form({})
    };
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    }
  },
  components: {
    "app-datepicker": Datepicker
  }
};
</script>
