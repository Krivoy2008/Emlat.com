 <div class=" container margin-top-20" style="position: relative" >
 <div class="row-fluid" id="banner">

         <img class="img-responsive hidden-xs" style="position: absolute;bottom: 0;left: 0" src="/images/arabian.png" alt=""/>
         <img class="img-responsive visible-xs-block" style="position: absolute;bottom: 0;left: 0" src="/images/mobile_arabian.jpg" alt=""/>
         <div class="container" style="margin-top: 20px">
            <h2 class="row col-sm-offset-0 col-md-offset-2 col-xs-offset-2" >{{Lang::get('main.profit1')}}</h2>
            <h3 class="row col-sm-offset-0 col-md-offset-2  col-xs-offset-2">{{Lang::get('main.profit2')}}</h3>
         </div>
         <div class="row margin-top-40" >
         <div class="container">
            <div class="col-md-offset-3  col-md-3 col-sm-3 col-sm-offset-3" >
               <form action="" id="profit" >
                  <input id="banner-input" class=" form-control light-grey" value="" placeholder="{{Lang::get('main.placeholder')}}" type="text">
                  <input class="hidden-xs" type="submit" value="{{Lang::get('main.button')}}">
               </form>
            </div>
            <div id="quater" class="col-md-6 col-sm-6">
               <table>
                  <tr>
                     <td>{{Lang::get('main.quarter1')}}<span class="price">$10,000</span></td>
                     <td>{{Lang::get('main.quarter2')}}<span class="price">$10,000</span></td>
                  </tr>
                  <tr>
                     <td>{{Lang::get('main.quarter3')}}<span class="price">$10,000</span></td>
                     <td>{{Lang::get('main.quarter4')}}<span class="price">$10,000</span></td>
                  </tr>
                  <tr >
                     <td  style="border-top:1px solid #565755!important; "  colspan="2">{{Lang::get('main.total')}}<span style="padding-left:10px;" class="price">$10,000</span>
                        <input class="visible-xs-block" style="margin-top: 5px" type="submit" value="{{Lang::get('main.button')}}" for="#profit">
                     </td>
                  </tr>
               </table>
            </div>
            </div>
         </div>

     </div>
      </div>