<title>Statics</title>
@extends('layouts.master')

@section('content')
<section class="bg-light content home bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <h1 class="text-center p-3 fw-bold"><span class="badge badge-primary p-4" style="letter-spacing: 2px;word-spacing:6px;">Statics Charts</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <canvas id="genderChart"></canvas>
            </div>
            <div class="col-6">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <canvas id="attendenceChart"></canvas>
            </div>
            <div class="col-6">
                <canvas id="topPurchasedChart"></canvas>
            </div>
        </div>
    </div>
</section>
<script defer>
  
    $(function(){
      var Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "info",
            title: "Sorry it may take serveral seconds to drawCharts",
        });
      $.ajax({
        url:"{{route('statics')}}",
        type:'GET',
        success:function(response)
        {
          renderGenderChart(response.attendenceChart);
          renderRevenueData(response.RevenueData);
          renderCityAttendenceChart(response.cityAttendence);
          renderTopPurchasedUserChart(response.topPurchasedUsers)
        },
        complete:function()
        {
          Toast.fire({
              icon: "success",
              title: "Drawing Data",
          });
        }
      });
      function renderGenderChart(chartData)
      {
        var genderChart = new Chart($('#genderChart'), {
        type: "pie",
        data: {
        labels: chartData.label,
        datasets: [
          {
            label: "Attendence Count",
            data: chartData.data,
            backgroundColor: [
              "#C2FCDC",
              "#E4C2FC",

            ],

            borderWidth: [1, 1]
          }
        ]
      },
        options: {
          responsive:true,
          aspectRatio:2,
          plugins:{
            title: {
              display: true,
              position: "bottom",
              text: "Attendence Male - Female",
              font:{
                size:18,
              },
              color:"brown"
            },
            legend: {
              display: true,
              position: "top",
              
              }
          }
            }
          });
      }
      function renderRevenueData(chartData)
      {
          var revData=[];
        for (const key in chartData) {
            revData.push({
              label: key,
              data: chartData[key].data,
              hidden: key==new Date().getFullYear() ? false:true,
              borderColor:`${"#"+Math.floor(Math.random()*16777215).toString(16)}`,
            });
        }
        var revenue=new Chart($('#revenueChart'), {
          type: "line",
          data: {
          labels: ['Jan','Feb','Mar','April','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
          datasets: revData,
        },
          options: {
            responsive:true,
            aspectRatio:2,
            plugins:{
              title: {
                display: true,
                position: "bottom",
                text: "Revenue eachYear",
                font:{
                  size:18,
                },
                color:"brown"
              },
              legend: {
                display: true,
                position: "top",
                
            }
        }
          }
        });

      }
      function renderCityAttendenceChart(chartData)
      {
          var colorsArray=[];
          for(var i=0;i<chartData.data.length;i++)
          {
            colorsArray.push("#"+Math.floor(Math.random()*16777215).toString(16));
          }
          var cityAttendenceChart = new Chart($('#attendenceChart'), {
            type: "pie",
            data: {
            labels: chartData.label,
            datasets: [
              {
                label: "Attendence Count",
                data: chartData.data,
                backgroundColor: colorsArray,
              }
            ]
          },
            options: {
              responsive:true,
              aspectRatio:2,
              plugins:{
                title: {
                  display: true,
                  position: "bottom",
                  text: "Cities Attendence",
                  font:{
                    size:18,
                  },
                  color:"brown"
                },
                legend: {
                  display: true,
                  position: "top",
                  
              }
          }
            }
          });
      }
      function renderTopPurchasedUserChart(chartData)
      {
        var colorsArray=[];
          for(var i=0;i<chartData.data.length;i++)
          {
            colorsArray.push("#"+Math.floor(Math.random()*16777215).toString(16));
          }
          var topPurchasedChart = new Chart($('#topPurchasedChart'), {
            type: "pie",
            data: {
            labels: chartData.label,
            datasets: [
              {
                label: "number of sessions",
                data: chartData.data,
                backgroundColor: colorsArray,
              }
            ]
          },
            options: {
              responsive:true,
              aspectRatio:2,
              plugins:{
                title: {
                  display: true,
                  position: "bottom",
                  text: `${"Top "+chartData.data.length+" purchased Users"}`,
                  font:{
                    size:18,
                  },
                  color:"brown"
                },
                legend: {
                  display: true,
                  position: "top",
                  
              }
          }
            }
          });
      }
    
    });
</script>
@endsection
