<template>
<div>
  <card title="Tipo de refeição" class="ui container">
    <form @submit.prevent="validateBeforeSubmit">
      <app-alert ref="alert"></app-alert>
     
      <div class="row"> 

        <div class="form-group col-md-6">
          <label class="required">Descrição</label>
          <input name="descricao" v-model="form.descricao" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('descricao') }" type="text">
          <div class="help-block invalid-feedback"  v-if="errors.has('descricao')">{{errors.first('descricao')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Tipo</label>
              <select v-model="form.refeicao_classificacao_id" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                  <option v-for="option in tiporefeicao" v-bind:value="option.value" v-bind:key="option.value">
                      {{ option.text }}
                  </option>
              </select>
          <div class="help-block invalid-feedback"  v-if="errors.has('tipo')">{{errors.first('tipo')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Início</label>
          <the-mask :masked="true" mask="##:##" name="inicio" v-model.trim="form.hora_inicio_refeicao" v-validate="'required'" :class="{'form-control': true, 'is-invalid': errors.has('inicio') }"  type="text"/>
          <div class="help-block invalid-feedback"  v-if="errors.has('inicio')">{{errors.first('inicio')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Fim</label>
          <the-mask :masked="true" mask="##:##" name="inicio" v-model.trim="form.hora_final_refeicao" v-validate="'required'" :class="{'form-control': true, 'is-invalid': errors.has('inicio') }"  type="text"/>
          <div class="help-block invalid-feedback"  v-if="errors.has('fim')">{{errors.first('fim')}}</div>
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
import { tiporefeicao } from "../../services/store/tiporefeicao";
import Grid from "../../components/global/grid";
import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);

export default {
  scrollToTop: false,
  name: "app-refeicaotipo",
  data: () => ({
    tiporefeicao,
    form: new Form({
      id: null,
      descricao: "",
      refeicao_classificacao_id: "",
      hora_inicio_refeicao: "",
      hora_final_refeicao: ""
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
        label: "Descrição",
        field: "descricao",
        filterable: true,
        placeholder: "Filtro",
        width: "40%"
      },
      {
        label: "Tipo",
        field: "refeicao_classificacao.descricao",
        filterable: true,
        placeholder: "Filtro",
        width: "20%"
      },
      {
        label: "Hora inicial",
        field: "hora_inicio_refeicao",
        filterable: true,
        tdClass: "text-center",
        width: "10%"
      },
      {
        label: "Hora final",
        field: "hora_final_refeicao",
        filterable: true,
        tdClass: "text-center",
        width: "10%"
      },
      {
        label: "",
        field: "",
        type: "name",
        html: true,
        tdClass: "text-center",
        width: "35%"
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
      // var res = Service.del(param).then(response => {
      //   return response.data
      // })

      // if (res) this.$refs["alert"].showAlertDelete()

      this.gridRefresh();
    },
    gridRefresh() {
      Service.get().then(response => {
        this.rows = response.data.data;
        // temporário
        // var dados = response.data.data;
        // for (var key in dados) {
        //   for (var keyTipo in this.tiporefeicao) {
        //     if (
        //       this.tiporefeicao[keyTipo].value ==
        //       dados[key].codigo_tipo_refeicao
        //     ) {
        //       dados[key].codigo_tipo_descricao = this.tiporefeicao[
        //         keyTipo
        //       ].text;
        //     }
        //   }
        // }
        // this.rows = dados;
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
