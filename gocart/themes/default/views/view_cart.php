<?php if ($this->go_cart->total_items()==0):?>
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo lang('empty_view_cart');?>
    </div>
<?php else: ?>
    <br>
    <br>
    <div class="text-center category-header">
      <h2>Tu carrito</h2>
    </div>    
    <br>
    <br>
    <?php echo form_open('cart/update_cart', array('id'=>'update_cart_form'));?>
    
    <?php include('checkout/summary.php');?>
    
    <div class="row">
        <!-- <div class="col-lg-5">
            <label><?php echo lang('coupon_label');?></label>
            <input type="text" name="coupon_code" class="span3" style="margin:0px;">
            <input class="span2 btn" type="submit" value="<?php echo lang('apply_coupon');?>"/>
            
            <?php if($gift_cards_enabled):?>
                <label style="margin-top:15px;"><?php echo lang('gift_card_label');?></label>
                <input type="text" name="gc_code" class="span3" style="margin:0px;">
                <input class="span2 btn"  type="submit" value="<?php echo lang('apply_gift_card');?>"/>
            <?php endif;?>
        </div> -->
        
        <div class="col-lg-12" style="text-align:right;">
                <input id="redirect_path" type="hidden" name="redirect" value=""/>
    
                <?php if(!$this->Customer_model->is_logged_in(false,false)): ?>
                    <input class="btn btn-default" type="submit" onclick="$('#redirect_path').val('checkout/login');" value="Iniciar Sesión"/>
                    <input class="btn btn-default" type="submit" onclick="$('#redirect_path').val('checkout/register');" value="Registrarse"/>
                <?php endif; ?>
                    <input class="btn btn-default" type="submit" value="<?php echo lang('form_update_cart');?>"/>
                    
            <?php if ($this->Customer_model->is_logged_in(false,false) || !$this->config->item('require_login')): ?>
                <input class="btn btn-large btn-success" type="submit" onclick="$('#redirect_path').val('checkout');" value="<?php echo lang('form_checkout');?>"/>
            <?php endif; ?>
            
        </div>
    </div>

</form>
<?php endif; ?>