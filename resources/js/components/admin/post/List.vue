<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-10 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>

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
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Photo</th>
                                    <th>State</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(post,index) in allpost" :key="post.id">
                                    <td>{{index+1}}</td>
                                    <td v-if="post.user">{{post.user.name}}</td>
                                    <td v-if="post.category">{{post.category.cat_name}} </td>
                                    <td>{{post.title | sortlength(20,"---")}}</td>
                                    <td>{{post.description | sortlength(40,"....")}}</td>
                                    <td>{{post.price }}</td>
                                    
                                    <td><img :src="ourImage(post.photo)" alt="" width="40" height="50"></td>
                                    <td v-if="post.state">
                                        <div class="fa fa-check">
                                            Đã duyệt 
                                        </div>
                                    </td>
                                     <td v-else>Đang chờ  xử lý</td>
                                    <td>
                                        <!-- <router-link :to="`edit-post/${post.id}`">Edit</router-link> -->
                                        <!-- <i v-if="post.state" class="fa fa-check" style="color:rgb(52, 144, 220);"></i> -->
                                        <a href="" v-if="post.state==false" style="color:rgb(52, 144, 220);" @click.prevent = "acceptPost(post.id,index)">Accept</a>

                                        <!-- <button class="btn btn-primary"> -->
                                            <!-- <div style="display:inline-flex"> -->
                                        <a href="" @click.prevent = "deletePost(post.id,index)" > Delete</a>
                                            <!-- </div> -->

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
                 url:'/post',
               
            }
               
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
   this.$Progress.start()

      let $this = this;
      axios.get(this.url).then(response=> {
        this.allpost = response.data.data
        $this.makepagenation(response.data)
   this.$Progress.finish()

      })
      .catch(()=>{

                   })
    },
            acceptPost(id,index)
            {
                 axios.post('/acceptpost/'+id)
                   .then(()=>{
                       this.$store.dispatch('gelAllPost')
                       this.allpost[index].state=true;
                       console.log(this.allpost[index]);
                       console.log(index);
                       toast({
                           type: 'success',
                           title: 'Post Accepted successfully'
                       })
                   })
                   .catch(()=>{

                   })
            },
            ourImage(img){
                return "uploadimage/"+img;
            },
            deletePost(id,index){
               axios.get('/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch('gelAllPost')
                       this.allpost.splice(index,1)
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

</style>