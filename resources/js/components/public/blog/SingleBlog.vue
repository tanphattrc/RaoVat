<template>
    <span id="singleblog">
        <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article >
              <div class="row">
                <div class="span8" >
                  <div class="post-image">
                    <div class="post-heading">
                      <h3> {{singlepost.title}}</h3>

                    </div>
                    <img :src="`uploadimage/${singlepost.photo}`" alt=""  style="width:30%;height:30%"/>
                  </div>
                 
                  <pre class="post-des">
                   {{singlepost.description}}
                  </pre>
                  

                    <div class="post-price" style="color:red"  v-if="singlepost.price!=0">
                      Giá: {{new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(singlepost.price)}}
                    </div>
                     
                        <div v-else class="post-price" style="color:red">Giá: Thỏa thuận </div>

                  <div class="bottom-article">
                    <ul class="meta-post" >
                      <li v-if="singlepost.user"><i class="icon-user"></i> {{singlepost.user.name}}</li>
                      <li v-if="singlepost.category"><i class="icon-folder-open"></i> {{singlepost.category.cat_name}}</li>
                        <li v-if="singlepost.city"><i class="far fa-location-arrow"></i> {{singlepost.city.name}}</li>

                       <li v-if="singlepost.user"><i class="icon-phone"></i> {{singlepost.user.phone}}</li>
                      <li>
                        <i class="icon-comments"></i>
                      <router-link class="nav-link dropdown-item" :to="{ name: 'Chat', params: { contactTo:singlepost.user } }">Liên hệ</router-link>
                      </li>
                      <li>
                                                 <i class="icon-star"></i>

                                                         <router-link class="nav-link dropdown-item"  :to="`/danh-gia/${singlepost.id}`"> Đánh giá </router-link>
                      
                                                
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            </article>
 <article
              v-for="post in blogpost"
              :key="post.id"
              v-if="post.state && post.id != singlepost.id"

              style="margin-bottom:0px;border-top: 1px solid #e9e9e9;"
            >
              <div class="row">
                <div class="span8" style="height: 160px;">
                  <router-link :to="`/tin-rao-vat/${post.id}`" style="text-decoration: none;">
                    <div class="post-image" style="margin-bottom:0px">
                      <!-- <div class="post-heading">
                      <h3><a href="#">{{post.title}}</a></h3>
                      </div>-->
                      <img :src="`uploadimage/${post.photo}`" alt style="width:133px; height:90px" />
                      <span style="display: inline-grid">
                        <!-- {{post.description | sortlength(50,"...")}} -->
                        <span style="color:black">{{post.title}}</span>
                        <p v-if="post.price!=0">Giá: {{new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(post.price )}}</p>
                        <p v-else>Giá: Thỏa thuận </p>
                      </span>
                    </div>
                  </router-link>

                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li>
                        <i class="icon-calendar"></i>
                        {{post.created_at | timeformat}}
                      </li>
                      <li v-if="post.user">
                        <i class="icon-user"></i>
                        {{post.user.name}}
                      </li>
                      <li v-if="post.category">
                        <i class="icon-folder-open"></i>
                        {{post.category.cat_name}}
                      </li>
                      <li v-if="post.city">
                        <i class="far fa-location-arrow"></i>
                        {{post.city.name}}
                      </li>
                    </ul>
                    <router-link :to="`/tin-rao-vat/${post.id}`" class="pull-right">
                      Xem chi tiết
                      <i class="icon-angle-right"></i>
                    </router-link>
                  </div>
                </div>
              </div>
              
            </article>
            <!-- paginate -->
            <article>
              <div class="row">
              <div class="span8">
                <div id="card-footer">
                  <ul class="pagination">
                    <span style="margin-top:5px">Hiển thị {{pagination.current_page}} trong tổng {{pagination.last_page}}</span>
                    <li class="page-item">
                      <button
                        class="page-link"
                        v-on:click="FetchPaginateData(pagination.prev_page)"
                        :disabled="!pagination.prev_page"
                      >Trang sau</button>
                    </li>
                    <div v-for="item in pagination.last_page">
                      <div v-if="item == pagination.current_page">
                        <li class="page-item active">
                          <a class="page-link">{{item}}</a>
                        </li>
                      </div>
                      <div v-else>
                        <li class="page-item">
                          <button
                            class="page-link"
                            v-on:click="FetchPaginateData(pagination.path_page+'?page='+item)"
                          >{{item}}</button>
                        </li>
                      </div>
                    </div>
                    <li class="page-item">
                      <button
                        class="page-link"
                        v-on:click="FetchPaginateData(pagination.next_page)"
                        :disabled="!pagination.next_page"
                      >Trang tiếp</button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            </article>
          </div>
            <BlogSidebar/>
        </div>
      </div>
    </section>
    </span>
</template>

<script>
    import BlogSidebar from "./BlogSidebar.vue"
    export default {
        name: "SingleBlog",
        components:{
            BlogSidebar
        },
        data() {
    return {
      blogpost: [],
      pagination: [],
      url: "",
      singlepost:{},
    };
  },
        created()
        {
               this.$Progress.start()
            axios.get('/blogpost/'+this.$route.params.id)
                .then((response)=>{
                   this.singlepost=response.data.post
      this.getAllCategoryPost();

                })
              


        },
        computed:{
            // singlepost(){
            //     return this.$store.getters.singlepost
            // }
        },
        methods:{
          getallmod() {
    
      let $this = this;
      // this.url= "/blogpost",
      axios
        .get(this.url)
        .then(response => {
          this.blogpost = response.data.data;
          $this.makepagenation(response.data);
     this.$Progress.finish()


        })
        .catch(() => {});
    },
            makepagenation(data) {
      let pagination = {
        current_page: data.current_page,
        last_page: data.last_page,
        next_page: data.next_page_url,
        prev_page: data.prev_page_url,
        path_page: data.path
      };
      this.pagination = pagination;
       this.$Progress.finish()
    },
    FetchPaginateData(url) {
      this.url = url;
      this.getallmod();
            

    },
           getAllCategoryPost() {
             this.$Progress.start()
        

        let $this = this;

        this.url = "/category/" + this.singlepost.cat_id+"/post";
        axios
          .get(this.url)
          .then(response => {
            this.blogpost = response.data.data;
            $this.makepagenation(response.data);
             this.$Progress.finish()

          })
          .catch(() => {});
    }
          ,
            singlePost(){
                this.$store.dispatch('getPostById',this.$route.params.id);
               this.$Progress.finish()

            }
        },
        mounted(){
        // this.$store.dispatch('getblogPost');
        // this.$store.dispatch('getPostById',this.$route.params.id);

        },
        beforeUpdate()
        {
        },
        updated()
        {
        },

        watch:{
            $route(to,from){
                this.singlePost();
            }
        }
    }
</script>

<style lang="css" scoped>
@import "paginate.css";
</style>