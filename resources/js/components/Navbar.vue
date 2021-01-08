<template>
  <div>
    <div class="container">
      <div class="row nomargin">
        <!-- <navbar-component/> -->

        <div class="span12">
          <div class="headnav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <router-link class="nav-link trans" to="/">Trang chủ</router-link>
              </li>

              <li v-if="auth==''" class="nav-item trans">
                <router-link class="nav-link" to="/login">Đăng nhập</router-link>
              </li>
              <li v-if="auth==''" class="nav-item trans">
                <router-link class="nav-link" to="/register">Đăng kí</router-link>
              </li>
              <!-- <li v-if="auth=='loggedin'" class="nav-item">
          <router-link class="nav-link" to="/profile">Profile  </router-link>
              </li>-->

              <li v-if="auth=='loggedin'" class="nav-item dropdown  " style="color: #F03C02;outline: 0; font-size: 12px;font-weight: 600">
                    {{user}}

                <a
                  id="navbarDropdown"
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  v-pre
                >
                   
                  <span class="caret"></span>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-left"
                  aria-labelledby="navbarDropdown"
                  style="background:white"
                >
                  <router-link class="nav-link dropdown-item" to="/profile">Thông tin</router-link>
                  <p></p>
                  <router-link class="nav-link dropdown-item" to="/add-post">Đăng tin</router-link>
                  <p></p>
                  <p></p>
                  <router-link class="nav-link dropdown-item" to="/list-post-user">Bài  đăng</router-link>
                  <p></p>
                  <!-- <router-link class="nav-link dropdown-item" :to="{ name: 'Chat', params: { user:user } }" >Chat </router-link> -->
                  <router-link class="nav-link dropdown-item" :to="{ name: 'Chat' }" >Tin nhắn </router-link>

                </div>
              </li>
              <li v-if="auth=='loggedin'" class="nav-item trans">
                <a class="nav-link" href v-on:click="logout">Đăng xuất</a>
                <!-- <router-link class="nav-link" @click="logout" to="/">Logout</router-link> -->
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span4">
          <div class="logo">
            <!-- <a href=""><img  src="uploadimage/logo.png"  alt="" class="logo" /></a> -->
            <router-link to="/">
              <img src="uploadimage/logo.png" alt class="logo" />
            </router-link>
          </div>
        </div>
        <div class="span4">

        </div>
        <div class="span4">
          <div class="navbar navbar-static-top">
            <div class="navigation">

              <nav>
                <ul class="nav topnav trans">
                  <li>
                    <router-link to="/tin-rao-vat">Tin rao vặt</router-link>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end navigation -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "./EventBus";
// EventBus.$on("logged-in", test => {
//   console.log(test);
// });
export default {
  
 components: {
        },
        computed: {
         
        },
  data() {
    return {
      auth: "", 
      user:'',
      
    };
  },
  created() {
     
  },

  methods: {
           
    logout() {
      localStorage.removeItem("usertoken");
      localStorage.removeItem("loggedin");
      localStorage.removeItem("user");
      // this.auth=''
      this.$router.push('/')
    }
  },
  mounted() {
    EventBus.$on("logged-in", status => {
      this.auth = status;

    });
     if (localStorage.loggedin)
      {
       this.auth= localStorage.loggedin
      };
     if (localStorage.user)
    {
       this.user= localStorage.user
    };
  
  },
  beforeUpdate()
  {
     this.user= localStorage.user
     this.auth= localStorage.loggedin

  },
  updated()
  {
      // this.user= localStorage.user
      // this.auth= localStorage.loggedin  
  }
};
</script>
<style lang="scss" scoped>

.pos_nav {
  margin-left: auto;
}
.trans:hover
{
  transform: translateY(-5%);
}
.transY:hover
{
  transform: translateY(-3%);
}
</style>
