<template>
    <div>
        <div class="shadow p-3 mb-5 bg-white rounded col-md-4 offset-md-4" id="center">
      <form action="#" @submit.prevent="login">

        <div id="cardHeader">
            <h4>Log ind</h4>
            <hr id="headerUnderline">
        </div>

        <div class="form-group">
          <div id="label" class="offset-sm-2"><label id="label">E-mail</label></div>
          <input type="email" class="form-control col-8 offset-md-2" id="inputEmail" aria-describedby="emailHelp"
                 placeholder="Indtast email"
                 v-model="email">
        </div>
        <div class="form-group">
          <div id="label"><label id="label" class="offset-sm-2">Adgangskode</label></div>
          <input type="password" class="form-control col-8 offset-md-2" id="inputPassword"
                 placeholder="Indtast adgangskode" v-model="password">
        </div>
        <button type="submit" class="btn btn-success col-4" id="submitButton">Log ind</button>
      </form>
    </div>
    </div>
</template>

<script>
    export default {
        name: 'Login',
        data () {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                try {
                    this.$store.dispatch('retrieveToken', {
                        email: this.email,
                        password: this.password
                    }).then(response => {
                        this.$router.push({name: 'Home'})
                    })
                } catch (error) {
                    console.log(error)
                }
            }
        },
    }
</script>

<style scoped>
#cardHeader {
    padding: 25px;
}

#headerUnderline {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid hsl(0,0%,80%);
    margin: 1em 0;
    padding: 0;
}

#center {
    max-width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    margin: 0;
    transform: translate(-50%, -50%)
}

#label {
    text-align: left;
}

#submitButton {
    margin-top: 25px;
}

@media (max-width: 480px) {
  #center {
    max-width: 325px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    margin: 0;
    transform: translate(-50%, -50%)
  }
}
</style>