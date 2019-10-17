<?php 
	if ($row){
		$id = $row->id_kewarganegaraan;
        $nama_kewarganegaraan = $row->nama_kewarganegaraan;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
		$id =
        $nama_kewarganegaraan = 
        $readonly = "";
        $action = "simpan";
    }
?>
<script>
    $(document).ready(function(){
        $(".batal").click(function(){
            window.location = "<?php echo site_url('kewarganegaraan');?>";
            return false;
        });
    });
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border"></div>
			<?php echo form_open('kewarganegaraan/simpankewarganegaraan/'.$action,array("id"=>"formsubmit"));?>
			<input type="hidden" name="idlama" value="<?php echo $id; ?>" />
			<div class="box-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Kewarganegaraan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nama_kewarganegaraan" value="<?php echo $nama_kewarganegaraan; ?>" />
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