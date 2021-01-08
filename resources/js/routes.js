import AdminHome from './components/admin/AdminHome.vue'
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'

// FrontEnd Component
import PublicHome from './components/public/PublicHome.vue'
import BlogPost from './components/public/blog/BlogPost.vue'
import SinglePost from './components/public/blog/SingleBlog.vue'
import RatingPost from './components/public/blog/RatingPost.vue'

// Post
import PostList from './components/admin/post/List.vue'

 //User
import Login from './components/Login.vue'
import Register  from './components/Register.vue'
// import Profile from './components/Profile.vue'
import UserList from './components/admin/user/List.vue'
import UserVipList from './components/admin/user/ListVip.vue'
// import EditUser from './components/admin/user/Edit.vue'
import EditUser from './components/public/profile/Edit.vue'
import Profile from './components/public/profile/Profile.vue'
import AddPost from './components/public/profile/NewPost.vue'
import ListPost from './components/public/profile/ListPost.vue'
import EditPost from './components/public/profile/EditPost.vue'

import ChatApp from './components/ChatApp.vue'


export const routes = [
   
    {
            path:'/chat',
            name:'Chat',
            component: ChatApp,
            props:true,
    },  
 

    {
        path:'/home',
        component:AdminHome,
        
    },
    
    {
        path:'/user-list',
        component:UserList
    },
    {
        path:'/uservip-list',
        component:UserVipList
    },
    {
        path:'/edit-user/:userid',
        component:EditUser
    },
    
    {
        path:'/login',
        component:Login,
        meta: {
            auth: false
        }

    },
    {
        path:'/register',
        component:Register,
        meta: {
            auth: false
        }
    },
  
    {
        path:'/profile',

        component:Profile
    },
    {
        path:'/category-list',
        component:CategoryList
    },
    {
        path:'/add-category',
        component:AddCategory
    },
    {
        path:'/edit-category/:categoryid',
        component:EditCategory
    },
    // Post
    {
        path:'/post-list',
        component:PostList
    },
    {
        path:'/add-post',
        component:AddPost,
        // meta: {
        //     auth: true
        // }
       
    },
    {
        path:'/list-post-user',
        component:ListPost,
    },
    {
        path:'/edit-post/:postid',
        component:EditPost
    },

    // Frontend Route
    {
        path:'/',
        component:PublicHome
    },
    {
        path:'/tin-rao-vat',
        component:BlogPost
    },
    {
        path:'/tin-rao-vat/:id',
        component:SinglePost
    },
    {
        path:'/danh-gia/:id',
        component:RatingPost
    },
    {
        path:'/categories/:id',
        component:BlogPost
    },

];


