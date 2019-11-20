export default {
    login (context, token, user) {
        localStorage.setItem('user', user)
        localStorage.setItem('token', token)
        context.commit('setToken', token)
        context.commit('setUser', user)
    },

    logout (context) {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        context.commit('setToken', null)
        context.commit('setUser', null)
    }
}