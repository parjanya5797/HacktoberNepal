<template>
  <header>
    <h1>{{ title }}</h1>
    <Button
      :text="btn_click ? 'Close' : 'Add Task'"
      :color="btn_click ? 'red' : 'green'"
      @toggle-add-form="toggleForm"
    />
  </header>
</template>

<script>
import Button from "./Button";
export default {
  name: "Header",
  // props:['title']
  data() {
    return {
      btn_click: false,
    };
  },
  props: {
    title: {
      type: String,
      default: "This is Default",
    },
  },
  components: {
    Button,
  },
  methods: {
    toggleForm() {
      this.btn_click = !this.btn_click;
      this.$emit("toggle-add-form");
    },
  },
};
</script>

<style scoped>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
</style>
