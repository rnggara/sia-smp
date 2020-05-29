<?php $catSetting = $identitas->result()[0]; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
          	<div class="col-xs-12">
          		<div class="x_panel">
          			<div class="x_title">
          				<h2><?= strtoupper($title) ?></h2>
          				<div class="clearfix"></div>
          			</div>
          		</div>
          	</div>
              
            </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-6 col-xs-12">
					<div class="x_panel">
				      <div class="x_title">
				        <h2>Identitas Sekolah</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

				          <div class="form-group">
				            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sekolah <span class="required">*</span>
				            </label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $catSetting->nama ?>">
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat Sekolah <span class="required">*</span>
				            </label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <textarea type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"><?php echo $catSetting->alamat ?></textarea>
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $catSetting->kecamatan ?>">
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $catSetting->kota ?>">
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $catSetting->provinsi ?>">
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Pos</label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $catSetting->kode_pos ?>">
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $catSetting->website ?>">
				            </div>
				          </div>
				          <div class="ln_solid"></div>
				          <div class="form-group">
				            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				              <button type="submit" class="btn btn-success">Update</button>
				            </div>
				          </div>

				        </form>
				      </div>
				    </div>
				</div>

				<div class="col-md-6 col-xs-12">
					<div class="x_panel">
				      <div class="x_title">
				        <h2>Logo Sekolah</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

				          <div class="form-group">
				            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
				            </label>
				            <div class="col-md-6 col-sm-6 col-xs-12">
				              <input type="file" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
				            </div>
				          </div>
				          <div class="ln_solid"></div>
				          <div class="form-group">
				            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				            	<button type="submit" class="btn btn-success">Submit</button>
				            </div>
				          </div>

				        </form>
				      </div>
				    </div>
				</div>
          </div>
          <br />
        </div>
				
</body>
</html>