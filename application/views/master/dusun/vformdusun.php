<?php 
	if ($row){
		$id = $row->id_dusun;
        $nama_dusun = $row->nama_dusun;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
		$id =
        $nama_dusun = 
        $readonly = "";
        $action = "simpan";
    }
?>
<script>
    $(document).ready(function(){
        $(".batal").click(function(){
            window.location = "<?php echo site_url('agama');?>";
            return false;
        });
    });
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border"></div>
			<?php echo form_open('dusun/simpandusun/'.$action,array("id"=>"formsubmit"));?>
			<input type="hidden" name="idlama" value="<?php echo $id; ?>" />
			<div class="box-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Dusun</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nama_dusun" value="<?php echo $nama_dusun; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="pull-right">
	                <div class="btn-group">
	                   <button type=submit class="simpan btn btn-primary btn-md" title="Add"><i class="fa fa-save"></i></button>
	                   <button class="batal btn btn-danger btn-md" title="Batal"><i class="fa fa-times-circle"></i></button>
	                </div>
	            </div>
			</div>
			<?php 
				echo form_close();
			?>
		</div>
	<div>
</div>