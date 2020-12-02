<template>
    <div>
        <Header/>
        <Nuxt/>
    </div>
</template>

<script>
  import Header from '../components/Header.vue';

  export default {
    components: {
      Header,
    },
    beforeMount() {

      //Check if logged in. Redirect accordingly
      if (this.$store.state.loginStore.list == false) {
        this.$router.push({
          path: '/login',
        });
      }
    },
  };
</script>

<style>

    /*  This is the closest font I could find to the spec */
    @import url('https://fonts.googleapis.com/css2?family=Belleza&display=swap');

    html, body {
        font-family: 'Belleza', sans-serif;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
    }

    .btn-algaecal {
        color: #fff;
        background-color: #047D61;
        border-color: #047D61;
    }

    .btn-algaecal:hover {
        color: #fff;
        background-color: #013B2F;
    }

    /*This changes the color of the dropdown hover highlight*/
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item:hover {
        background-color: #047D61 !important;
    }
</style>
