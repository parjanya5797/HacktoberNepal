<template>
  <main-header></main-header>
  <router-view></router-view>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
export default {
  name: "App",
  components: {
    MainHeader,
  },
};
</script>
