<template>
    <div>
    <div class="shadow p-3 mb-5 bg-white rounded col-md-4 offset-md-4" id="center">
      <form action="#" @submit.prevent="register">

        <div id="cardHeader">
            <h4>Ny bruger</h4>
            <hr id="hr">
        </div>

        <div class="form-group">
          <div id="label" class="offset-sm-2"><label id="label">Navn</label></div>
          <input type="text" class="form-control col-8 offset-md-2" id="inputName"
                 placeholder="Indtast navn"
                 v-model="name">
        </div>

        <div class="form-group">
          <div id="label"><label id="label" class="offset-sm-2">Adresse</label></div>
          <input type="text" class="form-control col-8 offset-md-2" id="inputAddress"
                 placeholder="Indtast adresse" v-model="address">
        </div>

        <div class="form-group">
          <div id="label"><label id="label" class="offset-sm-2">Telefon</label></div>
          <input type="number" class="form-control col-8 offset-md-2" id="inputPhone"
                 placeholder="Indtast telefon" v-model="phone">
        </div>

        <div class="form-group">
          <div id="label"><label id="label" class="offset-sm-2">Email</label></div>
          <input type="email" class="form-control col-8 offset-md-2" id="inputEmail"
                 placeholder="Indtast email" v-model="email">
        </div>

        <div class="form-group">
          <div id="label"><label id="label" class="offset-sm-2">Adgangskode</label></div>
          <input type="password" class="form-control col-8 offset-md-2" id="inputPassword"
                 placeholder="Indtast adgangskode" v-model="password">
        </div>

        <div class="form-group">
          <div id="label"><label id="label" class="offset-sm-2">Bekræft adgangskode</label></div>
          <input type="password" class="form-control col-8 offset-md-2" id="inputConfirmPassword"
                 placeholder="Indtast adgangskode" v-model="confirmPassword">
        </div>

        <button type="submit" class="btn btn-success col-4" id="submitButton">Opret</button>
      </form>
    </div>
    </div>
</template>

<script>
    export default {
        name: 'Register',
        data() {
            return {
                name: '',
                address: '',
                phone: '',
                email: '',
                password: '',
                confirmPassword: ''
            }
        },
        methods: {
            register() {
                try {
                    this.$store.dispatch('register', {
                        name: this.name,
                        address: this.address,
                        phone: this.phone,
                        email: this.email,
                        password: this.password,
                        confirmPassword: this.confirmPassword
                    }).then(response => {
                        this.$router.push({ name: 'login' })
                    })
                } catch (error) {
                    console.log(error)
                }
            }
        },
    }
</script>

<style scoped>

#hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid hsl(0,0%,80%);
    margin: 1em 0;
    padding: 0;
}

#cardHeader {
    padding: 25px;
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
  #cardHeader {
      padding: 0px;
  }
}
</style>