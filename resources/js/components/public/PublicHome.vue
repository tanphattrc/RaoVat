<template>
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <!-- <ul class="portfolio-categ filter">
              <li class="all active"><a href="#">All</a></li>
              <li class="web"><a href="#" title="">Web design</a></li>
              <li class="icon"><a href="#" title="">Icons</a></li>
              <li class="graphic"><a href="#" title="">Graphic design</a></li>
            </ul> -->
            <div class="clearfix">
            </div>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                 
                  <li class="item-thumbs span3 design" v-for="(category,index ) in allcategories" :key="category.id" v-if="index<12" style="width:150px; height:100px">
                  
                    <span>{{category.cat_name}} </span>
                    <router-link :to="`/categories/${category.id}`" class="pull-right hover-wrap fancybox" data-fancybox-group="gallery" :title="category.cat_name">
                   
 
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>  
                    </router-link>
                   <img :src="`uploadimage/${category.photo}`" alt=""  />
                  </li>
               
                </ul>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>

<script>

    export default {
        name: "PublicHome",
         computed:{
            allcategories(){
                return this.$store.getters.allcategories;
            },
           
        },
        created()
        {
             this.$Progress.start()

        },
        mounted(){
            this.$store.dispatch('allcategories')
             this.$Progress.finish()

        },
    }

</script>

<style lang="scss" scoped>
.item-thumbs .hover-wrap .overlay-img {
    background: #F03C02;
}
</style>