import { http } from '../../plugins/http'


export const login = ({email: email, password: password}) => {
    return http.post('/login', { email, password });
}

export const refresh = ({email: email, password: password}) => {
    return http.post('/login', { email, password });
}

export const getPosts = ({category: category}) => {
    return http.get('/posts?category='+category);
}

export const getCategories = () => {
    return http.get('/categories');
}

export const getOffers = ({sector: sector}) => {
    return http.get('/offers?sector='+sector);
}

export const getSectors = () => {
    return http.get('/sectors');
}