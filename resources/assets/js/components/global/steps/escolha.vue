<template>
  <div>
       <div class="row"> 

        <div class="form-group col-md-12">
          <app-radio label="Que fatores lhe enfluenciaram na escolha pela Casa de Saúde São José?" :selected="form.fator_escolha" field="fator_escolha" :options="fatores" @setValue="setValueButton" />
          <!-- <b-form-group label="Que fatores lhe enfluenciaram na escolha pela Casa de Saúde São José?">
            <b-form-checkbox-group plain v-model="form.fator_escolha" :options="fatores" /> 
            <input v-if="buscaFator(6)"  name="qual_empresa" v-model="form.indicacao_qual_empresa" class="form-control" type="text" placeholder="Qual empresa?">
            <input v-if="buscaFator(7)"  name="outros" v-model="form.fator_escolha_outro" class="form-control" type="text" placeholder="Outros quais?">
           </b-form-group> -->
            <input v-if="form.fator_escolha == 6"  name="qual_empresa" v-model="form.indicacao_qual_empresa" class="form-control" type="text" placeholder="Qual empresa?">
            <input v-if="form.fator_escolha == 7"  name="outros" v-model="form.fator_escolha_outro" class="form-control" type="text" placeholder="Outros quais?">
        </div>

        <div class="form-group col-md-12">
          <app-radio label="Recomendaria nosso hospital a um familiar ou amigo?" :selected="form.utilizou_servico_antes" field="utilizou_servico_antes" :options="simnao" @setValue="setValueButton" />
          <input v-if="form.utilizou_servico_antes == 1"  name="qual_servico" v-model="form.utilizou_servico_antes_qual" class="form-control" type="text" placeholder="Qual amigo ou familiar?">
        </div>


      </div>
  </div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import { FormCheckbox } from "bootstrap-vue/es/components";
import { FormRadio } from "bootstrap-vue/es/components";
import { FormGroup } from "bootstrap-vue/es/components";

import { fatores } from "../../../services/store/fatores" 
import { simnao } from "../../../services/store/simnao" 

Vue.use(FormRadio);
Vue.use(FormGroup);
Vue.use(FormCheckbox);

export default {
  name: "app-escolha",
  data() {
    return {
      fatores,
      simnao,
      form: new Form({
        fator_escolha: null,
        indicacao_qual_empresa: null,
        fator_escolha_outro: null,
        utilizou_servico_antes: null,
        utilizou_servico_antes_qual: null
      }),
      originalForm: {}
    };
  },
  props: {
    tipo: {
      type: Number
    },
    originalData: {
      type: Object
    }
  },
  created () {
    this.originalForm = this.form
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    },
    buscaFator(id) {
      for (var key in this.form.fator_escolha) {
        if (this.form.fator_escolha[key] == id) {
          return true;
          continue;
        }
      }
    },
    setValueButton(key, field) {
      switch (field) {
        case "fator_escolha":
          this.form.fator_escolha = key.value;
          break;
        case "utilizou_servico_antes":
          this.form.utilizou_servico_antes = key.value;
          break;
      }
    }
  }
};
</script>
<style>

.form-check-input {
	width: 20px;
	height: 20px;
	background: #444;
	margin: 20px 60px;

	border-radius: 50px;
	position: relative;
}

/* .form-check-input {
  width: 15px;
  height: 15px;
  position: relative;
  margin: 20px auto;
  background: #fcfff4;
  background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
  label {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 4px;
    left: 4px;
    cursor: pointer;
    background: linear-gradient(top, #222 0%, #45484d 100%);
    box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
    &:after {
      content: '';
      width: 16px;
      height: 16px;
      position: absolute;
      top: 2px;
      left: 2px;
      background: $activeColor;
      background: linear-gradient(top, $activeColor 0%, $darkenColor 100%);
      box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
      opacity: 0;
    }
    &:hover::after {
      opacity: 0.3;
    }
  }
  input[type=checkbox] {
    visibility: hidden;
    &:checked + label:after {
      opacity: 1;
    }   
  } 
} */

</style>
