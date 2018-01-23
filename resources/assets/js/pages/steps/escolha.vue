<template>
  <div>
       <div class="row"> 

         <div class="form-group col-md-12">
          <label>Que fatores lhe enfluenciaram na escolha pela Casa de Saúde São José?</label>
          <select v-model="form.por" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                <option value="1">Proximidade da residência</option>
                <option value="2">Familiares</option>
                <option value="3">Internet</option>
                <option value="4">Médico</option>
                <option value="5">Publicidade</option>
                <option value="6">Indicação de empresa.</option>
                <option value="7">Outros.</option>
          </select>
          <input v-if="form.por == 6"  name="qual_empresa" v-model="form.qual_empresa" class="form-control" type="text" placeholder="Qual?">
          <input v-if="form.por == 7"  name="outros" v-model="form.outros" class="form-control" type="text" placeholder="Quais?">
        </div>

        <div class="form-group col-md-12">
          <label>Você já havia utilizado nossos serviços?</label>
          <select v-model="form.servico" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                <option value="1">Sim</option>
                <option value="2">Não</option>
          </select>
          <input v-if="form.por == 1"  name="qual_servico" v-model="form.qual_servico" class="form-control" type="text" placeholder="Qual?">
        </div>

         

       </div>
  </div>
</template>
<script>
import Form from "vform";
export default {
  name: "app-escolha",
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
  }
};
</script>
