<?php
include('./header_footer/header.php');
$query = "select * from item_details where status=1";
$items = $db->query($query);
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
    <?php
    if ($items->num_rows > 0) {
      while($obj = $items->fetch_object()) {
    ?>
        <div class="col-md-4 mb-3">
          <div class="card">
            <a href="#">
              <img src="data:image/png;base64,<?=base64_encode($obj->image)?>" class="card-img-top" alt="Product" style="max-height: 230px;">
            </a>
            <div class="card-body px-2 pb-2 pt-1">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="h4 text-primary"><?=$obj->price?> &#8377;</p>
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
                  <a href="#" class="text-secondary"><?=$obj->name?></a>
                </strong>
              </p>
              <p class="mb-1">
                <small>
                  <a href="#" class="text-secondary"><?=$obj->description?></a>
                </small>
              </p>
              <div class="d-flex mb-3 justify-content-between">
                <?php 
                $isadmin = $_SESSION['is_admin'];
                                if($isadmin == 1) {
                            ?>
                            
                            <?php 
                                } else {
                            ?>
                            <a class="btn btn-primary col" href="./order.php?id=<?=$obj->item_id?>">Order Now</a>
                            <?php 
                                }
                            ?>
                
              </div>

            </div>
          </div>
        </div>
      <?php
      }
    } else { ?>
      No Items
    <?php } ?>
  </div>
</div>

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