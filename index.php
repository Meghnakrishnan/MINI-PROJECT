<?php 
include('./header_footer/header.php');
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./images/banner1.jpg" alt="First slide" style="height: 60vh;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/banner1.jpg" alt="First slide" style="height: 60vh;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/banner1.jpg" alt="First slide" style="height: 60vh;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container pt-5">
  <div class="row align-items-center justify-content-between" style="display: none;">

    <div class="col-lg-2 col-md-3 col-sm-4 col-7">
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">42 Items</span>
        </div>
        <select name="" class="form-control form-control-sm">
          <option value="">12</option>
          <option value="">24</option>
          <option value="">48</option>
        </select> 
      </div>
    </div>
    


    <div class="col-md-3 order-md-0 mt-2 mt-md-0">
      <select class="form-control form-control-sm">
        <option value="">Sort By</option>
        <option value="">Popylar</option>
        <option value="">Name</option>
      </select>  
    </div>
    
  </div>
</div>

<div class="container">
  <hr />
</div>

<div class="container">
  <div class="row">

    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <div class="d-flex justify-content-between position-absolute w-100">
          <!-- <div class="label-new">
            <span class="text-white bg-success small d-flex align-items-center px-2 py-1">
              <i class="fa fa-star" aria-hidden="true"></i>
              <span class="ml-1">New</span>
            </span>
          </div> -->
          <!-- <div class="label-sale">
            <span class="text-white bg-primary small d-flex align-items-center px-2 py-1">
              <i class="fa fa-tag" aria-hidden="true"></i>
              <span class="ml-1">Sale</span>
            </span>
          </div> -->
        </div>
        <a href="#">
          <img src="./images/pexels-abhinav-goswami-291528.jpg" class="card-img-top" alt="Product" style="max-height: 230px;">
        </a>
        <div class="card-body px-2 pb-2 pt-1">
          <div class="d-flex justify-content-between">
            <div>
              <p class="h4 text-primary">400 Rs</p>
            </div>
            <div>
              <!-- <a href="#" class="text-secondary lead" data-toggle="tooltip" data-placement="left" title="Compare">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
              </a> -->
            </div>
          </div>
          <p class="text-warning d-flex align-items-center mb-2">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </p>
          <p class="mb-0">
            <strong>
              <a href="#" class="text-secondary">Chocolate cake</a>
            </strong>
          </p>
         
          <div class="d-flex mb-3 justify-content-between">
            
            <div class="text-right">
              <p class="mb-0 small"><b>Free Shipping</b></p>
             
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <!-- <div class="col px-0">
              <button class="btn btn-outline-primary btn-block">
                Add To Cart 
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              </button>
            </div> -->
            <!-- <div class="ml-2">
              <a href="#" class="btn btn-outline-success" data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <div class="d-flex justify-content-between position-absolute w-100">
          <!-- <div class="label-new">
            <span class="text-white bg-success small d-flex align-items-center px-2 py-1">
              <i class="fa fa-star" aria-hidden="true"></i>
              <span class="ml-1">New</span>
            </span>
          </div> -->
          <!-- <div class="label-sale">
            <span class="text-white bg-primary small d-flex align-items-center px-2 py-1">
              <i class="fa fa-tag" aria-hidden="true"></i>
              <span class="ml-1">Sale</span>
            </span>
          </div> -->
        </div>
        <a href="#">
          <img src="./images/pexels-daria-shevtsova-1070850.jpg" class="card-img-top" alt="Product" style="max-height: 230px;">
        </a>
        <div class="card-body px-2 pb-2 pt-1">
          <div class="d-flex justify-content-between">
            <div>
              <p class="h4 text-primary">500 Rs</p>
            </div>
            <div>
              <!-- <a href="#" class="text-secondary lead" data-toggle="tooltip" data-placement="left" title="Compare">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
              </a> -->
            </div>
          </div>
          <p class="text-warning d-flex align-items-center mb-2">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </p>
          <p class="mb-0">
            <strong>
              <a href="#" class="text-secondary">White forest cake</a>
            </strong>
          </p>
         
          <div class="d-flex mb-3 justify-content-between">
            
            <div class="text-right">
              <p class="mb-0 small"><b>Free Shipping</b></p>
             
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <!-- <div class="col px-0">
              <button class="btn btn-outline-primary btn-block">
                Add To Cart 
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              </button>
            </div> -->
            <!-- <div class="ml-2">
              <a href="#" class="btn btn-outline-success" data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <div class="d-flex justify-content-between position-absolute w-100">
          <!-- <div class="label-new">
            <span class="text-white bg-success small d-flex align-items-center px-2 py-1">
              <i class="fa fa-star" aria-hidden="true"></i>
              <span class="ml-1">New</span>
            </span>
          </div> -->
          <!-- <div class="label-sale">
            <span class="text-white bg-primary small d-flex align-items-center px-2 py-1">
              <i class="fa fa-tag" aria-hidden="true"></i>
              <span class="ml-1">Sale</span>
            </span>
          </div> -->
        </div>
        <a href="#">
          <img src="./images/pexels-vojtech-okenka-1055272.jpg" class="card-img-top" alt="Product" style="max-height: 230px;">
        </a>
        <div class="card-body px-2 pb-2 pt-1">
          <div class="d-flex justify-content-between">
            <div>
              <p class="h4 text-primary">300 Rs</p>
            </div>
            <div>
              <!-- <a href="#" class="text-secondary lead" data-toggle="tooltip" data-placement="left" title="Compare">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
              </a> -->
            </div>
          </div>
          <p class="text-warning d-flex align-items-center mb-2">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </p>
          <p class="mb-0">
            <strong>
              <a href="#" class="text-secondary">Cup cake</a>
            </strong>
          </p>
         
          <div class="d-flex mb-3 justify-content-between">
            
            <div class="text-right">
              <p class="mb-0 small"><b>Free Shipping</b></p>
             
            </div>
          </div>
           <!--<div class="d-flex justify-content-between">
            <div class="col px-0">
              <button class="btn btn-outline-primary btn-block">
                Add To Cart 
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              </button>
            </div>
            <div class="ml-2">
              <a href="#" class="btn btn-outline-success" data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </a>
            </div> 
          </div>-->
        </div>
      </div>
    </div>

    

  </div>
</div>


<

<div class="container pb-5">
  <div class="row align-items-center justify-content-between">

    <div class="col-lg-2 col-md-3 col-sm-4 col-7" style="display: none;">
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">42 Items</span>
        </div>
        <select name="" class="form-control form-control-sm">
          <option value="">12</option>
          <option value="">24</option>
          <option value="">48</option>
        </select> 
      </div>
    </div>
    
    <!-- <div class="col-5 text-right">
        <a href="#" class="btn btn-primary grid-view btn-sm">
          <i class="fa fa-th-large"></i>
        </a>
        <a href="#" class="btn btn-primary list-view btn-sm">
          <i class="fa fa-bars"></i>
        </a>
    </div> -->
    
  </div>
</div>
<?php 
include('./header_footer/footer.php');
?>