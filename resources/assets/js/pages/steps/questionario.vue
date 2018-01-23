<template>
  <div>
       <div class="row"> 

       </div>  
  </div>
</template>
<script>
import Form from "vform";
import Datepicker from "vuejs-datepicker";
export default {
  name: "app-fatores",
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
