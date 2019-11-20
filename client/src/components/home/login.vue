
<template>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="form-group row">
                <label for="email" class="col-sm-12 col-form-label">E-mail</label>
                <div class="col-sm-12">
                    <input v-model='email' type="text" class="form-control" name="email" id="email" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-12 col-form-label">Password</label>
                <div class="col-sm-12">
                    <input v-model='password' type="password" class="form-control" name="password" id="password" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12" align='center'>
                    <button class="btn btn-primary" @click="loginFunc()">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import * as services from './services'

export default {
    name: 'login',
    data () {
        return {
            email: '',
            password: ''
        }
    },
    mounted: function () {
    },
    methods: {
        loginFunc() {
            services.login({email: this.email, password: this.password})
                .then(response => {
                    this.$store.dispatch('login', response.token, response.user)
                    this.$router.push('/dashboard')
                })
        }
    }
}
</script>