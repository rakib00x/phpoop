<?php include (ROOT."/views/layouts/header.php"); ?>
<main>
		<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<?php if ($result): ?>
                    <h3 class="alert alert-success text-center">
                    	<?php echo $this->langpack['reg_and_sign']['registered']?>	
                    </h3>
	                <?php else: ?>
	                    	<?php if (isset($errors) && is_array($errors)): ?>
	                        <ul>
	                            <?php foreach ($errors as $error): ?>
	                                <li class="alert alert-danger"><?php echo $error; ?></li>
	                            <?php endforeach; ?>
	                        </ul>
	                		<?php endif; ?>
							<div class="signup-form"><!--sign up form-->
								<h2><?php echo $this->langpack['reg_and_sign']['start']?></h2>
								<form method="POST">
									<input type="text" name="name" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['name']?>" value="<?php if(isset($name)) echo $name?>"/>
		                            <input type="email" name="email" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['email']?>" value="<?php if(isset($email)) echo $email; ?>"/>
		                            <input type="tel" name="phone" placeholder="555-00-01-02" value="<?php if(isset($phone)) echo $phone; ?>"/>
		                            <input type="text" name="address" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['address']?>" value="<?php if(isset($address)) echo $address; ?>"/>
		                             
		                            <input type="password" name="password" placeholder="<?php echo $this->langpack['reg_and_sign']['placeholders']['password']?>" value="<?php if(isset($password)) echo $password; ?>"/>
									<button type="submit" name="submit" class="btn btn-default">
										<?php echo $this->langpack['reg_and_sign']['signup']?>
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