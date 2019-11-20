<template>
    <div class="container">
        <MenuHome></MenuHome>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import MenuHome from '../menus/menu-home'

export default {
    name: 'homelayout',
    components: {
        MenuHome
    }
}
</script>