<template>
<div>
<card>
    <app-alert ref="alert" @endCountDown="goFirstStep" :dismissSecs="dismissSecs"></app-alert>
    <form @submit.prevent="validateBeforeSubmit">
     <form-wizard ref="wizard" @on-complete="onComplete" shape="circle" v-bind:title="title" v-bind:subtitle="subtitle" nextButtonText="Próximo"
                                backButtonText="Voltar" finishButtonText="Concluir" color="#3498db">

          <tab-content title="Informações adicionais" :before-change="()=>validateStep('app-identificacao')">
              <app-identificacao ref="app-identificacao" :tipo="form.tipo_pesquisa" @on-validate="mergePartialModels"></app-identificacao>
          </tab-content>

          <tab-content title="Sua escolha" :before-change="()=>validateStep('app-escolha')">
              <app-escolha ref="app-escolha" :tipo="form.tipo_pesquisa" @on-validate="mergePartialModels"></app-escolha>
          </tab-content>

          <tab-content title="Atenção e interesse dos profissionais" :before-change="()=>validateStep('app-profissionais')">
              <app-profissionais ref="app-profissionais" :tipo="form.tipo_pesquisa" @on-validate="mergePartialModels"></app-profissionais>
          </tab-content>

          <tab-content title="Tempo de atendimento" :before-change="()=>validateStep('app-atendimento')">
              <app-atendimento ref="app-atendimento" :tipo="form.tipo_pesquisa" @on-validate="mergePartialModels"></app-atendimento>
          </tab-content>

          <tab-content title="Instalações físicas" :before-change="()=>validateStep('app-instalacoes')">
              <app-instalacoes ref="app-instalacoes" :tipo="form.tipo_pesquisa" @on-validate="mergePartialModels"></app-instalacoes>
          </tab-content>

          <tab-content title="Conclusão" :before-change="()=>validateStep('app-conclusao')">
              <app-conclusao ref="app-conclusao" :tipo="form.tipo_pesquisa" @on-validate="mergePartialModels"></app-conclusao>
          </tab-content>

      </form-wizard>
    </form>
  </card>
</div>
</template>
<script>
import { mapGetters } from "vuex";
import Vue from "vue";
import VueFormWizard from "vue-form-wizard";

import Form from "vform";
import Identificacao from "../../components/global/steps/identificacao";
import Escolha from "../../components/global/steps/escolha";
import Profissionais from "../../components/global/steps/profissionais";
import Atendimento from "../../components/global/steps/atendimento";
import Instalacoes from "../../components/global/steps/instalacoes";
import Conclusao from "../../components/global/steps/conclusao";

import Service from "../../services/FormularioService";

Vue.use(VueFormWizard);

export default {
  name: "app-exames",
  data: () => ({
    dismissSecs: 5,
    title: "Pronto Atendimento",
    subtitle: "Pesquisa de satisfação",
    form: new Form({
      tipo_pesquisa: 3
    })
  }),
  methods: {
    onComplete() {

      this.form.fator_escolha = JSON.stringify(this.form.fator_escolha);

      Service.post(this.form)
        .then(response => {
          this.$refs["alert"].showAlertSuccess();
          this.$dialog
              .confirm("Número do protocolo: " + response.data.protocolo.protocolo, {
                  loader: true,
                  okText: "Ok",
                  cancelText: "Fechar"
              }).then(dialog => {
                  dialog.close();
              })
              .catch(() => {
                  dialog.close();
              });
        })
        .catch(e => {
          console.log(e);
          this.$refs["alert"].showAlertErrorMsg("Erro ao salvar formulário!");
        });

       this.form.reset();
    },
    validateStep(name) {
      var refToValidate = this.$refs[name];
      return refToValidate.validate();
    },
    mergePartialModels(model, isValid) {
      if (isValid) {
        // merging each step model into the final model
        this.form = Object.assign({}, this.form, model.form);
      }
    },
    goFirstStep() {
      this.$refs.wizard.reset();
      this.$refs["app-identificacao"].form.reset();
      this.$refs["app-escolha"].form.reset();
      this.$refs["app-profissionais"].form.reset();
      this.$refs["app-atendimento"].form.reset();
      this.$refs["app-instalacoes"].form.reset();
      this.$refs["app-conclusao"].form.reset();
    }
  },
  components: {
    "app-identificacao": Identificacao,
    "app-escolha": Escolha,
    "app-profissionais": Profissionais,
    "app-atendimento": Atendimento,
    "app-instalacoes": Instalacoes,
    "app-conclusao": Conclusao
  }
};
</script>
