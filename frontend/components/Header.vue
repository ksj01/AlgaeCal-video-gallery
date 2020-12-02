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
                <b-navbar-nav class="m-auto">

<!--                    These function differently but I want them to be styled the same.-->
                    <a href="/videos/" class="pr-5 custom-link">Videos</a>
                    <a @click="logout()" class="custom-link">Logout</a>

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

    .custom-link:hover {
        cursor: pointer;
        text-decoration: underline !important;
    }
</style>