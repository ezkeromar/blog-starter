<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Blog Starter</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item" :class="{ active: $route.path === '/' }">
                    <router-link class="nav-link" to="/dashboard">Dashboard</router-link>
                </li>
                <li class="nav-item" :class="{ active: $route.path === '/login' }">
                    <router-link class="nav-link" to="/posts">Posts</router-link>
                </li>
                <li class="nav-item" :class="{ active: $route.path === '/register' }">
                    <router-link class="nav-link" to="/offers">Offers</router-link>
                </li>
            </ul>
            <span class="navbar-text">
                <a @click="logout">Logout</a>
            </span>
        </div>
    </nav>
</template>

<script>

export default {
    name: 'MenuDashboard',
    data () {
        return {
        }
    },
    mounted: function() {
    },
    methods: {
        logout() {
            this.$store.dispatch('logout')
            this.$router.push('/')
        }
    }
}
</script>