<template>
<div>
  <card title="Balança" class="ui container">
    <form @submit.prevent="validateBeforeSubmit">
      <app-alert ref="alert"></app-alert>
     
      <div class="row"> 

        <div class="form-group col-md-6">
          <label class="required">Descrição</label>
          <input name="descricao" v-model="form.descricao" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('descricao') }" type="text">
          <div class="help-block invalid-feedback"  v-if="errors.has('descricao')">{{errors.first('descricao')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Porta</label>
          <input name="porta" v-model="form.porta" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('descricao') }" type="text">
          <div class="help-block invalid-feedback"  v-if="errors.has('porta')">{{errors.first('porta')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Velocidade</label>
          <input name="velocidade" v-model="form.velocidade_porta" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('velocidade') }" type="number">
          <div class="help-block invalid-feedback"  v-if="errors.has('velocidade')">{{errors.first('velocidade')}}</div>
        </div>
        
        <div class="form-group col-md-6">
          <label class="required">Bits dados</label>
          <input name="bits dados" v-model="form.bits_dados" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('bits dados') }" type="number">
          <div class="help-block invalid-feedback"  v-if="errors.has('bits dados')">{{errors.first('bits dados')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Bits parada</label>
          <input name="bits parada" v-model="form.bits_parada" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('bits parada') }" type="number">
          <div class="help-block invalid-feedback"  v-if="errors.has('bits parada')">{{errors.first('bits parada')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Paridade</label>
          <input name="paridade" v-model="form.paridade" v-validate="'required'"  :class="{'form-control': true, 'is-invalid': errors.has('paridade') }" type="number">
          <div class="help-block invalid-feedback"  v-if="errors.has('paridade')">{{errors.first('paridade')}}</div>
        </div>

        <div class="form-group col-md-6">
          <label class="required">Bloqueada</label>
              <select v-model="form.bloqueada" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                  <option value="S">Sim</option>
                  <option value="N">Não</option>
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
import Vue from "vue"
import Form from "vform"
import Service from "../../services/BalancaService"
import Grid from "../../components/global/grid"

export default {
  scrollToTop: false,
  name: "app-balanca",
  data: () => ({
    form: new Form({
      id: null,
      descricao: "",
      porta: "",
      velocidade_porta: "",
      bits_dados: "",
      bits_parada: "",
      paridade: "",
      bloqueada: ""
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
        width: "20%"
      },
      {
        label: "Porta",
        field: "porta",
        filterable: true,
        placeholder: "Filtro",
        width: "10%"
      },
      {
        label: "Velocidade",
        field: "velocidade_porta",
        filterable: true,
        placeholder: "Filtro",
        width: "10%"
      },
      {
        label: "Bits dados",
        field: "bits_dados",
        filterable: true,
        placeholder: "Filtro",
        width: "10%"
      },
      {
        label: "Bits parada",
        field: "bits_parada",
        filterable: true,
        placeholder: "Filtro",
        width: "10%"
      },
      {
        label: "Paridade",
        field: "paridade",
        filterable: true,
        placeholder: "Filtro",
        width: "10%"
      },
      {
        label: "Bloqueada",
        field: "bloqueada_desc",
        filterable: true,
        placeholder: "Filtro",
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

        var dados = response.data.data
          for (var key in dados) {
              if(dados[key].bloqueada == 'S'){
                  dados[key].bloqueada_desc = 'Sim'
              } else {
                dados[key].bloqueada_desc = 'Não'
              }
          }
         this.rows = dados
      })
    }
  }
}
</script>

