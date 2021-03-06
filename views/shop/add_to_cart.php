<div id="addToCartPopup" class="overlay">
 
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL.$this->product[0]['image']; ?>" id="product-img">
            <div class="gallery-row">
                    <div class="gallery-row">
                    <?php $single_images = array();
                    foreach($this->product as $single){
                        if(in_array($single['image'],$single_images)){
                            continue;
                        }else{
                            $single_images[] .= $single['image'];?>
                            <div class="gallery-col">
                        <img src="<?php echo URL.$single['image']; ?>" width="100%" class="gallery-img">
                    </div>
                            <?php
                        }
                    } ?>
                   
                </div>

            </div>
                <h2 style="margin-top: 5px;"><?php echo $this->product[0]['product_name']?> </h2>
                <h4>LKR <?php echo $this->product[0]['product_price']?></h4>
            </div>
            <div class="col-2" style="text-align: center;">
                <form action="" method="post">
                <label class="text-label">Select Color</label>
                <div class="colors">
                    <?php $single_colors = array();
                    foreach($this->product as $single){
                        if(in_array($single['colors'],$single_colors)){
                            continue;
                        }else{
                            $single_colors[] .= $single['colors'];?>
                            <label class="color-container">
                <input type="radio" name="color">
                <span class="checkmark" style="background-color: <?php echo $single['colors']?>"></span>
                </label>
                             <?php
                        }
                    } ?>
                   
                
                </div><br>
                <label class="text-label">Select Size</label>
                <div class="sizes">
                    <?php $single_sizes = array();
                    foreach($this->product as $single){
                        if(in_array($single['sizes'],$single_sizes)){
                            continue;
                        }else{
                            $single_sizes[] .= $single['sizes'];?>
                            <label class="size-container">
                <input type="radio" name="size">
                <span class="checkbox"><?php echo $single['sizes']?></span>
                </label>
                             <?php
                        }
                    } ?>
            
</div><br>
                <label class="text-label">Select Quantity</label>
                <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="1">
                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>

                <button type="submit" class="btn">Add to Cart</button>
            </form>
            </div>
        </div>
        </div>
        <div class="row">
            
    </div>
    </div>
