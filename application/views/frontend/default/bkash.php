<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stripe | <?php echo get_settings('system_name');?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('assets/payment/css/stripe.css');?>"
            rel="stylesheet">
        <link name="favicon" type="image/x-icon" href="<?php echo base_url();?>uploads/system/favicon.png" rel="shortcut icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
<!--required for getting the stripe token-->
        <?php
            $stripe_keys = get_settings('stripe_keys');
            $values = json_decode($stripe_keys);
            if ($values[0]->testmode == 'on') {
                $public_key = $values[0]->public_key;
                $private_key = $values[0]->secret_key;
            } else {
                $public_key = $values[0]->public_live_key;
                $private_key = $values[0]->secret_live_key;
            }
        ?>

        <script>
            var stripe_key = '<?php echo $public_key;?>';
        </script>

<!--required for getting the stripe token-->

<div class="container">
    <form action="bkash_success" method="post">
    <div class="row">
    <div class="col-md-4">
    <label for="Number" class="float-right">Phone Number</label>    
        </div>
        <div class="col-md-8">
        <input class="form-control" type="text" name="Number">
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
        <label for="Number" class="float-right">Ammount</label>    
        </div>

        <div class="col-md-8">
        <input type="text" class="form-control" value="<?php echo $amount_to_pay;?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <label for="Number" class="float-right">TRX Number</label>    
        </div>

        <div class="col-md-8">
        <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <input type="submit" class="btn btn-primary float-right" value="Submit">
</div>
        <div class="col-md-6">
        </div>
    </div>
 
    </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <img src="https://stripe.com/img/about/logos/logos/blue.png" width="25%;" style="opacity: 0.05;">
        <script src="https://js.stripe.com/v3/"></script>
        <script src="<?php echo base_url('assets/payment/js/stripe.js');?>"></script>

        <script type="text/javascript">
            get_stripe_currency('<?php echo get_settings('stripe_currency'); ?>');
        </script>

    </body>
</html>
