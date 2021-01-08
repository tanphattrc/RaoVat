<template>
<div class="container">
    <div class="jumbotron mt-5" style="    width: 80%;
    margin: auto;">
        <!-- left column -->
        <div class="col-md-10 col-sm-8 mx-auto" style="background: rgba(169, 169, 169, 0.06);;
    border-radius: 30px;">
          <!-- general form elements -->
          <div class="card card-primary" >
            <div class="card-header text-center">
              <h3 class="card-title txt-header">Đăng tin rao vặt</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost()">
              <div class="card-body text-center" >
                <div class="form-group">
                  <label for="postId" >Tiêu đề</label>
                  <input
                    type="text"
                    class="form-control form-in"
                    id="postId"
                    placeholder="Nhập tiêu đề tin"
                    v-model="form.title"
                    name="title"
                    :class="{ 'is-invalid': form.errors.has('title') }"
                  />
                  <has-error :form="form" field="title"></has-error>
                </div>
                <div class="form-group">
                  <label for="postId">Giá</label>
                  <input
                    type="number"
                     pattern="[+]?[0-9]*[.,]?[0-9]+"
                    class="form-control form-in"
                    id="postId"
                    v-model="form.price "
                    name="price"
                    :class="{ 'is-invalid': form.errors.has('price') }"
                  />
                  <has-error :form="form" field="price"></has-error>
                </div>
                <div class="form-group ">
                  <label for="descriptionId">Mô tả</label>

                  <markdown-editor name="html" v-model="form.description" style="border-radius: 25px;"></markdown-editor>

                  <has-error :form="form" field="description"></has-error>
                </div>

                <div class="form-group">
                  <label>Thể loại</label>
                  <select
                    class="form-control form-in"
                    :class="{ 'is-invalid': form.errors.has('cat_id') }"
                    v-model="form.cat_id"
                  >
                    <option disabled value>Chọn thể loại tin</option>
                    <option
                      :value="category.id"
                      v-for="category in getallCategory"
                      :key="category.id"
                    >option {{category.cat_name}}</option>
                  </select>
                  <has-error :form="form" field="cat_id"></has-error>
                </div>
                <!--  -->
                   <div class="form-group">
                  <label>Tỉnh</label>
                  <select
                    class="form-control form-in"
                    :class="{ 'is-invalid': form.errors.has('city_id') }"
                    v-model="form.city_id"
                  >
                    <option disabled value>Chọn tỉnh</option>
                    <option
                      :value="city.id"
                      v-for="city in getallCity"
                      :key="city.id"
                    >option {{city.name}}</option>
                  </select>
                  <has-error :form="form" field="city_id"></has-error>
                </div>
              
                <div class="form-group">
                  <input
                    @change="changePhoto($event)"
                    name="photo"
                    type="file"
                    :class="{ 'is-invalid': form.errors.has('photo') }"
                    style="border:none;border-radius:40px"
                  />
                  <img :src="form.photo" alt width="80" height="80" />
                  <has-error :form="form" field="photo"></has-error>
                </div>
           
                   <div class="form-group">
                  <label>Người đăng</label>
                  <select
                    class="form-control form-in"
                    :class="{ 'is-invalid': form.errors.has('user_id') }"
                    v-model="form.user_id"
                  >
                    <option :value="user.id"
                            :key="user.id">{{user.name}}</option>
         
                  </select>
                  <has-error :form="form" field="user_id"></has-error>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <button type="submit" v-if="form.price>0" class="btn btn-submit" >Đăng tin</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</template>

<script>
export default {
  name: "New",
  data() {
    return {
      form: new Form({
        title: "",
        description: "",
        cat_id: "",
        photo: "",
        price: 0,
        user_id:"",
        city_id:"",
      }),
      user: []
    };
  },
  created()
  {
 this.$Progress.start()
  },
  mounted() {
     this.$Progress.finish()
    this.$store.dispatch("allCategory");
      this.$store.dispatch("allcities");
    this.getUser();
    
  },
  computed: {
    getallCategory() {
      return this.$store.getters.getCategory;
    },
    getallCity() {
      return this.$store.getters.allcities;
    }
  },
  methods: {
    changePhoto(event) {
      let file = event.target.files[0];

      if (file.size > 1048576) {
        swal({
          type: "error",
          title: "Oops...",
          text: "Something went wrong!",
          footer: "<a href>Why do I have this issue?</a>"
        });
      } else {
        let reader = new FileReader();
        reader.onload = event => {
          this.form.photo = event.target.result;
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
    },
    addnewPost() {
      this.form
        .post("/api/post", {
          headers: { Authorization: `Bearer ${localStorage.usertoken}` }
        })
        .then(() => {
        //   this.$router.push("/post-list");
          this.$router.push("/");
          toast({
            type: "success",
            title: "Post Added successfully"
          });
        })
        .catch(() => {});
    },
     getCiTy() {
      this.form
        .get("/api/post", {
          
        })
        .then(() => {
        //   this.$router.push("/post-list");
          this.$router.push("/");
          toast({
            type: "success",
            title: "Post Added successfully"
          });
        })
        .catch(() => {});
    },
    
    
    getUser () {
      return axios.get('/api/profile', {
        headers: { Authorization: `Bearer ${localStorage.usertoken}` }
      }
      ).then(res => {
        // console.log(res.data)
        this.user= res.data.user,
        this.form.user_id= this.user.id,
        console.log(res.data)
      })
        .catch(err => {
          console.log(err)
        })
    }
  }
};
</script>

<style lang="css" scoped>
.form-in
    {
          /* height: 40px;
    border-radius: 16px;
    padding: 0px 16px;
    width: 332px;
    font-size: 18px;
    text-align: center; */
    font-family: Poppins-Regular;
font-size: 15px;
color: #555555;
line-height: 1.2;

display: block;
width: 50%;
height: 30px;
background: transparent;
padding: 0 5px;
border-radius: 10px;
margin: auto;
    }
    .txt-lb{
      font-style: italic;
      font-size: 20px;
    }
    .txt-header
    {
        font-style: italic;
      font-size: 40px;
         background: rgba(240, 60, 2, 0.84);
    border-radius: 8px;
    color: navajowhite;
    }
    .card-footer
    {
      margin-top: 3px;
       border-radius: 8px;
    }
    .btn-submit
    {
          background: rgba(240, 60, 2, 0.84);
    border-radius: 10px;
    margin: auto;
    font-size: 15px;
    }
    .btn-submit:hover
    {
      background: rgba(255, 62, 0, 0.98);
      transform: translateY(4%);
    }
</style>