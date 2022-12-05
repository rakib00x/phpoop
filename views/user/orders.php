<?php include (ROOT."/views/layouts/header.php"); ?>
 <main>
      <div class="container">
         <?php if (!empty($orders)):?>
             <div class="row">
                 <section id="cart_items">
                     <div class="container">
                         <div class="table-responsive cart_info">
                             <table class="table table-condensed">
                                 <thead>
                                    <tr class="cart_menu">
                                       <td class="orders-history-heading">
                                          <?php echo $this->langpack["account"]["orders_page"]["order_no"]?>
                                       </td>
                                       <td class="orders-history-heading">
                                          <?php echo $this->langpack["account"]["orders_page"]["products"]?>
                                       </td>
                                       <td class="orders-history-heading">
                                          <?php echo $this->langpack["account"]["orders_page"]["pay_status"]?>
                                       </td>
                                       <td class="orders-history-heading">
                                          <?php echo $this->langpack["account"]["orders_page"]["order_date"]?>
                                       </td>
                                       <td class="orders-history-heading">
                                          <?php echo $this->langpack['account']['orders_page']["complete_date"]?>  
                                       </td>
                                       <td class="orders-history-heading">სტატუსი</td>
                                     </tr>
                                 </thead>
                                 <tbody class="orders-row">
                                 <?php foreach ($orders as $orderItem): ?>
                                    <tr>
                                       <td>
                                         <?php echo $orderItem["id"];?>
                                       </td>
                                       <td id="orders-prods-td">
                                         <ol>
                                            <?php foreach ($orderItem["products"] as $product): ?>
                                               <li>
                                                <?php echo $product["name"]." - {$product["price"]} ₾"?>
                                                   <span>(<?php echo $product["quantity"]?>)</span>
                                                </li>
                                               <br>
                                             <?php endforeach;?>
                                             <div>
                                                <strong>
                                                <?php echo $this->langpack['account']['orders_page']["total"]?>:&nbsp;
                                                </strong>
                                                <span><?php echo $orderItem["total_price"]?>&nbsp;₾</span>
                                             </div>
                                         </ol>
                                       </td>
                                       <td>
                                             <!---
                                          payment_status==0 not payed
                                          payment_status==1 payed
                                          -->
                                          <?php if ($orderItem["payment_status"]==0):?>
                                             <span class="stat-false">
                                                <?php echo $this->langpack['account']['orders_page']["pay_false"]?>
                                             </span>
                                          <?php else: ?>
                                             <span class="stat-true">
                                             <?php echo $this->langpack['account']['orders_page']["pay_true"]?>
                                             </span>
                                          <?php endif;?>
                                       </td>
                                       <td>
                                          <i class="fa fa-calendar"></i>
                                          <span><?php echo date("d/m/Y", $orderItem["order_time"])?></span>
                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                          <span><?php echo date("H:i", $orderItem["order_time"])?></span>
                                       </td>
                                       <td>
                                          <?php if($orderItem["delivery_time"]!==null):?>
                                          <i class="fa fa-calendar"></i>
                                          <span><?php echo date("d/m/Y", $orderItem["delivery_time"])?></span>
                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                          <span><?php echo date("H:i", $orderItem["delivery_time"])?></span>
                                          <?php else: ?>
                                          <span>-</span>
                                          <?php endif; ?>
                                       </td>
                                       <td>
                                          <!---
                                          status==0 waiting for client's payment
                                          status==1 order is payed. Client is wainting for delivery
                                          status==2 everything is completed
                                          -->
                                          <?php if($orderItem["status"]==0):?>
                                          <span class="stat-wait">
                                             <?php echo $this->langpack['account']['orders_page']["stat_wait"];?>
                                          </span>
                                          <?php elseif($orderItem["status"]==1):?>
                                          <span class="stat-progr">
                                             <?php echo $this->langpack['account']['orders_page']["stat_progr"];?>
                                          </span>
                                          <?php elseif($orderItem["status"]==2): ?>
                                          <span class="stat-true">
                                             <?php echo $this->langpack['account']['orders_page']["stat_complete"];?>
                                          </span>
                                          <?php endif; ?>
                                       </td>
                                    </tr>
                                 <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </section> <!--/#cart_items-->
             </div>
              <?php else: ?>
               <div class="row">
                  <div class="col-md-5 col-md-offset-4">
                     <div class="alert alert-warning">
                        <?php echo $this->langpack['account']['orders_page']["no_order"];?>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
      </div>
</main>
<?php include (ROOT."/views/layouts/footer.php"); ?>