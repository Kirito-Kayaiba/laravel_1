@extends('Admin.index')
@section('content')
<main>
  <div class="head-title">
    <div class="left">
      <h1>Admin</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Admin</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="#">Trang Chủ</a>
        </li>
      </ul>
    </div>
    <a href="#" class="btn-download">
      <i class='bx bxs-cloud-download'></i>
      <span class="text">Download PDF</span>
    </a>
  </div>

  <ul class="box-info">
    <li>
      <i class='bx bxs-calendar-check'></i>
      <span class="text">
        <h3>{{$tongbaiviet}}</h3>
        <p>Tổng Bài Viết</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-group'></i>
      <span class="text">
        <h3>{{$tongnguoidung}}</h3>
        <p>Tổng Người Dùng</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-dollar-circle'></i>
      <span class="text">
        <h3>2.543.000đ</h3>
        <p>Số Tiền Kiếm Được</p>
      </span>
    </li>
  </ul>
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Yêu Cầu Xác Minh</h3>
        <i class='bx bx-search'></i>
        <i class='bx bx-filter'></i>
      </div>
      <table>
        <thead>
          <tr>
            <th>Tài Khoản</th>
            <th>Ngày Tạo Tài Khoản</th>
            <th>Số Lượng Bài Viết</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach($yeucau as $yc)
          <tr>
            <td>
              <img src="{{$yc->avatar}}" alt="">
              <!-- tên nếu muốn xuất ra có dùng html thì nhớ thêm !! -->
              @if($yc->veryfi == 1)
              <p>{{$yc->name}} <i class="fa-solid fa-circle-check" style="color: #3C91E6"></i></p>
              @else
              <p>{{$yc->name}}</p>
              @endif
            </td>
            <td>{{$yc->created_at}}</td>
            @php
            $tongbaiviet = \DB::table('tin')->where('id_user', $yc->id)->count();
            @endphp
            @if ($tongbaiviet >= 2)
            <td><span class="status completed">{{$tongbaiviet}}</span></td>
            @elseif($tongbaiviet < 2 && $tongbaiviet>=1)
              <td><span class="status pending">{{$tongbaiviet}}</span></td>
              @else
              <td><span class="status process">{{$tongbaiviet}}</span></td>
              @endif
              <td>
                <a href="/admin/trangchu/xacminh{{$yc->id}}" class="btn btn-primary">Chấp Nhận</a>
                <a href="/admin/trangchu/xoa{{$yc->id}}" class="btn btn-danger">Xóa</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="todo">
      <div class="head">
        <h3>Todos</h3>
        <i class='bx bx-plus'></i>
        <i class='bx bx-filter'></i>
      </div>
      <ul class="todo-list">
        <li class="completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="not-completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="not-completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
      </ul>
    </div>
  </div>
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Đăng Ký Cộng Tác Viên</h3>
        <i class='bx bx-search'></i>
        <i class='bx bx-filter'></i>
      </div>
      <table>
        <thead>
          <tr>
            <th>Tài Khoản</th>
            <th>Ngày Tạo Tài Khoản</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dangky as $yc)
          <tr>
            <td>
              <img src="{{$yc->avatar}}" alt="">
              <!-- tên nếu muốn xuất ra có dùng html thì nhớ thêm !! -->
              @if($yc->veryfi == 1)
              <p>{{$yc->name}} <i class="fa-solid fa-circle-check" style="color: #3C91E6"></i></p>
              @else
              <p>{{$yc->name}}</p>
              @endif
            </td>
            <td>{{$yc->created_at}}</td>
            <td>
              <a href="/admin/trangchu/dangky{{$yc->id}}" class="btn btn-primary">Chấp Nhận</a>
              <a href="/admin/trangchu/huydangky{{$yc->id}}" class="btn btn-danger">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="todo">
      <div class="head">
        <h3>Todos</h3>
        <i class='bx bx-plus'></i>
        <i class='bx bx-filter'></i>
      </div>
      <ul class="todo-list">
        <li class="completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="not-completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
        <li class="not-completed">
          <p>Todo List</p>
          <i class='bx bx-dots-vertical-rounded'></i>
        </li>
      </ul>
    </div>
  </div>
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Biểu Đồ</h3>
        Thống Kê Loại Tin Theo Danh Mục
      </div>
      <div id="piechart" style="width: 900px; height: 500px;"></div>
      <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
        $con=mysqli_connect("localhost","root","","myshop");
        $select = "select * from `loaitin` ";
        $result = mysqli_query($con, $select);
        if($result){
          while($row = mysqli_fetch_assoc($result)){
            $idLT=$row['idLT'];
            $ten=$row['ten'];
            $count = "select * from `tin` where idLT = '$idLT' ";
            $result1 = mysqli_query($con, $count);
            $row1 = mysqli_num_rows($result1);
            ?>['<?php echo $ten ?>', <?php echo $row1 ?>],
          <?php } ?>
          <?php 
    } ?>
        ]);
        var options = {
          title: '',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      </script>
    </div>
  </div>
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Biểu Đồ</h3>
        Thống Kê Tổng Bài Viết Của Các Tài Khoản Trong 30 Ngày
      </div>
      <figure class="highcharts-figure">
        <div id="container"></div>
      </figure>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/data.js"></script>
      <script src="https://code.highcharts.com/modules/drilldown.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>
      <script>
      $(document).ready(function() {
        const days = 30;
        $.ajax({
            url: 'bieudobaiviet/getdata',
            dataType: 'json',
            data: {
              days
            },
          })
          .done(function(response) {
            const arr = Object.values(response[0]);
            for (var i = 0; i < arr.length; i++) {
              arr[i].y = parseFloat(arr[i].y);
            }
            const arrayDetail = [];
            Object.values(response[1]).forEach((each) => {
              each.data = Object.values(each.data);
              arrayDetail.push(each);
            })
            console.log(response);
            setTimeout(function() {
              getChart(days, arr, arrayDetail), 1000
            });
          });
          
      });

      function getChart(days, arr, arrayDetail) {
        Highcharts.chart('container', {
          chart: {
            type: 'column'
          },
          title: {
            align: 'center',
            text: 'Thống Kê Doanh Thu trong_' + days+'_ngày',
          },
          subtitle: {
            align: 'left',
          },
          accessibility: {
            announceNewData: {
              enabled: true
            }
          },
          xAxis: {
            type: 'category',
          },
          yAxis: {
            title: {
              text: 'Tổng Bài Viết'
            }

          },
          legend: {
            enabled: false
          },
          plotOptions: {
            series: {
              borderWidth: 0,
              dataLabels: {
                enabled: true,
                format: '{point.y:.f}VNĐ'
              }
            }
          },

          tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b>VNĐ<br/>'
          },

          series: [{
            name: "Tên người dùng",
            colorByPoint: true,
            data: arr
          }],
          drilldown: {
            series: arrayDetail
          }
        });
      }
      </script>
    </div>
  </div>
  </div>
</main>
@endsection