<?php 
	if ($row){
        $id = $row->id_level;
        $nama_level = $row->nama_level;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
        $id =
        $nama_level = 
        $readonly = "";
        $action = "simpan";
    }
?>
<script>
    $(document).ready(function(){
        $(".batal").click(function(){
            window.location = "<?php echo site_url('level');?>";
            return false;
        });
    });
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border"></div>
			<?php echo form_open('level/simpanlevel/'.$action,array("id"=>"formsubmit"));?>
			<input type="hidden" name="idlama" value="<?php echo $id; ?>" />
			<div class="box-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Level</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nama_level" value="<?php echo $nama_level; ?>" />
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