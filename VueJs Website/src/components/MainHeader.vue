<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <router-link to="/" class="navbar-brand">Task Tracker</router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link to="/" class="nav-link"
            >Home <span class="sr-only">(current)</span></router-link
          >
        </li>
        <li class="nav-item">
          <router-link to="/about" class="nav-link"
            >About Task Tracker</router-link
          >
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "MainHeader",
};
</script>

<style></style>
