<?php 















//include('../../../../../wp-load.php');















?>















































<LINK href="<?php echo plugins_url(); ?>/mail-masta/lib/css/mm_frontend.css" rel="stylesheet" type="text/css">


<style>

#wpwrap {
background: #fff;
}

.update-nag {
display: none;
}
</style>



	<form onsubmit="return false" id="list_form_subscriber" class="form-style-<?php echo $_GET['styles']; ?>" name="list_form_subscriber" method="POST">















	  <div id="sub_msg" class="mm_sub_msg" style="display:none">	</div>















		















	















		















		<?php















		















		















		$ttl= (int)$_GET['count'];















		$pos= (int)$_GET['email_po'];















		$fl=1;































		?>















			















			<div class="mm-row"><h3> <?php echo $_GET['list_title']; ?> </h3></div> <div class="mm-row"><p> <?php echo$_GET['list_desp']; ?></p></div>















			















			<?php















	















			for($i=1; $i<=$ttl;$i++)















			{















		 















			if($pos==$i) { ?> 















		















		<div class="mm-row">















			















				<?php















				















				if($_GET['styles']!='4'){















			    echo '<div class="mm-col-sm-2"><label>Email:</label> </div>';















			















				}































				















				?>















			















			















			















			<div class="mm-col-sm-4"><input type="text" placeholder="email@email.com" name="subscriber_email" id="subscriber_email" class="validate[required,custom[email]] form-control"> </div></div>















			















		<?php $fl=2;  } ?>















		















				<div class="mm-row">















		















			<?php if($_GET['styles']!='4'){















				?>















		     	<div class="mm-col-sm-2"><label><?php echo $_GET['fi'.$i] ?>:</label></div>















			<?php















		















			} else {















				$pl=$_GET['fi'.$i];















			}















			 ?>















			















		















		<div class="mm-col-sm-4"><input type="text" name="<?php echo $_GET['fi'.$i] ?>" onblur="myfunction(this,1,'req')" placeholder="<?php echo $pl; ?>" id="f11" class="form-control"> </div></div>















		<?php } 















		















		















		















				if($fl==1) { ?> 































			<div class="mm-row">































					<?php































					if($_GET['styles']!='4'){















				    echo '<div class="mm-col-sm-2"><label>Email:</label> </div>';































					}















































					?>































































				<div class="mm-col-sm-4"><input type="text" placeholder="email@email.com" name="subscriber_email" id="subscriber_email" class="validate[required,custom[email]] form-control"> </div></div>































			<?php   } ?>















		















		















		















								<div class="mm-row mm-btn-wrap clearfix">















									<div class="mm-col-sm-2">&nbsp;</div>















								















									<?php  































									if($_GET['term_mess']!=''){















				                         $return_data = '<div class="mm-row"><div class="mm-col-sm-4 valij"><input type="checkbox" name="ter" id="tre"><label>'.$_GET['term_mess'].'</label></div></div>';































				                        }















				                     















									echo $return_data;















									?>















									<div class="mm-col-sm-4">















										<input type="submit" value="<?php echo $_GET['sub_text']; ?>" class="btn btn-black" name="subscribe_campaign" id="subscribe_campaign">















									</div>















										<div style="display:none;" id="sub_loading"><img width="32" height="32" src="<?php  echo plugins_url() ?>/mail-masta/lib/css/images/loading.gif"></div>















								</div>































	                          <input type="hidden" value="http://luutaa.co.in/hospital" id="server_url" name="server_url">















					        </form>