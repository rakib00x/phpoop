<?php include (ROOT."/views/layouts/header.php"); ?>
<main>
		<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<?php if ($result): ?>
                    <h3 style="text-align: center;">
                    	<?php echo $this->langpack['reg_and_sign']['registered']?>	
                    </h3>
	                <?php else: ?>
					<div class="signup-form"><!--sign up form-->
						<h2><?php echo $this->langpack['reg_and_sign']['login']?></h2>
						<?php if(isset($loginMsg)):?>
						<div class="alert alert-warning alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<?php echo $loginMsg;?>
						</div>
						<?php endif;?>
						  <?php if (isset($error)): ?>
	                            <div class="alert alert-danger alert-dismissible">
	                            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                            	<?php echo $error; ?>
	                            </div>
	                	<?php endif; ?>
						<form method="POST">
                            <input type="email" name="email" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['email']?>" value="<?php if(isset($email)) echo $email; ?>"/>
                            <input type="password" name="password" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['password']?>" value="<?php if(isset($password)) echo $password; ?>"/>
							<button type="submit" name="submit" class="btn btn-default">
								<?php echo $this->langpack['reg_and_sign']['enter']?>
							</button>
						</form>
					</div><!--/sign up form-->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section><!--/form-->
</main>
<?php include (ROOT."/views/layouts/footer.php"); ?>