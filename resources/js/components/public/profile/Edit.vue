<template>
    <!-- <div class="container">
            <div class="jumbotron mt-5" style="width:40%; margin:auto">
                <div class="col-md-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header col-sm-8 mx-auto">
                            <h3 class="card-title text-center txt-header">Sửa thông tin</h3>
                        </div>
                        <form role="form" @submit.prevent="updateUser()">
                            <div class="card-body col-md-6 mx-auto text-center">
                                <div class="form-group">
                                    <label for="name" class="txt-lb">Tên:</label>
                                  
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone" class="txt-lb">Số điện thoại:</label>
                                    
                                </div>
                                  <div class="form-group">
                                    <label for="address" class="txt-lb">Địa chỉ:</label>
                                    
                                </div>
                               
                                   <div class="form-group">
               
                </div>
                           

                              
                                

                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-submit" >Cập nhật</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
    </div> -->
    <div class="wrapper container">
    <table class="jumbotron mt-5" style="margin-bottom:230px">
      <tbody id="wizard" class="col-sm-8 mx-auto">
        <section style="display:block"> 
            <form  role="form" @submit.prevent="updateUser()">
          <div class="form-header" style="display: flex;">
            <div class="avartar" style="width: 33.75%;">
                <img
                  :src="updateImage()"
                  alt
                  style="width:200px;height:200px"
                />
              <div class="avartar-picker" style="text-align:center">
             
                <input type="file" :class="{ 'is-invalid': form.errors.has('file-1[]') }"  @change="changePhoto($event)"
                 name="file-1[]" id="file-1" class="inputfile" data-multiple-caption="{count} files selected" multiple />
									<label for="file-1">
										<span>Choose Picture</span>
									</label>
              </div>
            </div>
            <div class="form-group" style="    width: 66.25%;">
              <div class="form-holder">
                <label> Tên
                </label>
                <input type="text" class="form-control" id="name" placeholder="Add New UserName" v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-holder">
                 <label> Email
                 </label>
                	<div class="form-control" >
                        {{form.email}}
                	</div>
              </div>
              <div class="form-holder">
                <label> Điện thoại
                </label>
              	<input type="text" class="form-control form-in" id="phone" placeholder="Add New Phone" v-model="form.phone" name="phone" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
              </div>
            </div>
          </div>
          <div class="form-holder">
            <label> Địa chỉ
            </label>
           <input type="text" class="form-control form-in" id="address" placeholder="Add New address" v-model="form.address" name="address" :class="{ 'is-invalid': form.errors.has('address') }">
                                    <has-error :form="form" field="address"></has-error>
          </div>
          <div class="form-holder">
            	   <label for="sex">Giới tính:</label>
                  <select style="text-align:center"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('sex') }"
                    v-model="form.sex" 
                  >
                    <option disabled value>Chọn giới tính</option>
                    <option
                      value="1"
                     
                      
                    >Nam</option>
                     <option
                      value="0"
                     
                      
                    >Nữ</option>
                  </select>
                  <has-error :form="form" field="sex"></has-error>
          </div>
          <div class="footer" style="text-align:center">
                                <button type="submit" class="btn btn-submit" >Cập nhật</button>
          </div>
            </form>
        </section>


      </tbody>

    </table>
  </div>
</template>

<script>
    export default {
        name: "Edit",
        created()
        {
 this.$Progress.start()
        },
        mounted(){
          axios.get(`/api/editUser/${this.$route.params.userid}`,{
                 headers: { Authorization: `Bearer ${localStorage.usertoken}`}
            }
            )
                .then((response)=>{
                    this.form.fill(response.data.user)
                     this.$Progress.finish()

                })
        },
        data(){
            return {
                form: new Form({
                    name:'',
                    email:'',
                    phone:'',
                    sex:true,
                    address:'',
                    photo:'',

                })
            }
        },
        methods:{
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
              updateImage() {
      let img = this.form.photo;
      if (img.length > 100) {
        return this.form.photo;
      } else {
        return `uploadimage/${this.form.photo}`;
      }
    },
            updateUser(){
              this.$Progress.start()
                this.form.post(`/api/update-user/${this.$route.params.userid}`
                
                  
             
            )
                    .then((response)=>{
                        this.$Progress.finish()
                        this.$router.push('/profile')

                        toast({
                            type: 'success',
                            title: 'User Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })

            },
                 
            
        }
    }
</script>

<style lang="scss" scoped>
@import "./style.scss";
 .form-in
    {
      
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
      font-size: 15px;
    }
  .txt-header
    {
        font-style: italic;
      font-size: 40px;
         background: rgba(240, 60, 2, 0.84);
    border-radius: 8px;
    color: navajowhite;
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