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
            <b-container fluid>

                        <!-- Right aligned nav items -->
                        <b-navbar-nav class="m-auto">

                            <b-nav-item right>

                                <!-- Using 'button-content' slot -->

<!--                                TODO: I have NO IDEA why, but this particular /videos link REFUSES to be a nuxtlink. It keeps breaking the rendering on the individual video page.-->
                                <a href="/videos" class="pr-5">Videos</a>
                                <nuxt-link @click.native="logout" to="/login">Logout</nuxt-link>

                            </b-nav-item>
                        </b-navbar-nav>
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