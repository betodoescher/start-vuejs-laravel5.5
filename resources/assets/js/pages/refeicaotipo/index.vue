<template>
<div>
  <card title="Tipo de refeição">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')"></alert-success>

      <!-- Descrição -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">Descrição</label>
        <div class="col-md-7">
          <input v-model="form.descricao" type="text" name="name" class="form-control"
            :class="{ 'is-invalid': form.errors.has('descricao') }">
          <has-error :form="form" field="descricao"></has-error>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button type="success" :loading="form.busy">{{ $t('update') }}</v-button>
        </div>
      </div>
    </form>
  </card>
  <br>
  <div>
    <div class="ui container">
     <vue-good-table
      :columns="columns"
      :rows="rows"
      nextText="Próximo"
      prevText="Anterior"
      globalSearchPlaceholder="Filtro"
      rowsPerPageText="Linhas por página"
      :paginate="true">

      <template slot="table-row-after" slot-scope="props">
         <button class="btn btn-default" @click="onClick('edit-item', props.row.id)"><i class="fa fa-edit"></i> Editar</button>&nbsp;&nbsp;
         <button class="btn btn-danger" @click="onClick('delete-item', props.row.id)"><i class="fa fa-trash"></i> Excluir</button>&nbsp;&nbsp;
      </template>
     </vue-good-table>
    </div>
  </div>
</div>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'
import Service from '../../services/RefeicaoTipoService'
import Vue from 'vue';
import VueGoodTable from 'vue-good-table';

Vue.use(VueGoodTable);

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      descricao: ''
    }),
    columns: [
        {
          label: 'ID',
          field: 'id',
          type: 'number',
          html: false,
          filterable: true,
          placeholder: 'Filtro',
          thClass: 'text-center',
          tdClass: 'text-center'
        },
        {
          label: 'Descrição',
          field: 'descricao',
          filterable: true,
          placeholder: 'Filtro',
          width: '200px'
        },
        {
          label: 'Tipo',
          field: 'codigo_tipo_refeicao',
          type: 'number',
          html: false,
          filterable: true,
          placeholder: 'Filtro',
          thClass: 'text-center',
          tdClass: 'text-center'
        },
        {
          label: 'Hora inicial',
          field: 'hora_inicio_refeicao',
          thClass: 'text-center',
          tdClass: 'text-center'
        },
        {
          label: 'Hora final',
          field: 'hora_final_refeicao',
          thClass: 'text-center',
          tdClass: 'text-center'
        },
        {
          label: '',
          field: '',
          type: 'name',
          html: true,
          tdClass: 'text-center'
        },
      ],
      rows: [
      ]
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),
  created () {
    Service.get().then(response => {
         this.rows = response.data.data
    })
  },

  methods: {
    async update () {
// console.log(this.form)
         Service.put(this.form).then(response => {
            console.log(response)
         })
    },
    onClick (action, id) {
      if (action === 'edit-item') {
        Service.get(id).then(response => {
           this.form.descricao = response.data.descricao
        })
      } else if (action === 'delete-item') {
        Service.get().then(response => {
            this.rows = response.data.data
        })
      }
    }
  }
}
</script>
