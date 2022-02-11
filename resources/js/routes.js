import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);


import Home from './components/pages/Home';
import AboutUs from './components/pages/AboutUs';
import Contacts from './components/pages/Contacts';
import Posts from './components/Posts';
import PostDetail from './components/PostDetail';
import Error404 from './components/pages/Error404';


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog',
            name: 'blog',
            component: Posts
        },
        {
            path: '/about-us',
            name: 'about',
            component: AboutUs
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: Contacts
        },
        {
            path: '/detail/:slug',
            name: 'detail',
            component: PostDetail
        },
        {
            path: '*',
            component: Error404
        }
    ]


});

export default router;
