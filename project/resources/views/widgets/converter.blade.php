<!--Converter-->
      <div class="clearfix"></div>
      <div class="container margin-top-20 ">
         <div class="row-fluid bg-dark-green">
            <div id="converter">
               <table>
                  <tr>
                     <td>
                        <div id="baseWrap" class="foreignSister"  >
                        <div class="hidden-xs" style="color:#fff;font-size: 26px;padding: 20px 0;font-family: 'Fregat'">{{Lang::get('main.convert_from')}}</div>
                           <select name="baseC" class="baseC" >
                              @include('currencies.from')
                           </select>
                           <input type="text" name="amount" class="amountC form-control" value="" />
                        </div>
                     </td>
                     <td><img  src="/images/divider.png" alt="divider"/></td>
                     <td>
                        <div id="foreignWrap" class="foreignSister "  >
                        <div class="hidden-xs" style="color:#fff;font-size: 26px;padding: 20px 0;font-family: 'Fregat'">{{Lang::get('main.convert_to')}}</div>
                           <select name="baseC" class="foreignC" >
                           @include('currencies.to')
                           </select>
                           <input type="text" name="amount" class="amountF form-control" value="" />
                        </div>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>