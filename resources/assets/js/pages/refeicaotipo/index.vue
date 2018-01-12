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
              <select v-model="form.codigo_tipo_refeicao" v-validate="'required'" name="tipo" :class="{'form-control': true }">
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
import Vue from "vue"
import Form from "vform"
import Service from "../../services/RefeicaoTipoService"
import { tiporefeicao } from '../../services/store/tiporefeicao'
import Grid from "../../components/global/grid"

export default {
  scrollToTop: false,
  name: "app-refeicaotipo",
  metaInfo() {
    return { title: this.$t("settings") }
  },
  data: () => ({
    tiporefeicao,
    form: new Form({
      id: null,
      descricao: "",
      codigo_tipo_refeicao: "",
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
        field: "codigo_tipo_refeicao",
        type: "number",
        html: false,
        filterable: true,
        placeholder: "Filtro",
        thClass: "text-center",
        tdClass: "text-center",
        width: "20%"
      },
      {
        label: "Hora inicial",
        field: "hora_inicio_refeicao",
        thClass: "text-center",
        tdClass: "text-center",
        width: "10%"
      },
      {
        label: "Hora final",
        field: "hora_final_refeicao",
        thClass: "text-center",
        tdClass: "text-center",
        width: "10%"
      },
      {
        label: "",
        field: "",
        type: "name",
        html: true,
        width: "35%"
      }
    ],
    rows: []
  }),
  created() {
    this.gridRefresh()
  },
  methods: {
    async validateBeforeSubmit() {
        this.$validator.validateAll().then(result => {
          if (result){
            var retorno = false
            if (this.form.id) {
              retorno = this.form.put(Service.url + this.form.id)
            } else {
              retorno = this.form.post(Service.url)
            }
            const { data } = retorno
            this.form.reset()
            this.$validator.reset()
            this.gridRefresh()
            this.$refs["alert"].showAlertSuccess()
          }
          return 
        })
    },
    popular (id) {
      Service.get(id).then(response => {
        this.form = new Form(Object.assign({}, this.form, response.data))
      })
    },
    excluir (id) {
      // var res = Service.del(param).then(response => {
      //   return response.data
      // })

      // if (res) this.$refs["alert"].showAlertDelete()

      this.gridRefresh()
    },
    gridRefresh() {
      Service.get().then(response => {
        this.rows = response.data.data
      })
    }
  }
}
</script>

