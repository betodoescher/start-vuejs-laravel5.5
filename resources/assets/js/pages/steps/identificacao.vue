<template>
  <div>
      <div class="row"> 

        <div class="form-group col-md-6">
          <label>Você é?</label>
          <select v-model="form.tipo" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                <option value="1">Paciente</option>
                <option value="2">Visitante</option>
                <option value="3">Acompanhante</option>
          </select>
        </div>

        <div class="form-group col-md-6">
          <label>Nome</label>
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
          <label>Preenchido por?</label>
          <select v-model="form.por" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                <option value="1">Paciente</option>
                <option value="2">Acompanhante</option>
                <option value="3">Outros</option>
          </select>
          <input v-if="form.por == 3"  name="outros" v-model="form.outros" class="form-control" type="text" placeholder="Quais?">
        </div>

        <div class="form-group col-md-6">
          <label>Endereço</label>
          <input name="endereco" v-model="form.endereco" class="form-control" type="text">
        </div>

        <div class="form-group col-md-3">
          <label>Telefone para contato</label>
           <the-mask :mask="['(##) ####-####', '(##) #####-####']" v-model.trim="form.telefone" class="form-control"  type="text"/>
        </div>

        <div class="form-group col-md-3">
          <label>Email</label>
           <input  v-model.trim="form.email" class="form-control"  type="text"/>
        </div>

    </div>
  </div>
</template>
<script>
import Form from "vform";
import Datepicker from "vuejs-datepicker";
export default {
  name: "app-identificacao",
  data() {
    return {
      form: new Form({
      })
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
