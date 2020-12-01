<template>
    <div>
        <b-navbar toggleable="lg" type="white" variant="faded">
            <b-container fluid>
                <b-row class="left" style="margin-left: calc(25% + 7.5px); width: 330px;">
                    <b-navbar-brand href="/login">

                        <img src="/algaecal-logo.svg" alt="Algaecal" height="50">

                    </b-navbar-brand>
                </b-row>
            </b-container>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-container fluid>
                <b-row align-h="left">
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
                </b-row>
            </b-container>
        </b-navbar>
    </div>
</template>

<script>
  export default {
    methods: {
      logout() {
        this.$store.commit('loginStore/logout');
      },
    },
  };
</script>

<style>
    h1, h2, h3, h4, h5, h6 {
        color: #047D61;
    }

    body, a, a:hover {
        color: #013B2F;
    }
</style>