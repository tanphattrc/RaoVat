<template>
    <div>
        <section class="container">
            <div class="jumbotron mt-5" >
                <div class="col-md-10 col-sm-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bài đăng</h3>

                            <!-- <div class="card-tools"> -->
                                <!-- <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color:#fff"> Add New Post</router-link>
                                </button> -->
                            <!-- </div> -->
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Photo</th>
                                    <!-- <th>State</th> -->
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(post,index) in allpost" :key="post.id">
                                    <td>{{index+1}}</td>
                                    <td v-if="post.category">{{post.category.cat_name}} {{post.photo}}</td>
                                    <td>{{post.title | sortlength(20,"---")}}</td>
                                    <td>{{post.description | sortlength(40,"....")}}</td>
                                    <td>{{post.price }}</td>
                                    <!-- <td>
                                        {{post.state}} 
                                        </td> -->
                                    <td><img :src="ourImage(post.photo)" alt="" width="40" height="50"></td>
                                    <td>
                                        <router-link :to="`edit-post/${post.id}`">Sửa</router-link>
                                        
                                            <span>|| </span>
                                        <a href="" @click.prevent = "deletePost(post.id)" >Xóa</a>

                                        <!-- </button> -->
                                        
                                    </td>
                                </tr>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <ul class="pagination">
                <span>Hiển thị {{pagination.current_page}}  trong tổng {{pagination.last_page}}</span> <hr>
                <li class="page-item">
                  <button class="page-link" v-on:click="FetchPaginateData(pagination.prev_page)" :disabled="!pagination.prev_page">Trang sau</button>
                </li>
                <div v-for="item in pagination.last_page">
                  <div v-if="item == pagination.current_page">
                    <li class="page-item active">
                      <a class="page-link">{{item}}</a>
                    </li>
                  </div> 
                  <div v-else>
                    <li class="page-item">
                      <button class="page-link" v-on:click="FetchPaginateData(pagination.path_page+'?page='+item)">{{item}}</button>
                    </li>
                  </div>                 
                </div>                                
                <li class="page-item">
                  <button class="page-link" v-on:click="FetchPaginateData(pagination.next_page)" :disabled="!pagination.next_page">
                    Trang tiếp
                  </button>
                </li>
              </ul>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
         data(){
            return{
                allpost:[],
                pagination:[],
                 url:'/api/postByUser',
               
            }
               
        },
        created()
        {
 this.$Progress.start()
        },
        mounted(){
            // this.$store.dispatch('gelAllPost')
            this.getallmod()
        },
        computed:{
            // allpost(){
            //     return this.$store.getters.getAllPost
            // }
        },
        methods:{
        getallmod(){
      let $this = this;
      axios.get(this.url,{
                    headers: { Authorization: `Bearer ${localStorage.usertoken}` }
                }
      ).then(response=> {
        this.allpost = response.data.data
        $this.makepagenation(response.data)
             this.$Progress.finish()

      })
      .catch(()=>{

                   })
    },
           
            ourImage(img){
                return "uploadimage/"+img;
            },
            deletePost(id){
               axios.get('/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch('gelAllPost')
                       toast({
                           type: 'success',
                           title: 'Post Deleted successfully'
                       })
                   })
                   .catch(()=>{

                   })
            },
                   makepagenation (data){
      let pagination = {
        current_page : data.current_page,
        last_page : data.last_page,
        next_page : data.next_page_url,
        prev_page : data.prev_page_url,
        path_page : data.path,
      }
      this.pagination = pagination;
    },
    FetchPaginateData(url){
      this.url = url;
      this.getallmod();

    },

        }
    }
</script>

<style scoped>
    @import "../blog/paginate.css";

</style>