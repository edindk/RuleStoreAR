<template>
<div id="primary-nav">
  <div class="container">
  <nav class="navbar navbar-expand-md navbar-dark">
      <router-link to="/">
        <a class="navbar-brand">
          <img src="@/assets/img/rulestore.png" width="175" alt="logo">
        </a>
      </router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/"><a class="nav-link">Forside</a></router-link>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li v-if="!loggedIn" class="nav-item">
            <router-link :to="{ name: 'login' }" class="nav-link">Log ind</router-link>
          </li>
          <li v-if="loggedIn" class="nav-item" id="userloggedin">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target">
            Hej {{ this.$store.state.user }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_target" id="menu">
              <a class="dropdown-item disabled" aria-disabled="true">Mine konfigurationer</a>
              <div class="dropdown-divider"></div>
              <router-link :to="{ name: 'logout' }" class="dropdown-item">Log ud</router-link>
            </div>
          </li>
            <li v-if="loggedIn" class="nav-item">
              <router-link :to="{ name: 'logout' }" class="nav-link" id="logout">Log ud</router-link>
            </li>
          <li v-if="!loggedIn" class="nav-item">
            <router-link :to="{ name: 'register' }" class="nav-link">Tilmeld</router-link>
          </li>
        </ul>
      </div>
    </nav>
</div>
</div>
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
.navbar-dark .navbar-nav .nav-link {
  color: #CDD9E5;
  padding: 6px 16px;
}

#logout {
  display: none;
}

#userloggedin {
  cursor: pointer;
}

.dropdown-item:hover {
  color: black !important;
}

ul li a:hover {
  color: rgb(205, 217, 229, 0.7) !important;
  text-decoration: none;
}

ul li a {
  font-size: 16px;
  font-weight: 600;
}

#primary-nav {
  height: 62px;
  background-color: #343a40;
}

@media (max-width: 768px) {
  .navbar-collapse {
    z-index: 9999;
    position: fixed;
    top: 60px;
    left: 0px;
    padding: 10px 15px 15px 15px;
    width: 100%;
    height: 12%;
  }

  .navbar-collapse.collapsing {
    top: -75%;
    transition: height 0s ease;
  }

  .navbar-collapse.show {
    left: 0px !important;
    transition: top 300ms ease-in-out;
    background-color: #343a40;
  }

  .navbar-toggler.collapsed ~ .navbar-collapse {
    transition: top 500ms ease-in-out;
    background-color: #343a40;
  }

  #menu {
    display: none;
  }

  #userloggedin {
    display: none;
  }

  #logout {
    display: block;
  }
}
</style>