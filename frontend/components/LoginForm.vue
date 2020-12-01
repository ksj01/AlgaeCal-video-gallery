<template>
    <div class="container">
        <div>
            <b-card>
                {{ title }}
                <b-form @submit="onSubmit">
                    <b-form-group
                            id="input-group-1"
                            label="Email address:"
                            label-for="input-1"
                    >
                        <b-form-input
                                id="input-1"
                                v-model="form.username"
                                type="text"
                                required
                                placeholder="Enter username"
                        ></b-form-input>
                        <b-alert
                                v-model="show"
                                class="mt-3"
                                dismissible
                                @dismissed="dismissed"
                        >
                            Hello {{ name }}!
                        </b-alert>
                        <b-form-checkbox
                                id="checkbox-1"
                                v-model="form.remember"
                                name="checkbox-1"
                                value="remember"
                                unchecked-value="forget"
                        >
                            Remember Me
                        </b-form-checkbox>
                    </b-form-group>
                    <b-button variant="algaecal" :disabled="(form.username.length < 3)" @click="login">Submit</b-button>
                    <p>Counter: {{this.$store.state.loginStore.userID}}</p>
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
        title: "Welcome To Our Video Library, Please Log In",
        isDisabled: true,
        show: false,
        form: {
          username: '',
          remember: false,
        },
      };
    },
    methods: {
      onSubmit(){
        console.log('A form was submitted');
      },
      login() {
        //Send API request to verify username here

        //If valid:
        this.$store.commit('loginStore/login', this.form.username);

        //else: Throw catch exception
        //toggle();
      },
      toggle() {
        console.log('Toggle button clicked')
        this.show = !this.show
      },
      dismissed() {
        console.log('Alert dismissed')
      }
    }
  };
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

    .title {
        font-family: 'Quicksand',
        'Source Sans Pro',
        -apple-system,
        BlinkMacSystemFont,
        'Segoe UI',
        Roboto,
        'Helvetica Neue',
        Arial,
        sans-serif;
        display: block;
        font-weight: 300;
        font-size: 100px;
        color: #35495e;
        letter-spacing: 1px;
    }

    .subtitle {
        font-weight: 300;
        font-size: 42px;
        color: #526488;
        word-spacing: 5px;
        padding-bottom: 15px;
    }

    .links {
        padding-top: 15px;
    }

    .btn-algaecal {
        color: #fff;
        background-color: #027d61;
        border-color: #015542;
    }

    .btn-algaecal:hover {
        color: #fff;
        background-color: #013227;
    }


</style>