<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '首页';
?>
<div class="time-tools">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="unix timestamp" id='utime-input'>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" id='utime-btn'>确定</button>
				</span>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
		<span style='line-height:34px' id='format-time'></span>
	</div><!-- /.row -->
</div>
<script>
	function showTimeMessage(msg){
		$('#format-time').html(msg);
	}

	$('#utime-btn').click(function(){
		var otime = $('#utime-input').val();
		if(isEmpty(otime)){
			return;
		}

		var uTimeUrl = '<?= Url::to(['tools/translate-time']); ?>';
		$.ajax({
			url: uTimeUrl,
			method: 'post',
			data: { otime: otime},
			dataType: 'json',
			success: function( response ){
				if( response.error ){
					alert(response.msg);
				}else{
					showTimeMessage(response.data);
				}
			}
		});
	});
</script>
