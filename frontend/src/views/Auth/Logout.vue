<template>

</template>

<script>
    export default {
        name: 'Logout',
        created() {
            this.$store.dispatch('destroyToken')
            this.$store.dispatch('clearUser')
            .then(response => {
                this.$router.push({ name: 'Home' })
            })
        }
    }
</script>

<style lang="scss" scoped>

</style>