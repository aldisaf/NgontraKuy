<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#include header file
$this->view('template/header');
?>
<style>
    .bg-img-1 {
        background-image: url(<?php echo base_url('assets/images/slider/1.jpg')?>);
    }
    .bg-img-2 {
        background-image: url(<?php echo base_url('assets/images/slider/2.jpg')?>);
    }
    .bg-img-3 {
        background-image: url(<?php echo base_url('assets/images/slider/3.jpg')?>);
    }
    .bg-img-4 {
        background-image: url(<?php echo base_url('assets/images/slider/4.jpg')?>);
    }
    .bg-img-5 {
        background-image: url(<?php echo base_url('assets/images/slider/5.jpg')?>);
    }
</style>
<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- Nav Starts -->
            <style>
                .nav li a{
                    font-family: 'Ubuntu', sans-serif !important;
                }
            </style>
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="<?php echo site_url()?>" >Home</a></li>
                    <li><a href="<?php echo site_url('Agents')?>">Agents</a></li>
                    <li><a href="<?php echo site_url('ContactUs')?>">Contact Us</a></li>
                    <li><a href="<?php echo site_url('About')?>">About</a></li>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="<?php echo site_url()?>"><img src="<?php echo base_url('assets/images/logo1.png')?>" width="200px" alt="NgontraKuy"></a>

        <?php if(isset($session) && $session == true){
            echo
                "
                <ul class=\"pull-right\">
                    <li>
                      <a href=\"#\" style=\"text-transform:Capitalize;font-family: 'Ubuntu', sans-serif;\" data-toggle=\"modal\" data-target=\"#TamKon\">Tambah Kontrakan</a>
                  </li>
                    <li style=\"margin-top: -10px;padding-top: 10px;padding-bottom: 10px;\">
                        <ul class='dropdown'>
                            <li>
                                <a href=\"#\" style=\"text-transform:Capitalize;font-family: 'Ubuntu', sans-serif;\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Hi, $nama! <span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\"  >
                                    <li><a href=".site_url('Profile').">Profile</a></li>
                                    <li><a href=".site_url('Inbox').">Inbox</a></li>
                                    <li><a href=".site_url('Logout').">Log out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                ";
        }else{
            echo "
                <ul class=\"pull-right\">
                    <li style=\"margin-top: 20px\"><a href=\"#\" style=\"font-family: 'Ubuntu', sans-serif;\" data-toggle=\"modal\" data-target=\"#loginpop\">Login</a></li>
                </ul>";
        } ?>
    </div>
    <!-- #Header Starts -->
</div>

<div class="">
    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-1"></div>
                    <br/>
                    <h2><a href="#"><img src="<?php echo base_url('assets/images/white.png')?>" width="250px"/></a></h2>
                    <blockquote style="font-family:'Ubuntu', sans-serif">
                        <br/><br/>
                        <p>Pengen jalan-jalan tapi nginep di hotel terlalu mahal?<br/>Mending ngontrak aja!</p><br/>
                        <a class="btn btn-success" role="button" href="<?php echo site_url('Register')?>">Join Now</a>
                    </blockquote>
                </div>
            </div>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">

        </nav>

    </div><!-- /slider-wrapper -->
</div>

<div class="banner-search">
    <div class="container">
        <!-- banner -->
        <br/>
        <h3>Book your homes here</h3>
        <div class="searchbar">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
						
					<?php
						echo form_open('TaKon/search');

						echo form_input(array('class'=>'form-control','name'=>'search','placeholder' => 'Search','id'=>'nm'));

						echo form_submit(array('id' => 'submit','value' => 'Find Now', 'class'=>'btn btn-success'));

						echo form_close();
					?>
						
                    <br/>
                </div>
                <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="properties-listing spacer">
        <h2>Kontrakan</h2>
        <div id="owl-example" class="owl-carousel">

            <?php
            foreach($results as $row){
                ?>
				<div class="properties">
					<div class="image-holder">
						<img src="<?php echo base_url('assets/images/Rumah/').$row->gambar ?>" alt="properties" style="height: 150px"/>
                        <div class="status <?php echo $row->status ?>"><?php echo $row->status ?></div>
					</div>
					<h4><a href="<?php echo site_url('HomeDetails/'.$row->idkontrakan)?>"><?php echo $row->nmkontrakan ?></a></h4>
					<div>
					<p class="price">Price: Rp<?php echo $row->harga?></p>
					<p class="price">Ukuran :<?php echo $row->ukuran?></p>
					</div>
					
					<a class="btn btn-primary" href="<?php echo site_url('HomeDetails/'.$row->idkontrakan)?>">View Details</a>
				</div>
				<?php
            }
            ?>

        </div>
		<br>
    </div>
</div>
<?php
#include footer file
$this->view('template/footer');
?>
