<template>
  <span id="blogpost">
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <form class="form-search" style="display:block">
              <input
                @keyup="RealSearch"
                placeholder="Nhập tìm kiếm"
                v-model="keyword"
                type="text"
                class="input-medium search-query "
                style="width:85%" 
              />
              <button
                type="submit"
                @click.prevent="RealSearch"
                class="btn btn-square btn-theme "
              >Tìm kiếm</button>
               <div class="form-group form-search" style="margin: inherit;">
             

              <select v-model="selected" @change="SearchByPrice(selected)">
                <option disabled value>Chọn giá</option>
                <option >Từ thấp tới cao</option>
                <option >Từ cao xuống thấp</option>
              </select>
              
            </div>
             <div class="form-group form-search">
             <select v-model="select_date" @change="SearchByDate(select_date)">
                <option disabled value>Sắp tin theo ngày đăng</option>
                <option >Tin mới trước</option>
                <option >Tin cũ</option>
              </select>
             </div>
            <!--  -->

            <!--  -->
             <div class="form-group form-search">
                  <select
                    class=""
                    v-model="select_city"
                   @change="SearchByCity(select_city)"
                  >
                    <option disabled value>Chọn tỉnh</option>
                    <option 
                      :value="city.id"
                      v-for="city in getallCity"
                      :key="city.id"
                    >{{city.name}}</option>
                  </select>
                </div>
               <button
                type="submit"
                @click.prevent="changeUrlbyAll"
                class="btn btn-square btn-theme "
              >Xem tất cả
                <a href="/tin-rao-vat">

                </a>
              

              </button>
            </form>
          
            <!-- // -->

           

            <!--  -->
          
            <article
              v-for="post in blogpost"
              :key="post.id"
              v-if="post.state"
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
            <!-- paginate -->
          </div>
          <BlogSidebar />
        </div>
      </div>
    </section>
  </span>
</template>

<script>
import BlogSidebar from "./BlogSidebar.vue";
import _ from "lodash";
export default {
  name: "BlogPost",
  data() {
    return {
      blogpost: [],
      pagination: [],
      url: "/blogpost",
      keyword: "",
       selected: '' ,
       select_city:'',
       select_date:'',
    };
  },
  components: {
    BlogSidebar
  },
  created()
  {
     this.$Progress.start()
  },
  mounted() {
    // this.$store.dispatch('getblogPost');

    this.$store.dispatch("allcities");
    if (this.$route.params.id != null) 
    {
      this.getAllCategoryPost();
    }
    else
    {
    this.getallmod();

    }
  },
  computed: {
    // blogpost(){
    //     return this.$store.getters.getblogPost
    // },
    getallCity() {
      return this.$store.getters.allcities;
    }
  },
  methods: {
    changeUrlbyAll()
    {
       this.$Progress.start()
      this.url="/blogpost";
      this.getallmod();
    },
    SearchByDate($selected)
    {
       this.$Progress.start()
          let $this = this;

        this.url = "/searchDate/" + $selected+"/post";

        axios
          .get(this.url)
          .then(response => {
            this.blogpost = response.data.data;
            $this.makepagenation(response.data);
          })
          .catch(() => {});
    },
    SearchByCity($id)
    {
       this.$Progress.start()
        let $this = this;

        this.url = "/searchCity/" + $id+"/post";

        axios
          .get(this.url)
          .then(response => {
            this.blogpost = response.data.data;
            $this.makepagenation(response.data);
          })
          .catch(() => {});
    },
    SearchByPrice(price)
    {
       this.$Progress.start()
      let $this = this;

        this.url = "/searchPrice/" + price+"/post";

        axios
          .get(this.url)
          .then(response => {
            this.blogpost = response.data.data;
            $this.makepagenation(response.data);
          })
          .catch(() => {});
    },
    RealSearch: _.debounce(function() {
      // this.$store.dispatch('SearchPost',this.keyword);
      // this.url='/search?s='+this.keyword;
             this.$Progress.start()

      this.url = "/search/" + this.keyword+"/post";

      let $this = this;
      axios
        .get(this.url)
        .then(response => {
          this.blogpost = response.data.data;
          $this.makepagenation(response.data);
        })
        .catch(() => {});
    }, 1000),

    getallmod() {
    
      let $this = this;
      // this.url= "/blogpost",
      axios
        .get(this.url)
        .then(response => {
             this.keyword = "",
       this.selected= '' ,
       this.select_city='',
       this.select_date='',
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
      this.$Progress.start()
      this.url = url;
      this.getallmod();
            

    },

    getAllCategoryPost() {
             this.$Progress.start()
        
      if (this.$route.params.id != null) {
        // this.$store.dispatch('getPostByCatId',this.$route.params.id);

        let $this = this;

        this.url = "/category/" + this.$route.params.id+"/post";

        axios
          .get(this.url)
          .then(response => {
            this.blogpost = response.data.data;
            $this.makepagenation(response.data);
             this.$Progress.finish()

          })
          .catch(() => {});
      } else {
        // this.$store.dispatch('getblogPost');
        this.getallmod();
      }
    }
  },
  watch: {
    $route(to, from) {
      this.getAllCategoryPost();
    }
  }
  // beforeUpdate()
  // {
  //   if (this.$route.params.id==null && this.keyword==null)
  //   {
  //     this.url='/blogpost'
  //   }
  // },
  // updated()
  // {
  //    if (this.$route.params.id==null && this.keyword==null)
  //   {
  //     this.url='/blogpost'
  //   }
  // }
};
</script>

<style lang="css" scoped>
@import "paginate.css";
.bottom-article {
  float: left;
  width: 100%;
  border-top: 1px solid #e9e9e9;
  border-bottom: 1px solid #e9e9e9;
  /* padding: 10px 0 10px 0; */
  /* margin-top: 20px; */
}
.form-search
{
  display:inline-flex;
  margin-top:2px
}
</style>