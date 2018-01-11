<template>
  <div class="app-layout">
    <navbar></navbar>

    <div class="container mt-4">
      <child/>
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'app-layout',

  components: {
    Navbar
  }
}
</script>
<style>
  .container {
    max-width: 95%;
  }
  .required:before {
    content: " *";
    color: #f00;
  }
</style>
