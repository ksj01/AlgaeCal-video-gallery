<template>
    <div class="container pb-5 login-container-main">
        <div class="login-container-sub">
            <b-card class="login-card">
                <h2 class="m-4">{{ title }}</h2>
                <b-form @submit="onSubmit">
                    <b-form-group
                            class="mx-5"
                            id="input-group-1"
                            label-for="input-1"
                    >
                        <b-form-row>
                            <b-form-input
                                    class="mt-4"
                                    id="input-1"
                                    v-model="form.username"
                                    type="text"
                                    required
                                    placeholder="Your Username"
                                    @keyup="dismissed"
                            ></b-form-input>
                            <b-alert
                                    id="invalid-username"
                                    v-model="show"
                                    variant="danger"
                                    fade
                                    class="mt-2"
                                    dismissible
                                    @dismissed="dismissed"
                            >
                                Sorry, that username is not found
                            </b-alert>
                        </b-form-row>
                        <b-form-row>

<!--                            This isn't actually configured to do anything.-->
                            <b-form-checkbox
                                    id="checkbox-1"
                                    v-model="form.remember"
                                    name="checkbox-1"
                                    value="remember"
                                    unchecked-value="forget"
                                    class="my-3"
                            >
                                Remember Me
                            </b-form-checkbox>
                        </b-form-row>
                    </b-form-group>
                    <b-button pill size="sm" class="px-5 mt-5" variant="algaecal" :disabled="(form.username.length < 3)" @click="login">Login</b-button>
                </b-form>
            </b-card>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'LoginForm',
    data() {
      return {
        title: 'User Login',
        isDisabled: true,
        show: false,
        form: {
          username: '',
          remember: false,
        },
      };
    },
    methods: {
      onSubmit() {
        this.dismissed();
      },
      login() {

        //Send API request to verify username here
        fetch('http://localhost:8080/users?username=' + this.form.username).then(response => response.json()).then(responseData => {
          if (responseData.statusCode === 200) {
            this.$store.commit('loginStore/login', this.form.username);
          } else {
            //Display username alert
            this.toggle();
          }
        }).catch(error => alert(error.message));
      },

      //Used to show the invalid username alert
      toggle() {
        this.show = !this.show;
      },

      //Dismisses the invalid username alert
      dismissed() {
        if (document.getElementById('invalid-username')) {
          document.getElementById('invalid-username').childNodes[0].click();
        }
      },
    },
  }
  ;
</script>

<style scoped>
    .container {
        margin: 0 auto;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .login-container-main {
        max-height: 700px;
    }

    .login-container-main .login-container-sub {
        min-height: 300px; width: 40%;
    }

    .login-container-main .login-container-sub .login-card {
        height: 400px;
    }

</style>