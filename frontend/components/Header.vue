<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand href="/">NavBar</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">

                    <b-nav-item right>
                        <!-- Using 'button-content' slot -->
                        <NuxtLink to="/">Videos</NuxtLink>
                        <NuxtLink @click.native="logout" to="/login">Logout</NuxtLink>
                    </b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
  export default {
    methods: {
      logout() {
        this.$store.commit('loginStore/logout');
      }
    }
  };
</script>

<style>

</style>