<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>

                           
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(user,index) in users" :key="user.id">
                                    <td>{{index+1}}</td>
                                    <td >{{user.name}}</td>
                                   <td>{{user.email}} </td>
                                    <td>
                                        <a href="" v-if="user.isVip=='Đang xử lý'" @click.prevent="AccpetUpdateVip(user.id,index)">Accept </a>
                                        <a  v-else  href="" @click.prevent = "deleteRoleUserVip(user.id,index-1)" >Delete</a>
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
// import Paginate from 'vuejs-paginate'
// import pagination from 'laravel-vue-pagination'
    export default {
        name: "List",
        components:{
                // Paginate ,
                // pagination,
                
        },
        data(){
            return{
                users:[],
                pagination:[],
                 url:'/uservip',
               
            }
               
        },
        created()
        {

        },
         mounted(){
            // this.$store.dispatch("allUser")
            this.getallmod()
        
        },
        computed:{
        //    users(){
        //     return this.$store.getters.getUser
      
        //    }
       
        },
        methods:{
         AccpetUpdateVip($id,$index)
         {
            axios.post(`/uservip/${$id}`) .then(res => {
          console.log(res)
        //   this.users[$id].isVip='Vip';
                this.users[$index].isVip='Vip'
          toast({
                            type: 'success',
                            title: ' Updated successfully'
                        })
        })
        .catch(error => {
          console.log(error.response.data);
          // xử lý chuỗi err
        
          //
        });
         },
         getallmod(){
      let $this = this;
   this.$Progress.start()

      axios.get(this.url).then(response=> {
        this.users = response.data.data
        $this.makepagenation(response.data)
   this.$Progress.finish()

      })
      .catch(()=>{

                   })
    },
             deleteRoleUserVip(id,index){
               axios.get('/uservip/'+id)
                   .then(()=>{
                       this.$store.dispatch('allUser')
                           this.users.splice(index,1)
                       toast({
                           type: 'success',
                           title: 'User Deleted Role Vip successfully'
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