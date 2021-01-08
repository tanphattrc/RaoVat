 <template>
  <!-- <div class="container">
     <section class="content " style=" width: 40%;
    margin: auto;background: #f2f2f240;
    border-radius: 30px;">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-6 mt-5 mx-auto span 8 ">
                    <div class="card card-primary" style="text-align: center;">
                      
                        <form role="form" @submit.prevent="login()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email" class="txt-lb">Email address</label>
                                    <input type="email" v-model="email" class="form-control form-in" name="email" placeholder="Enter email" >
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                                
                                 <div class="form-group" >
                                   <label for="password" class="txt-lb">Password</label>
                                    <input type="password" v-model="password" class="form-control form-in" name="password" placeholder="Password">
                                    <has-error :form="form" field="password"></has-error>
                                </div>
                                

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="form-in" style="background-color: #1877f2; width:200px;margin:auto;  ">Đăng nhập</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
 	 -->
  
  <div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100">
        
				<form class="login100-form validate-form" role="form" @submit.prevent="login()">
					<span class="login100-form-title p-b-26">
						Đăng nhập
					</span>
					<span class="login100-form-title p-b-48">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
            <label for="email" class="txt-lb">Email address</label>
						<input class="input100" type="text" name="email" v-model="email" />
            <span class="focus-input100" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">

						</span>
             <label for="password" class="txt-lb">Password</label>
						<input class="input100" type="password" name="pass" v-model="password">
            <span class="focus-input100" data-placeholder=""></span>
					</div>
            <div class="error" v-if="errors.length" style="color:red">
              {{errors}}
          </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn" ></div>
							<button class="login100-form-btn">
								Đăng nhập
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
						Bạn chưa có tài khoản
						</span>

              <router-link class="nav-link" to="/register">Đăng kí</router-link>
					</div>
				</form>
			</div>
		</div>
	</div>
	

</template>

<script>
import EventBus from './EventBus'
export default {
  data () {
    return {
      email: '',
      password: '',
        checkLogin:true,
        errors:[],
    }
  },
created()
{
 this.$Progress.start()

},
mounted()
{
   this.$Progress.finish()
},
  methods: {
    login () {
      axios.post('/api/login',
        {
          email: this.email,
          password: this.password
        }
      ).then((res) => {
        localStorage.setItem('usertoken', res.data.token)
        localStorage.setItem('loggedin','loggedin')
        localStorage.setItem('user',res.data.user.name)
          this.checkLogin=true
        this.email = ''
        this.password = ''
          this.$router.push('/')

          EventBus.$emit('logged-in', 'loggedin')
  

      }).catch((err) => {
        console.log(err)
          this.checkLogin=false
          this.errors = err.response.data.error;
          console.log(this.errors);
      })
    },

  }
}
</script>
<style lang="css" scoped>
   .err{
    color: red;
}
.form-in
{
      height: 40px;
border-radius: 16px;
padding: 0px 16px;
width: 332px;
font-size: 18px;
text-align: center;
}
.txt-lb{
  font-style: italic;
  font-size: 13px;
}
.txt-header
{
    font-style: italic;
  font-size: 40px;
}
/*  */




/*//////////////////////////////////////////////////////////////////
[ FONT ]*/





/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
margin: 0px; 
padding: 0px; 
box-sizing: border-box;
}

/* body, html {
height: 100%;
font-family: Poppins-Regular, sans-serif;
} */

/*---------------------------------------------*/
a {
font-family: Poppins-Regular;
font-size: 14px;
line-height: 1.7;
color: #666666;
margin: 0px;
transition: all 0.4s;
-webkit-transition: all 0.4s;
-o-transition: all 0.4s;
-moz-transition: all 0.4s;
}

a:focus {
outline: none !important;
}

