<?php
  require_once 'connect.php';
  $max_date = $_GET['days'];
  $sql = "SELECT
    users.id as 'user_id',
    users.name as 'user_name',
    DATE_FORMAT(tin.created_at, '%e-%m') as 'ngay', 
    COUNT(*) as 'so_tin_dang'
  FROM `tin`
  JOIN users ON tin.id = users.id
  WHERE tin.created_at >= CURDATE() - INTERVAL $max_date DAY
  GROUP BY users.id, DATE_FORMAT(tin.created_at, '%e-%m')";
  
  $result = mysqli_query($conn, $sql);
  
  $arr = [];
  $today = date('d');
  
  if ($today < $max_date) {
    $get_day_last_month = $max_date - $today;
    $last_month = date('m' , strtotime("-1 month"));
    $last_month_date = date('Y-m-d',strtotime("-1 month"));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_day_last_month;
    $start_date_this_month = 1;
  } else {
    $start_date_this_month = $today - $max_date;
  }
  
  foreach($result as $each) {
    $user_id = $each['user_id'];
    if(empty($arr[$user_id])){
      $arr[$user_id] = [
        'name' => $each['user_name'],
        'y' => $each['so_tin_dang'],
        'drilldown' => (int)$user_id,
      ];
    } else {
      $arr[$user_id]['y'] += $each['so_tin_dang'];
    }
  }
  
  $arr2 = [];
  
  foreach ($arr as $user_id => $each) {
    $arr2[$user_id] = [
      'name' => $each['name'],
      'id' => $user_id,
    ];
    $arr2[$user_id]['data'] = [];
  
    if ($today < $max_date) {
      for ($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
        $key = $i . '-' . $last_month;
        $arr2[$user_id]['data'][$key] = [
          $key,
          0,
        ];
      }
    }
  }
  
  foreach ($result as $each) {
    $user_id = $each['user_id'];
    $key = $each['ngay'];
    $arr2[$user_id]['data'][$key] = [
      $key,
      (int)$each['so_tin_dang'],
    ];
  }
  
  $object =  json_encode([$arr, $arr2]);
  echo $object;  
?>