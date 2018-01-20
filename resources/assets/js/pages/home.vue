<template>
  <div class="col-md-12 row">
      <div  class="col-md-2" style="display:block;">
        <router-link :to="{ name: 'refeicaotipo' }" class="wraper">
          <div class="menuItem">
            <div class="innerItem">
              <i class="fa fa-utensils iconMenuItem"></i>
              <p class="titleMenuItem text-center">Refeição</p>
            </div>
          </div>
        </router-link>
      </div>
      <div  class="col-md-2" style="display:block;">
        <router-link :to="{ name: 'balanca' }" class="wraper">
          <div class="menuItem">
            <div class="innerItem">
              <i class="fa fa-balance-scale iconMenuItem"></i>
              <p class="titleMenuItem text-center">Balança</p>
            </div>
          </div>
        </router-link>
      </div>
      <div  class="col-md-2" style="display:block;">
        <router-link :to="{ name: 'pesagem' }" class="wraper">
          <div class="menuItem">
            <div class="innerItem">
              <i class="fa fa-list-ol iconMenuItem"></i>
              <p class="titleMenuItem text-center">Pesagem</p>
            </div>
          </div>
        </router-link>
      </div>
      <div  class="col-md-2" style="display:block;">
        <router-link :to="{ name: 'fechamento' }" class="wraper">
          <div class="menuItem">
            <div class="innerItem">
              <i class="fa fa-cogs iconMenuItem"></i>
              <p class="titleMenuItem text-center">Fechamento</p>
            </div>
          </div>
        </router-link>
      </div>
  </div>
</template>

<script>
export default {
  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
<style scoped>
.wraper {
  position: relative;
  display: block;
  margin-bottom: 30px;
  background: #f8f8f8;
  border-radius: 4px;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.wraper:before {
  display: block;
  content: "";
  width: 100%;
  padding-top: 100%;
}
.wraper > .menuItem {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.menuItem > .innerItem {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
}
.innerItem > .iconMenuItem {
  font-size: 38px;
  color: #26b3e8;
  text-align: center;
  display: block;
  margin: 10px auto 0px auto;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
.innerItem > .titleMenuItem {
  font-weight: 300;
  margin: 10px 0;
  line-height: 1.2;
  font-size: 20px;
  text-align: center;
  color: #1d71b8;
  -webkit-transition: color 0.4s ease-in-out;
  -moz-transition: color 0.4s ease-in-out;
  transition: color 0.4s ease-in-out;
}
.innerItem > ul {
  border-top: 1px solid #ddd;
  padding-top: 10px;
  margin-top: 10px;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
.innerItem > ul li {
  color: #aaa;
}

.wraper:hover {
  transform: scale(1.1);
  background: #26b3e8;
  z-index: 1;
  box-shadow: 1px 1px 1px #ccc;
  -webkit-box-shadow: 0px 16px 54px -5px rgba(82, 82, 82, 1);
  -moz-box-shadow: 0px 16px 54px -5px rgba(82, 82, 82, 1);
  box-shadow: 0px 16px 54px -5px rgba(82, 82, 82, 1);
}
.wraper:hover .innerItem > .iconMenuItem {
  transform: scale(1.25);
  color: #ffd562;
}
.wraper:hover .innerItem > .titleMenuItem {
  color: #ffd562;
}
.wraper:hover .innerItem > ul {
  border-top: 1px solid #fff;
}
.wraper:hover .innerItem > ul li {
  color: #fff;
}
</style>
