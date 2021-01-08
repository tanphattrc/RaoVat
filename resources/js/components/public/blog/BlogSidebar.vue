<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <!-- <div class="widget">
                <form class="form-search">
                  <input @keyup="RealSearch" placeholder="Nhập tìm kiếm" v-model="keyword" type="text" class="input-medium search-query">
                  <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Tìm kiếm</button>
                </form>
              </div> -->
              <div class="widget">
                <h5 class="widgetheading">Thể loại</h5>
                <ul class="cat">

                  <li class="trans" v-for="category in allcategories" :key="category.id " >
                    <i class="icon-angle-right"></i>
                    <router-link class="catHighlight" :to="`/categories/${category.id}`" >{{category.cat_name}}
                    </router-link>
                  <!-- <span> (Số bài viết liên quan)</span> -->
                  </li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Bài viết gần nhất</h5>
                <ul class="recent">

                  <li v-for="(post,index) in blogpost" v-if="post.state && showAllBlog && index <12" :key="post.id">
                    <img :src="`uploadimage/${post.photo}`" class="pull-left" alt="" width="40" height="40"/>
                    <h6><router-link :to="`/tin-rao-vat/${post.id}`">{{post.title}}</router-link></h6>
                    <p>
                     {{post.description | sortlength(40,"....")}}
                    </p>
                  </li>
                   <li v-for="(post,index) in blogpost" v-if="post.state && showAllBlog==false && index >=0 && index<5" :key="post.id">
                    <img :src="`uploadimage/${post.photo}`" class="pull-left" alt="" width="40" height="40"/>
                    <h6><router-link :to="`/tin-rao-vat/${post.id}`">{{post.title}}</router-link></h6>
                    <p>
                     {{post.description | sortlength(40,"....")}}
                    </p>
                  </li>

                </ul>
                <div>
                   <div class="icon-chevron-up icon-square icon-32 active" v-if="showAllBlog"  @click="showAllBlog = !showAllBlog"></div>
            <div v-else  @click="showAllBlog = !showAllBlog" class="icon-chevron-down icon-square icon-32 active"></div>
        </div>
              </div>

            </aside>
          </div>
    </span>
</template>

<script>
  //  import _ from 'lodash'
    export default {
        name: "BlogSidebar",
        data(){
           return {
               keyword:'',
               showAllBlog:false,
               isActive:false,

           }
        },
        computed:{
            allcategories(){
                return this.$store.getters.allcategories;
            },
            blogpost(){
                return this.$store.getters.latestpost
            }
        },
        mounted(){
            this.$store.dispatch('latestPost');
            this.$store.dispatch('allcategories')
        },
        methods:{
            // RealSearch:_.debounce(function () {
            //     this.$store.dispatch('SearchPost',this.keyword);
            // },1000)
        }
    }
</script>

<style lang="css" scoped>
.trans:hover
{
  transform: translateX(3%);
}
.catHighlight:focus
{
  color: red;
}
/* .catHighlight:focus-visible
{
  color: red;
} */


/* .catHighlight:visited
{
  color: red;
} */


</style>