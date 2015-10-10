<?php $this->load->view('intro'); ?>
<script>
    window.onload = function()
    {
        $('.product').equalHeights();
    }
</script>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-6">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $photo  = theme_img('no_picture.png', lang('no_image_available'));
                        $product->images    = array_values($product->images);

                        if(!empty($product->images[0]))
                        {
                            $primary    = $product->images[0];
                            foreach($product->images as $photo)
                            {
                                if(isset($photo->primary))
                                {
                                    $primary    = $photo;
                                }
                            }

                            $photo  = '<img class="responsiveImage" src="'.base_url('uploads/images/medium/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
                        }
                        echo $photo
                        ?>
                    </div>
                </div>
                 <?php if(!empty($primary->caption)):?>
                 <div class="row">
                    <div class="col-lg-12 text-center" id="product_caption">
                        <?php echo $primary->caption;?>
                    </div>
                </div>
                <?php endif;?>
                <?php if(count($product->images) > 1):?>
                <div class="row">
                    <div class="col-lg-4 product-images">
                        <?php foreach($product->images as $image):?>
                        <img class="col-lg-1" onclick="$(this).squard('390', $('#primary-img'));" src="<?php echo base_url('uploads/images/medium/'.$image->filename);?>"/>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endif;?>
                <?php if(!empty($product->related_products)):?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="font">Productos relacionados</h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php foreach($product->related_products as $relate):?>
                        <div class="col-lg-4">
                            <?php
                            $photo  = theme_img('no_picture.png', lang('no_image_available'));
                            
                            
                            
                            $relate->images = array_values((array)json_decode($relate->images));
                            
                            if(!empty($relate->images[0]))
                            {
                                $primary    = $relate->images[0];
                                foreach($relate->images as $photo)
                                {
                                    if(isset($photo->primary))
                                    {
                                        $primary    = $photo;
                                    }
                                }

                                $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$relate->seo_title.'"/>';
                            }
                            ?>
                            <a class="thumbnail" href="<?php echo site_url($relate->slug); ?>">
                                <?php echo $photo; ?>
                            </a>
                            <h5 style="margin-top:5px;"><a href="<?php echo site_url($relate->slug); ?>"><?php echo $relate->name;?></a>
                            <?php if($this->session->userdata('admin')): ?>
                            <a class="btn" title="<?php echo lang('edit_product'); ?>" href="<?php echo  site_url($this->config->item('admin_folder').'/products/form/'.$relate->id); ?>"><i class="icon-pencil"></i></a>
                            <?php endif; ?>
                            </h5>
                            <div>
                                <!-- <?php if($relate->saleprice > 0):?>
                                    <span class="price-slash"><?php echo lang('product_reg');?> <?php echo format_currency($relate->price); ?></span>
                                    <span class="price-sale"><?php echo lang('product_sale');?> <?php echo format_currency($relate->saleprice); ?></span>
                                <?php else: ?>
                                    <span class="price-reg"><?php echo lang('product_price');?> <?php echo format_currency($relate->price); ?></span>
                                <?php endif; ?> -->
                            </div>
                            <?php if((bool)$relate->track_stock && $relate->quantity < 1 && config_item('inventory_enabled')) { ?>
                                <div class="stock_msg"><?php echo lang('out_of_stock');?></div>
                            <?php } ?>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="font-weight font"><?php echo $product->name;?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($product->saleprice > 0):?>
                            <h3 class="font">
                                <span class="product_price"><?php echo format_currency($product->saleprice); ?></span>
                                <small>¡De Oferta!</small>
                            </h3>
                        <?php else: ?>
                            <!-- <small><?php echo lang('product_price');?></small>
                            <span class="product_price font"><h3><?php echo format_currency($product->price); ?></h3></span> -->
                        <?php endif;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 text-justify">
                        <?php echo $product->description; ?>
                        <?php echo form_open('cart/add_to_cart');?>
                        <!-- Options -->
                        <?php if(count($options) > 0): ?>
                            <?php foreach($options as $option):
                            $required   = '';
                            if($option->required)
                            {
                                // $required = ' <p class="help-block">Required</p>';
                            }
                            ?>
                            <div class="control-group">
                                <h3 style="font-weight:200"><?php echo $option->name;?></h3>
                                <hr>
                                <?php
                                    /*
                                    this is where we generate the options and either use default values, or previously posted variables
                                    that we either returned for errors, or in some other releases of Go Cart the user may be editing
                                    and entry in their cart.
                                    */

                                    //if we're dealing with a textfield or text area, grab the option value and store it in value
                                    if($option->type == 'checklist')
                                    {
                                        $value  = array();
                                        if($posted_options && isset($posted_options[$option->id]))
                                        {
                                            $value  = $posted_options[$option->id];
                                        }
                                    }
                                    else
                                    {
                                        if(isset($option->values[0]))
                                        {
                                            $value  = $option->values[0]->value;
                                            if($posted_options && isset($posted_options[$option->id]))
                                            {
                                                $value  = $posted_options[$option->id];
                                            }
                                        }
                                        else
                                        {
                                            $value = false;
                                        }
                                    }

                                    if($option->type == 'textfield'):?>
                                        <div class="controls">
                                            <input type="text" name="option[<?php echo $option->id;?>]" value="<?php echo $value;?>" class="col-lg-4"/>
                                            <?php echo $required;?>
                                        </div>
                                    <?php elseif($option->type == 'textarea'):?>
                                        <div class="controls">
                                            <textarea class="col-lg-4" name="option[<?php echo $option->id;?>]"><?php echo $value;?></textarea>
                                            <?php echo $required;?>
                                        </div>
                                    <?php elseif($option->type == 'droplist'):?>
                                        <div class="controls">
                                            <select name="option[<?php echo $option->id;?>]">
                                                <option value=""><?php echo lang('choose_option');?></option>

                                            <?php foreach ($option->values as $values):
                                                $selected   = '';
                                                if($value == $values->id)
                                                {
                                                    $selected   = ' selected="selected"';
                                                }?>

                                                <option<?php echo $selected;?> value="<?php echo $values->id;?>">
                                                    <?php echo($values->price != 0)?' (+'.format_currency($values->price).') ':''; echo $values->name;?>
                                                </option>

                                            <?php endforeach;?>
                                            </select>
                                            <?php echo $required;?>
                                        </div>
                                    <?php elseif($option->type == 'radiolist'):?>
                                        <div class="controls">
                                            <?php foreach ($option->values as $values):

                                                $checked = '';
                                                if($value == $values->id)
                                                {
                                                    $checked = ' checked="checked"';
                                                }?>
                                                <label class="radio">
                                                    <input<?php echo $checked;?> type="radio" name="option[<?php echo $option->id;?>]" value="<?php echo $values->id;?>"/>
                                                    <?php echo '<p style="font-weight:200; font-size:16px;">'; echo '<span style="color:#ff9500">'.$values->name . '</span> - ';  echo($values->price != 0)?''.format_currency($values->price).'':''; echo '</p>'?>
                                                </label>
                                            <?php endforeach;?>
                                            <?php echo $required;?>
                                        </div>
                                    <?php elseif($option->type == 'checklist'):?>
                                        <div class="controls">
                                            <?php foreach ($option->values as $values):

                                                $checked = '';
                                                if(in_array($values->id, $value))
                                                {
                                                    $checked = ' checked="checked"';
                                                }?>
                                                <label class="checkbox">
                                                    <input<?php echo $checked;?> type="checkbox" name="option[<?php echo $option->id;?>][]" value="<?php echo $values->id;?>"/>
                                                    <?php echo($values->price != 0)?'('.format_currency($values->price).') ':''; echo $values->name;?>
                                                </label>
                                                
                                            <?php endforeach; ?>
                                        </div>
                                        <?php echo $required;?>
                                    <?php endif;?>
                                    </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                            <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey');?>" />
                            <input type="hidden" name="id" value="<?php echo $product->id?>"/>
                            <?php if(!config_item('inventory_enabled') || config_item('allow_os_purchase') || !(bool)$product->track_stock || $product->quantity > 0) : ?>
                                <div class="form-group">
                                    <?php if(!$product->fixed_quantity) : ?>
                                        <label for="exampleInputEmail1">Cantidad</label>
                                        <input class="form-control" type="number" name="quantity" value="1" placeholder=""/>
                                    <?php endif ?>
                                </div>
                                <button style="width:100%;" type="submit" class="btn btn-success" value="submit"><i class="fa fa-shopping-cart"></i> Agregar a carrito</button>
                            <?php endif;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){ 
    $('.category_container').each(function(){
        $(this).children().equalHeights();
    }); 
});
</script>
