<template>
  <div class="wrapper container">
    <table class="jumbotron mt-5" style="margin-bottom:230px">
      <tbody id="wizard" class="col-sm-8 mx-auto">
        <section style="display:block"> 
          <div class="form-header" style="display: flex;">
            <div class="avartar" style="width: 33.75%;">
                <img
                 :src="`uploadimage/${this.user.photo}`"
                  alt
                  style="width:200px;height:200px; border-radius:20px"
                  
                />
              <div class="avartar-picker" style="text-align:center">
             
                <label v-if="this.user.sex" class="fa fa-male">Nam</label>
                <label v-else class="fa fa-female">Nữ</label>
              </div>
            </div>
            <div class="form-group" style="    width: 66.25%;">
              <div class="form-holder">
                <label> Tên
                </label>
                <div class="form-control">{{this.user.name}}</div>
              </div>
              <div class="form-holder">
                 <label> Email
                 </label>
                <div class="form-control">{{this.user.email}}</div>
              </div>
              <div class="form-holder">
                <label> Điện thoại
                </label>
                <div class="form-control">{{this.user.phone}}</div>
              </div>
            </div>
          </div>
          <div class="form-holder">
            <label> Địa chỉ
            </label>
            <div class="form-control">{{this.user.address}}</div>
          </div>
          <div class="form-holder">
            <label> Quyền
            </label>
            <div v-if="user.isVip!='Vip'" class="form-control">
              {{user.isVip}}
              <btn class="btn btn-submit" @click.prevent="RequestUpdateVip">Nâng cấp VIP</btn>
            </div>
          </div>
          <div class="footer" style="text-align:center">
            <router-link class="btn btn-submit" :to="`edit-user/${user.id}`">Chỉnh sửa</router-link>
          </div>
        </section>


      </tbody>

    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {}
    };
  },
  mounted() {
      this.$Progress.finish()
    this.getUser();
  },
  created()
  {
 this.$Progress.start()
  },
  methods: {
    getUser() {
      return axios
        .get("/api/profile", {
          headers: { Authorization: `Bearer ${localStorage.usertoken}` }
        })
        .then(res => {
          this.user = res.data.user;
        })
        .catch(err => {
          console.log(err);
        });
    },
    RequestUpdateVip() {
      axios
        .post("/RequestUpdateVip", { id: this.user.id })
        .then(res => {
          this.user.isVip = "Đang xử lý";
           toast({
                            type: 'success',
                            title: 'Yêu cầu đã được gửi.'
                        })
        })
        .catch(error => {
          console.log(error.response.data);
          // xử lý chuỗi err

          //
        });
    }
  }
};
</script>

<style lang="css" scoped>
  @import './style.scss'
</style>
