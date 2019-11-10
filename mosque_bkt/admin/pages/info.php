<?php

require 'act/countmes.php';

?>
<div class="row">
    <div class="col-lg-5 col-xs-12">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $data['masjid'] ?></h3>
          <p><span>Mosque</span></p>
        </div>
        <div class="icon">
          <i class="fa fa-tag"></i>
        </div>
      </div>
    </div>
	<div class="col-lg-5 col-xs-12">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $data['mushalla'];?></h3>
          <p><span>Mushalla</span></p>
        </div>
        <div class="icon">
          <i class="fa fa-tag"></i>
        </div>
      </div>
    </div>
  </div>