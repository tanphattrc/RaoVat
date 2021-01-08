<template>

  <div class="small">
    <h4>Thống kê bài đăng theo thể loại</h4>
    <line-chart :chart-data="datacollection" :height="100"></line-chart>
    
    <div class="ecommerce-widget" style="box-sizing: border-box; margin-top:30px">
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
          <div class="card-body">
            <h5 class="text-muted">User <i class="fa fa-users font-rep" ></i></h5>
            <div class="metric-value d-inline-block">
              <h1 class="mb-1">{{dataStatistics[0]}}</h1>
            </div>
            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
              <span class="icon-circle-small icon-box-xs text-success bg-success-light">
                <i class="fa fa-fw fa-arrow-up"></i>
              </span>
              <span class="ml-1">5.86%</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
          <div class="card-body">
            <h5 class="text-muted">Post <i class="fa fa-shopping-cart font-rep" ></i></h5>
            <div class="metric-value d-inline-block">
              <h1 class="mb-1">{{dataStatistics[1]}} </h1>
            </div>
            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
              <span class="icon-circle-small icon-box-xs text-success bg-success-light">
                <i class="fa fa-fw fa-arrow-up"></i>
              </span>
              <span class="ml-1">10%</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
          <div class="card-body">
            <h5 class="text-muted">Category<i class="fa fa-table font-rep"></i></h5>
            <div class="metric-value d-inline-block">
              <h1 class="mb-1">{{dataStatistics[2]}}</h1>
            </div>
            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
              <span class="icon-circle-small icon-box-xs text-success bg-success-light">
                <i class="fa fa-fw fa-arrow-up"></i>
              </span>
              <span class="ml-1">5%</span>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    </div>
    <!--  -->
    <div class="card">
    <div class="card-body">
      <h2 class="card-title">Sex</h2>
    </div>

    <div class="card-img-bottom">
      <chartjs-doughnut
        :bind="true"
        :datasets="datasets"
        :labels="labels"
        :option="option"
        
      />
    </div>
  </div>
  </div>
</template>
<script>
import LineChart from "./LineChart.js";

export default {
  components: {
    LineChart
  },
  data() {
    return {
      datacollection: null,
      dataCategory: null,
      dataStatistics: null,
       datasets: [
        {
          data: [1,1],
          backgroundColor: [ "#ffdb3b", "#185190"],
          hoverBackgroundColor: [ "#fef5c9", "#d1e3f7"]
        }
      ],
      labels: [ "Male", "Femal"],
      option: {}
    };
  },
  created()
{
 this.$Progress.start()

},

  mounted() {
    axios
      .get("/getCountPostByCat")
      .then(respone => {
        this.dataCategory = respone.data;
        this.fillDataPost();
      })
      .catch(() => {});

      axios
      .get("/getCountSex")
      .then(respone => {
        this.datasets[0].data=respone.data;
      })
      .catch(() => {});

    axios
      .get("/getdataStatistics")
      .then(respone => {
        this.dataStatistics = respone.data;
   this.$Progress.finish()

      })
      .catch(() => {});

    // this.fillData(),'
  },
  computed: {},
  methods: {
     
    fillDataPost() {
      this.datacollection = {
        labels: [
          "Bất động sản",
          "Xe cộ",
          "Thời trang",
          "Giải trí thể thao",
          "Đồ dùng văn phòng",
          "Dịch vụ- Du lịch",
          "Thú cưng",
          "Mẹ và bé",
          "Đồ dùng điện tử",
          "Ẩm thực- thực phẩm",
          "Nội thất",
          "Các loại khác"
        ],

        datasets: [
          {
            label: "Số bài đăng",
            // backgroundColor: '#FF0066',
            backgroundColor: [
              "rgba(14, 48, 217, 0.6)",
             
            ],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(100, 200, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
              "rgba(255, 140, 64, 1)"
            ],
            borderWidth: 1,
            data: this.dataCategory
          }
        ]
      };
    }
  }
};
</script>
<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin: 50px auto;
}
.border-top-primary{
     border-top-color: #5969ff !important;
         border-width: 3px !important;
}
.text-muted
{
    color: #7171a6 !important;
}
.font-rep
{
    color: #5969ff !important; font-size:40px
}
</style>
