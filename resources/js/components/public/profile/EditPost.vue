<template>
  <div class="container">
    <div class="jumbotron mt-5" style="    width: 80%;
    margin: auto;">
      <!-- left column -->
      <div
        class="col-md-10 col-sm-8 mx-auto"
        style="background: #a9a9a912;
    border-radius: 30px;"
      >
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header text-center">
            <h3 class="card-title txt-header">Sửa bài đăng</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
            <div class="card-body text-center">
              <div class="form-group">
                <label for="postId">Tiêu đề</label>
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
                  step="any"
                  pattern="[-+]?[0-9]*[.,]?[0-9]+"
                  class="form-control form-in"
                  id="postId"
                  v-model="form.price "
                  name="price"
                  :class="{ 'is-invalid': form.errors.has('price') }"
                />
                <has-error :form="form" field="price"></has-error>
              </div>
              <div class="form-group">
                <label for="descriptionId">Mô tả</label>

                <markdown-editor
                  name="html"
                  v-model="form.description"
                  style="border-radius: 25px;"
                ></markdown-editor>

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
              <!--  -->
              <div class="form-group">
                <input
                  @change="changePhoto($event)"
                  name="photo"
                  type="file"
                  :class="{ 'is-invalid': form.errors.has('photo') }"
                />
                <img :src="updateImage()" alt width="80" height="80" />
                <has-error :form="form" field="photo"></has-error>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center">
              <button
                type="submit"
                class="btn btn-submit "
               
              >Cập nhật</button>
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
  name: "Edit",
  data() {
    return {
      form: new Form({
        title: "",
        description: "",
        cat_id: "",
        photo: "",
        price: "",
        city_id: ""
      })
    };
  },
  mounted() {
    this.$store.dispatch("allCategory");
    this.$store.dispatch("allcities");
  },
  created() {
     this.$Progress.start()
    axios.get(`api/post/${this.$route.params.postid}?token=`+localStorage.usertoken).then(response => {
      this.form.fill(response.data.post);
     this.$Progress.finish()

    });
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
    updatePost() {
      this.form
        .post(`api/post/${this.$route.params.postid}?token=`+localStorage.usertoken)
        .then(() => {
          this.$router.push("/list-post-user");
          toast({
            type: "success",
            title: "Post Updated successfully"
          });
        })
        .catch(() => {});
    },
    updateImage() {
      let img = this.form.photo;
      if (img.length > 100) {
        return this.form.photo;
      } else {
        return `uploadimage/${this.form.photo}`;
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.form-in {
  // height: 40px;
  // border-radius: 16px;
  // padding: 0px 16px;
  
  // font-size: 18px;
  // text-align: center;
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
      margin-top:3px;
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
      transform: translateY(6%);
    }
</style>