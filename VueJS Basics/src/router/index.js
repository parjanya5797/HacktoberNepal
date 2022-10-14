import {createRouter,createWebHistory} from 'vue-router'
import Home from '../views/Home'
import BlogList from '../views/BlogList'
import BlogDetail from '../views/BlogDetail'
const routes = [
    {
        path:'/',
        name:'Home',
        component:Home
    },
    {
        path:'/blog-list',
        name:'Blog',
        component:BlogList
    },
    {
        path:'/blog/:post_id',
        name:'BlogDetail',
        component:BlogDetail,
        props: true,
    },
    
]

const router=createRouter({
    history:createWebHistory(),
    routes
})

export default router;

