<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">RuleStore</a>
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
        </ul>
      </div>
    </nav>
</template>

<script>
export default {
  name: "Navbar"
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