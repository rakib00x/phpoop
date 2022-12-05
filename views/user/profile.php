<?php include (ROOT."/views/layouts/header.php"); ?>
<main>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<ul class="nav nav-tabs" id="profile-tabs">
					  <li <?php if(!($msg_from)||$msg_from==="data_upd") echo "class='active'";?>>
					  	<a data-toggle="tab" href="#user-data">
					  	<?php echo $this->langpack['reg_and_sign']['profile_data']['heading']?>
					  	</a>
					  </li>
					  <li <?php if($msg_from==="psw_upd") echo "class='active'";?>>
					  	<a data-toggle="tab" href="#password"><?php echo $this->langpack['reg_and_sign']['profile_data']['password']?></a>
					  </li>
					</ul>
					<div class="tab-content">
						<?php if ($result): ?>
						<div class="alert alert-success alert-dismissible">
		                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                     <?php echo $this->langpack['reg_and_sign']['profile_data']['success_msg']?>
		                </div>
						<?php else: ?>
							<?php if (isset($errors)): ?>
	                        <div>
	                            <?php if(is_array($errors)):?>
	                            	<?php foreach ($errors as $error): ?>
	                                	<div class="alert alert-danger alert-dismissible">
	                            			<a href="#" class="close" data-dismiss="alert" aria-label="close">
	                            			&times;
	                            			</a>
	                            			<?php echo $error; ?>
	                            		</div>
	                            	<?php endforeach; ?>
	                            	<?php else: ?>
		                            		<div class="alert alert-danger alert-dismissible">
		                            			<a href="#" class="close" data-dismiss="alert" aria-label="close">
		                            			&times;
		                            			</a>
		                            			<?php echo $errors; ?>
		                            		</div>
	                        	<?php endif;?>
	                        </div>
	                		<?php endif; ?>
	                	<?php endif; ?>
					  	<div id="user-data" class="tab-pane fade <?php if(!($msg_from)||$msg_from==="data_upd") echo 'in active';?>">
						   <div class="signup-form"><!--sign up form-->
								<form method="POST">
		                            <input type="email" name="email" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['email']?>" value="<?php if(isset($email)) echo $email; else echo $current_data['email']; ?>"/>
		                            <input type="tel" name="phone" placeholder="555-00-01-02" value="<?php if(isset($phone)) echo $phone; else echo $current_data['phone'];?>"/>
		                            <input type="text" name="address" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['address']?>" value="<?php if(isset($address)) echo $address; else echo $current_data['address'];?>"/>
									<button type="submit" name="submit" class="btn btn-default">
										<?php echo $this->langpack['reg_and_sign']["profile_data"]['update']?>
									</button>
								</form>
							</div><!--/sign up form-->
					  	</div>
						<div id="password" class="tab-pane fade <?php if($msg_from==="psw_upd") echo 'in active';?>">
						    <div class="signup-form"><!--sign up form-->
								<form method="POST">
		                            <input type="password" name="old_password" required placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['old_password']?>"/>
		                            <input type="password" name="new_password" required placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['new_password']?>"/>
		                            <input type="password" name="password_confirm" required placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['confirm']?>"/>
									<button type="submit" name="submit" class="btn btn-default">
										<?php echo $this->langpack['reg_and_sign']["profile_data"]['update']?>
									</button>
								</form>
							</div><!--/sign up form-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
</main>
<?php include (ROOT."/views/layouts/footer.php"); ?>