a:hover {
text-decoration: none;
color: #6a7dfe;
color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
color: -o-linear-gradient(left, #21d4fd, #b721ff);
color: -moz-linear-gradient(left, #21d4fd, #b721ff);
color: linear-gradient(left, #21d4fd, #b721ff);
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
margin: 0px;
}

p {
font-family: Poppins-Regular;
font-size: 14px;
line-height: 1.7;
color: #666666;
margin: 0px;
}

ul, li {
margin: 0px;
list-style-type: none;
}


/*---------------------------------------------*/
input {
outline: none;
border: none;
overflow: visible;
}

textarea {
outline: none;
border: none;
}

textarea:focus, input:focus {
border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #adadad;}
input:-moz-placeholder { color: #adadad;}
input::-moz-placeholder { color: #adadad;}
input:-ms-input-placeholder { color: #adadad;}

textarea::-webkit-input-placeholder { color: #adadad;}
textarea:-moz-placeholder { color: #adadad;}
textarea::-moz-placeholder { color: #adadad;}
textarea:-ms-input-placeholder { color: #adadad;}

/*---------------------------------------------*/
button {
outline: none !important;
border: none;
background: transparent;
}

button:hover {
cursor: pointer;
}

iframe {
border: none !important;
}


/*//////////////////////////////////////////////////////////////////
[ Utility ]*/
.txt1 {
font-family: Poppins-Regular;
font-size: 13px;
color: #666666;
line-height: 1.5;
}

.txt2 {
font-family: Poppins-Regular;
font-size: 13px;
color: #333333;
line-height: 1.5;
}

/*//////////////////////////////////////////////////////////////////
[ login ]*/

.limiter {
width: 100%;
margin: 0 auto;
}

.container-login100 {
width: 50%;margin:auto;border-radius:20px; 
min-height: 100vh;
display: -webkit-box;
display: -webkit-flex;
display: -moz-box;
display: -ms-flexbox;
display: flex;
flex-wrap: wrap;
justify-content: center;
align-items: center;
padding: 15px;
background: #80808008;
}

.wrap-login100 {
width: 390px;
background: #fff;
border-radius: 10px;
overflow: hidden;
padding: 77px 55px 33px 55px;

box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
-webkit-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
-o-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
-ms-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
}


/*------------------------------------------------------------------
[ Form ]*/

.login100-form {
width: 100%;
}

.login100-form-title {
display: block;
font-family: Poppins-Bold;
font-size: 30px;
color: #333333;
line-height: 1.2;
text-align: center;
}
.login100-form-title i {
font-size: 60px;
}

/*------------------------------------------------------------------
[ Input ]*/
input {
outline: none;
border: none;
}
.wrap-input100 {
width: 100%;
position: relative;
border-bottom: 2px solid #adadad;
margin-bottom: 37px;
}

.input100 {
font-family: Poppins-Regular;
font-size: 15px;
color: #555555;
line-height: 1.2;

display: block;
width: 100%;
height: 45px;
background: transparent;
padding: 0 5px;
border-radius: 10px;
}

/*---------------------------------------------*/ 
.focus-input100 {
position: absolute;
display: block;
width: 100%;
height: 100%;
top: 0;
left: 0;
pointer-events: none;
}

.focus-input100::before {
content: "";
display: block;
position: absolute;
bottom: -2px;
left: 0;
width: 0;
height: 2px;

-webkit-transition: all 0.4s;
-o-transition: all 0.4s;
-moz-transition: all 0.4s;
transition: all 0.4s;

background: #6a7dfe;
background: -webkit-linear-gradient(left, #21d4fd, #b721ff);
background: -o-linear-gradient(left, #21d4fd, #b721ff);
background: -moz-linear-gradient(left, #21d4fd, #b721ff);
background: linear-gradient(left, #21d4fd, #b721ff);
}

.focus-input100::after {
font-family: Poppins-Regular;
font-size: 15px;
color: #999999;
line-height: 1.2;

content: attr(data-placeholder);
display: block;
width: 100%;
position: absolute;
top: 16px;
left: 0px;
padding-left: 5px;

-webkit-transition: all 0.4s;
-o-transition: all 0.4s;
-moz-transition: all 0.4s;
transition: all 0.4s;
}

.input100:focus + .focus-input100::after {
top: -15px;
}

.input100:focus + .focus-input100::before {
width: 100%;
}

.has-val.input100 + .focus-input100::after {
top: -15px;
}

.has-val.input100 + .focus-input100::before {
width: 100%;
}

/*---------------------------------------------*/
.btn-show-pass {
font-size: 15px;
color: #999999;

display: -webkit-box;
display: -webkit-flex;
display: -moz-box;
display: -ms-flexbox;
display: flex;
align-items: center;
position: absolute;
height: 100%;
top: 0;
right: 0;
padding-right: 5px;
cursor: pointer;
-webkit-transition: all 0.4s;
-o-transition: all 0.4s;
-moz-transition: all 0.4s;
transition: all 0.4s;
}

.btn-show-pass:hover {
color: #6a7dfe;
color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
color: -o-linear-gradient(left, #21d4fd, #b721ff);
color: -moz-linear-gradient(left, #21d4fd, #b721ff);
color: linear-gradient(left, #21d4fd, #b721ff);
}

.btn-show-pass.active {
color: #6a7dfe;
color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
color: -o-linear-gradient(left, #21d4fd, #b721ff);
color: -moz-linear-gradient(left, #21d4fd, #b721ff);
color: linear-gradient(left, #21d4fd, #b721ff);
}



/*------------------------------------------------------------------
[ Button ]*/
button:hover {
cursor: pointer;
}
button {
outline: none !important;
border: none;
background: transparent;
}
.container-login100-form-btn {
display: -webkit-box;
display: -webkit-flex;
display: -moz-box;
display: -ms-flexbox;
display: flex;
flex-wrap: wrap;
justify-content: center;
padding-top: 13px;
}

.wrap-login100-form-btn {
width: 100%;
display: block;
position: relative;
z-index: 1;
border-radius: 25px;
overflow: hidden;
margin: 0 auto;
}

.login100-form-bgbtn {
position: absolute;
z-index: -1;
width: 300%;
height: 100%;
background:rgba(240, 60, 2, 0.84);
/* background: -webkit-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
background: -o-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
background: -moz-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
background: linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff); */
top: 0;
left: -100%;

-webkit-transition: all 0.4s;
-o-transition: all 0.4s;
-moz-transition: all 0.4s;
transition: all 0.4s;
}

.login100-form-btn {
font-family: Poppins-Medium;
font-size: 15px;
color: #fff;
line-height: 1.2;
text-transform: uppercase;

display: -webkit-box;
display: -webkit-flex;
display: -moz-box;
display: -ms-flexbox;
display: flex;
justify-content: center;
align-items: center;
padding: 0 20px;
width: 100%;
height: 50px;
}

.wrap-login100-form-btn:hover .login100-form-bgbtn {
left: 0;
}
.login100-form-btn:hover {
 transform: translateY(-8%);
  background: rgba(255, 62, 0, 0.98);

}
/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 576px) {
.wrap-login100 {
padding: 77px 15px 33px 15px;
}
}



/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
position: relative;
}

.alert-validate::before {
content: attr(data-validate);
position: absolute;
max-width: 70%;
background-color: #fff;
border: 1px solid #c80000;
border-radius: 2px;
padding: 4px 25px 4px 10px;
top: 50%;
-webkit-transform: translateY(-50%);
-moz-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-o-transform: translateY(-50%);
transform: translateY(-50%);
right: 0px;
pointer-events: none;

font-family: Poppins-Regular;
color: #c80000;
font-size: 13px;
line-height: 1.4;
text-align: left;

visibility: hidden;
opacity: 0;

-webkit-transition: opacity 0.4s;
-o-transition: opacity 0.4s;
-moz-transition: opacity 0.4s;
transition: opacity 0.4s;
}

.alert-validate::after {
content: "\f06a";
font-family: FontAwesome;
font-size: 16px;
color: #c80000;

display: block;
position: absolute;
background-color: #fff;
top: 50%;
-webkit-transform: translateY(-50%);
-moz-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-o-transform: translateY(-50%);
transform: translateY(-50%);
right: 5px;
}

.alert-validate:hover:before {
visibility: visible;
opacity: 1;
}

@media (max-width: 992px) {
.alert-validate::before {
visibility: visible;
opacity: 1;
}
}

/*  */






  
    


 
</style>
