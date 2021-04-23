<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <router-link to="/"><a class="navbar-brand">RuleStore</a></router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/"><a class="nav-link">Forside</a></router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about"><a class="nav-link">Om</a></router-link>
          </li>
          <li class="nav-item">
            <router-link to="/arviewer"><a class="nav-link">ARViewer</a></router-link>
          </li>
          <li v-if="!loggedIn" class="nav-item">
            <router-link :to="{ name: 'login' }" class="nav-link font-weight-bold">Log ind</router-link>
          </li>
          <li v-if="loggedIn" class="nav-item">
            <a class="nav-link dropdown-toggle font-weight-bold" data-toggle="dropdown" data-target="dropdown_target">
            Hej {{ this.$store.state.user }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown_target" id="menu">
              <a class="dropdown-item disabled" aria-disabled="true">Mine konfigurationer</a>
              <div class="dropdown-divider"></div>
              <router-link :to="{ name: 'logout' }" class="dropdown-item">Log ud</router-link>
            </div>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'register' }" class="nav-link font-weight-bold">Tilmeld</router-link>
          </li>
        </ul>
      </div>
    </nav>
</template>

<script>
export default {
  name: 'Navbar',
  computed: {
    loggedIn () {
      return this.$store.getters.loggedIn
    }
  }
}
</script>

<style scoped>
@media (max-width: 992px) {
  .navbar-collapse {
    z-index: 9999;
    position: fixed;
    top: 50px;
    left: 0px;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    width: 100%;
    height: 10%;
  }

  .navbar-collapse.collapsing {
    top: -75%;
    transition: height 0s ease;
  }

  .navbar-collapse.show {
    left: 0px !important;
    transition: top 300ms ease-in-out;
    background-color: rgb(248, 249, 250);
  }

  .navbar-toggler.collapsed ~ .navbar-collapse {
    transition: top 500ms ease-in-out;
    background-color: rgb(248, 249, 250);
  }
}
</style>