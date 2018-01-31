<template>
<div>
  <card title="Usuários" class="ui container">
    <form @submit.prevent="validateBeforeSubmit">
      <app-alert ref="alert"></app-alert>
            
      <div class="row"> 

        <div class="form-group col-md-6">
          <label class="required">Nome</label>
          <input name="descricao" v-model="form.descricao" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('descricao') }" type="text">
          <div class="help-block invalid-feedback"  v-if="errors.has('descricao')">{{errors.first('descricao')}}</div>
        </div>

         <div class="form-group col-md-6">
          <label class="required">Email</label>
          <input name="email" v-model="form.descricao" v-validate="'required|email'"  :class="{'form-control': true, 'is-invalid': errors.has('email') }" type="text">
          <div class="help-block invalid-feedback"  v-if="errors.has('email')">{{errors.first('email')}}</div>
        </div>

         <div class="form-group col-md-6">
          <label class="required">Senha</label>
          <input name="email" v-model="form.password" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('password') }" type="text">
          <div class="help-block invalid-feedback"  v-if="errors.has('password')">{{errors.first('password')}}</div>
        </div>

         <div class="form-group col-md-6">
          <label class="required">Senha</label>
          <input name="email" v-model="form.password_confirmation" v-validate="'required'"  :class="{'form-control': true}" type="text">
        </div>

        <div class="form-group col-md-6">
          <label class="required">Tipo</label>
              <select v-model="form.tipo_acesso" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                  <option v-for="option in tipo_acessos" v-bind:value="option.value" v-bind:key="option.value">
                      {{ option.text }}
                  </option>
              </select>
          <div class="help-block invalid-feedback"  v-if="errors.has('tipo')">{{errors.first('tipo')}}</div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-12 ml-md-auto">
           <v-button type="success" :loading="form.busy">Salvar</v-button> 
        </div>
      </div>

    </form>
  </card>
  <br>
  <card>
    <div>
     <app-grid :columns="columns" :rows="rows" @populate="popular" @delete="excluir" />
    </div>
  </card>
</div>
</template>

<script>
import Vue from "vue";
import Form from "vform";
import Service from "../../services/RefeicaoTipoService";
import Grid from "../../components/global/grid";
import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);

export default {
  scrollToTop: false,
  name: "app-usuarios",
  data: () => ({
    tipo_acessos: [
        { text: "Adminstrador", value: 1 },
        { text: "Pesquisa", value: 2 },
        { text: "Dashboard", value: 3 }
      ],
    form: new Form({
      id: null,
      nome: null,
      email: null,
      password: null,
      password_confirmation: null,
      tipo_acesso: null
    }),
    columns: [
      {
        label: "ID",
        field: "id",
        type: "number",
        html: false,
        filterable: true,
        placeholder: "Filtro",
        thClass: "text-center",
        tdClass: "text-center",
        width: "5%"
      },
      {
        label: "Nome",
        field: "nome",
        filterable: true,
        placeholder: "Filtro"
      },
      {
        label: "Email",
        field: "email",
        filterable: true,
        placeholder: "Filtro"
      },
      {
        label: "Tipo",
        field: "refeicao_classificacao.descricao",
        filterable: true,
        placeholder: "Filtro"
      },
      {
        label: "",
        field: "",
        type: "name",
        html: true,
        tdClass: "text-center",
        width: "20%"
      }
    ],
    rows: []
  }),
  created() {
    this.gridRefresh();
  },
  methods: {
    async validateBeforeSubmit() {
      this.$validator.validateAll().then(result => {
        if (result) {
          var ini = moment("2018/01/01 " + this.form.hora_inicio_refeicao);
          var fim = moment("2018/01/01 " + this.form.hora_final_refeicao);

          if (!ini.isSameOrAfter(fim)) {
            if (this.validaPeriodo(ini, fim)) {
              var retorno = false;
              if (this.form.id) {
                retorno = this.form.put(Service.url + this.form.id);
              } else {
                retorno = this.form.post(Service.url);
              }
              const { data } = retorno;
              this.form.reset();
              this.$validator.reset();
              this.gridRefresh();
              this.$refs["alert"].showAlertSuccess();
            }
          } else {
            this.$refs["alert"].showAlertErrorMsg(
              "Hora inicial não pode ser menor ou igual a hora final!"
            );
          }
        }
        return;
      });
    },
    popular(id) {
      Service.get(id).then(response => {
        this.form = new Form(Object.assign({}, this.form, response.data));
      });
    },
    excluir(id) {
      var res = Service.del(id).then(response => {});

      if (res) this.$refs["alert"].showAlertDelete();

      this.gridRefresh();
    },
    gridRefresh() {
      Service.get().then(response => {
        this.rows = response.data.data;
      });
    },
    validaPeriodo(ini, fim) {
      var dados = this.rows;
      var retorno = true;
      for (var key in dados) {
        var gridIni = moment("2018/01/01 " + dados[key].hora_inicio_refeicao);
        var gridFim = moment("2018/01/01 " + dados[key].hora_final_refeicao);

        console.log(fim.isBetween(gridIni, gridFim));
        if (this.form.id !== dados[key].id) {
          if (
            ini.isBetween(gridIni, gridFim) ||
            fim.isBetween(gridIni, gridFim)
          ) {
            this.$refs["alert"].showAlertErrorMsg(
              "Período já registrado no sistema!"
            );
            retorno = false;
            continue;
          }
        }
      }
      return retorno;
    }
  }
};
</script>
