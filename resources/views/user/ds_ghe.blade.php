 $tong_so_ghe = loai_xe_model:: lay_so_ghe_theo_ma_xe($ma_xe);
 $tong_so_ghe = $tong_so_ghe[0]->so_ghe;
 for ($x = 1; $x <= $tong_so_ghe; $x++) { 
     echo ("$x"); 
    } 
    $arr_ma_ghe=array_fill(0, $tong_so_ghe, $x); 
    dd($arr_ma_ghe); 
    $arr_ma_ghe=array(); 
    <div class="col-md-4" style="float: right; padding-bottom: 5%;">
     <div class="card-title">
         <h4 class="card-title">Chọn ghế</h4>
     </div>

     <div class="row">
         @foreach($arr_ghe as $each)
         <div class="col-md-4">

             <div class="thumbnail">
                 <div class=""></div>
                 <table>
                     <tr>
                         <td>
                             <div style="width: 23px; height: 50px; border-radius: 5px; border: 1px solid orange; background-color: wheat;">
                                 <center>
                                     <input type="checkbox" name="ghe[]" id="{{$each->ma_ghe}}" value="{{$each->ma_ghe}}">
                                     {{$each->ma_ghe}}
                                 </center>
                             </div>
                         </td>
                     </tr>
                 </table>

             </div>
         </div>
         @endforeach
     </div>
     </div>