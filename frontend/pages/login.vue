<template>
  <div id="login">
    <LoginForm></LoginForm>
  </div>
</template>

<script>
  import LoginForm from '../components/LoginForm.vue';

export default {
  name: 'login',
  components: {
    LoginForm,
  }
}
</script>

<style>
  #login {
    background-color: #013B2F;
  }
</style>
