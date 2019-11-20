<template>
    <div class="container">
        <MenuDashboard></MenuDashboard>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import MenuDashboard from '../menus/menu-dashboard'

export default {
    name: 'dashboardlayout',
    components: {
        MenuDashboard
    }
}
</script>