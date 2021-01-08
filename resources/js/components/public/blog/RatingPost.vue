<template>
  <div class="container">
    <div class="component_rating row" style="margin-bottom:20px">
      <h3>Đánh giá</h3>
      <div
        class="content"
        style="display:flex; align-items:center;border-radius:5px; border:1px solid #dedede"
      >
        <div class="list-rating" style="width:80%; padding:20px;text-align:center">
          <img :src="`uploadimage/${photo}`" alt style="width:30%; height:90px" />
          <span style="font-size:15px;font-style:italic">{{title }}</span>
          <div class="item" style="; position:relative">
            <span
              class="fa fa-star"
              style="font-size:400%;color:#ff9705;margin:0 auto; text-align:center"
            >
              <span style="margin:auto; text-align:center">{{point_rat}}</span>
            </span>
          </div>

         
        </div>
         <span @click="showRate=!showRate" style="width:80%">
            <a
              class="js_rating_action"
              style="width:80%;background:#288ad6;padding:10px;color:white;border-radius:5px"
            >Gửi Đánh giá của bạn</a>
          </span>
      </div>
    </div>
    <form role="form" @submit.prevent="addnewRating">
      <div style="display:flex;margin-top:15px; font-size:15px" v-if="showRate">
        <p style="margin-bottom:0">Chọn đánh giá của bạn</p>
        <span class="list_star" style="margin:0 15px">
          <ul style="list-style:none;display:flex">
            <li v-for="n in 5">
              <i class="fa fa-star" @click="SetNumber(n)" @mousemove="showText(n)"></i>
            </li>
          </ul>
        </span>
        <span class="list_text">Tốt</span>
        <div style="margin-left:10px">
          <textarea style="width:300px" v-model="r_content" placeholder="Gửi đánh giá"></textarea>
        </div>
        <button
          type="submit"
          style="background:rgb(40, 138, 214); width:40px; height:30px; color:white; margin-left:10px"
          class="btn"
        >Gửi</button>
      </div>
    </form>
    <div class="list-rating" style="border-radius:5px; border:1px solid #dedede">
      <div class="rating_item" style="margin:10px 0">
        <ul style="list-style:none">
          <li v-for="rating in ratings" style="margin-bottom: 5px;">
            <div>
              <span
                style="color:#333;font-weight:bold;text-transform:capitalize"
                v-if="rating.user"
              >{{rating.user.name}}</span>
              <span style="color:#333;font-weight:bold;text-transform:capitalize" v-else>{{name}}</span>
              <a style="color:#2ba832">
                <i class="fa fa-check-circle"></i>
              </a>
            </div>
            <p style="display:flex; margin-bottom:0">
              <span class="post_rating">
                <ul style="list-style:none; display:flex">
                  <li v-for="n in rating.ra_number">
                    <i class="fa fa-star" style="color: #ff9705;"></i>
                  </li>
                </ul>
              </span>
              <span class="ra_content" style="margin-left:5px">{{rating.ra_content}}</span>
            </p>
            <div>{{rating.created_at}}</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showRate: false,
      number: 0,
      r_content: "",
      ratings: [],
      name: localStorage.user,
      point_rat: 0,
      photo: "",
      title: ""
    };
  },
  created() {
    this.$Progress.start();
  },
  mounted() {
    this.$Progress.finish();
    axios
      .get(`/getratingBlog/${this.$route.params.id}`)
      .then(respone => {
        this.ratings = respone.data;
      })
      .catch(() => {});

    axios
      .get("/blogpost/" + this.$route.params.id)
      .then(respone => {
        if (
          respone.data.post.post_total_number &&
          respone.data.post.post_total_rating
        ) {
          this.point_rat = (
            respone.data.post.post_total_number /
            respone.data.post.post_total_rating
          ).toFixed(2);
        }
        this.photo = respone.data.post.photo;
        this.title = respone.data.post.title;
      })
      .catch(() => {});
  },
  computed: {},
  methods: {
    showText(n) {
      let listStar = $(".list_star .fa");
      listStar.removeClass("rating_active");
      $.each(listStar, function(key, value) {
        if (key + 1 <= n) {
          $(this).addClass("rating_active");
        }
      });
      if (n == 1) {
        $(".list_text")
          .text("Không thích")
          .show();
      }
      if (n == 2) {
        $(".list_text")
          .text("Tạm được")
          .show();
      }
      if (n == 3) {
        $(".list_text")
          .text("Bình thường")
          .show();
      }
      if (n == 4) {
        $(".list_text")
          .text("Rất tốt")
          .show();
      }
      if (n == 5) {
        $(".list_text")
          .text("Tuyệt vời quá")
          .show();
      }
    },
    SetNumber(number) {
      this.number = number;
    },
    addnewRating() {
      const token = localStorage.usertoken;
      axios
        .post(`/saverating/${this.$route.params.id}?token=` + token, {
          number: this.number,
          r_content: this.r_content
        })
        .then(res => {
          toast({
            type: "success",
            title: "Đánh giá thành công"
          });
          if (this.point_rat > 0) {
            (this.point_rat = this.number + parseFloat(this.point_rat)),
              (this.point_rat = (parseFloat(this.point_rat) / 2).toFixed(2));
          } else {
            this.point_rat = this.number;
          }

          (this.r_content = ""),
            (this.number = 0),
            this.ratings.push(res.data[0]);
        })
        .catch(() => {});
    }
  }
};
</script>

<style lang="css" scoped>
.list_star i:hover {
  cursor: pointer;
}
.list_star .rating_active,
.post-rating .active {
  color: #ff9705;
}
.list_text {
  height: 30px;
  display: inline-block;
  margin-left: 10px;
  position: relative;
  background: #52b858;
  color: #fff;
  padding: 2px 8px;
  box-sizing: border-box;
  font-size: 12px;
  border-radius: 2px;
  display: none;
}
.list_text::after {
  right: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(82, 184, 88, 0);
  border-right-color: #52b585;
  border-width: 6px;
  border-top: -6px;
}
</style>