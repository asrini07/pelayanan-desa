<?php 
	if ($row){
		$id = $row->id_jenispekerjaan;
        $nama_jenispekerjaan = $row->nama_jenispekerjaan;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
		$id =
        $nama_jenispekerjaan = 
        $readonly = "";
        $action = "simpan";
    }
?>
<script>
    $(document).ready(function(){
        $(".batal").click(function(){
            window.location = "<?php echo site_url('jenispekerjaan');?>";
            return false;
        });
    });
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border"></div>
			<?php echo form_open('jenispekerjaan/simpanjenispekerjaan/'.$action,array("id"=>"formsubmit"));?>
			<input type="hidden" name="idlama" value="<?php echo $id; ?>" />
			<div class="box-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Jenis Pekerjaan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nama_jenispekerjaan" value="<?php echo $nama_jenispekerjaan; ?>" />
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