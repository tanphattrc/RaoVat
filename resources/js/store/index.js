export default {
    state:{
        category:[],
        post:[],
        user:[],
        blogpost:[],
        singlepost:[],
        allcategories:[],
        allcities:[],
        latestpost:[]
    },
    getters:{
        getUser(state)
        {
            return state.user
        },
        getCategory(state){
            return state.category
        },
        getAllPost(state){
            return state.post
        },
        getblogPost(state){
            return state.blogpost
        },
        singlepost(state){
            return state.singlepost
        },
        allcategories(state){
            return state.allcategories
        },
        allcities(state){
            return state.allcities
        },
        latestpost(state){
            return state.latestpost
        }

    },
    actions:{
        allCategory(context){
            axios.get('/category')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allUser(context)
        {
            axios.get('/user')
            .then((response)=>{
                    context.commit('users',response.data.users)
            })
        },
        gelAllPost(context){
            axios.get('/post')
                .then((response)=>{
                    context.commit('allpost',response.data.posts)
                })
        },
        getblogPost(context){
            axios.get('/blogpost')
                .then((response)=>{
                    context.commit('getblogPost',response.data.posts)
                })
        },
        getPostById(context,payload){
            axios.get('/blogpost/'+payload)
                .then((response)=>{
                    context.commit('siglePost',response.data.post)
                })
        },
        allcategories(context){
            axios.get('/categories')
                .then((response)=>{

                    context.commit('allcategories',response.data.categories)
                })
        },
        allcities(context){
            axios.get('/cities')
                .then((response)=>{

                    context.commit('allcities',response.data.cities)
                })
        },
        getPostByCatId(context,payload){
            axios.get('/category/'+payload+'/post')
                .then((response)=>{
                    // console.log(response.data.posts)
                    context.commit('getPostByCatId',response.data.posts)
                })
        },
        SearchPost(context,payload){
            axios.get('/search?s='+payload)
                .then((response)=>{
                    context.commit('getSearchPost',response.data.posts)
                })

        },
        latestPost(context){
            axios.get('/latestpost')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('latestpost',response.data.posts)
                })
        }
    },
    mutations:{
        categoreis(state,data){
            return state.category = data
        },
        users(state,data){
                return state.user= data
        },
        allpost(state,payload){
            return state.post = payload
        },
        getblogPost(state,payload){
            return state.blogpost = payload
        },
        siglePost(state,payload){
            return state.singlepost = payload
        },
        allcategories(state,payload){
            return state.allcategories = payload
        },
        allcities(state,payload){
            return state.allcities = payload
        },
        getPostByCatId(state,payload){
            state.blogpost = payload
        },
        getSearchPost(state,payload){
            state.blogpost = payload
        },
        latestpost(state,payload){
            state.latestpost = payload
        }


    }
}