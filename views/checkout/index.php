<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Checkout</h2><br>
    </div>
    <div class="row-top">
    <div class="col-2">
        <div class="form-container" >
            <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user['nic'] ?>" id="editFrom" method="post">
                        <div class="row">
                            <h3 class="mar-b-20">Shipping Details</h3>
                        </div>
                        <div class="row-top">
                            <div class="col-2 pad-l-55">
                            <label>First Name : </label><br><input type="text" name="first_name" value=""><br>
                            <label>Address Line 1 : </label><br><input type="text" name="address_line_1" value=""><br>
                            <label>Address Line 3 : </label><br><input type="text" name="address_line_3" value=""><br>
                            <label>Postal Code : </label><br><input type="text" name="postal_code" value=""><br>
                            <label>Location : </label><br><div id="map" name="location"></div><br>
                        </div>
                        <div class="col-2 pad-l-55" >
                            <label>Last Name : </label><br><input type="text" name="last_name" value=""><br>
                        
                        <label>Address Line 2 : </label><br><input type="email" name="address_line_2" value=""><br>
                        
                        <label>City : </label><br><input type="text" name="city" value=""><br>
                        
                        <label>Contact Number : </label><br><input type="text" name="contact_no" value=""><br>
                        <label>Delivery Comments : </label><br><textarea rows = "5" cols = "22" name = "delivery_comments">
         </textarea><br>
                        </div>
                    </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Continue</button>
                            <a href="<?php echo URL ?>user" class="btn btn-grey">Return</a>
                        </div>
                    </form>

                    </div>
    
</div>
<div class="col-2">
                <h3 class="mar-t-40">Summary</h3>
    <div class="price-sum">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>LKR 2400.00</td>
            </tr>
            <tr>
                <td>Delivery chargers</td>
                <td>LKR 2400.00</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td>LKR 2400.00</td>
            </tr>
        </table>
    </div>
    </div>
    </div>
</div>

 

 <script type="text/javascript">
     let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

 </script>

<?php require 'views/footer.php'; ?>