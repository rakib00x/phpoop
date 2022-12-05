<?php include (ROOT."/views/layouts/header.php"); ?>
<main>
    <div id="contact-page" class="container">
        <div class="bg">     
            <div class="row">
               <div class="col-sm-6 col-sm-offset-1">
                    <?php if ($result): ?>
                                <h4 class="alert alert-success text-center">
                                    <?php echo $this->langpack['contact']['msg_sent']?>
                                </h4>
                                <?php echo "<meta http-equiv='refresh' content='1; url=/$this->lang'>"?>
                                <?php else: ?>
                                        <?php if (isset($errors) && is_array($errors)): ?>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li class="alert alert-danger"><?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center"><?php echo $this->langpack['contact']['get_in_touch']?></h2>
                        <form id="main-contact-form" class="contact-form row" method="POST">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="<?php echo $this->langpack['contact']['placeholders']['name']?>" value="<?php if(isset($name)) echo $name?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="<?php echo $this->langpack['contact']['placeholders']['mail']?>" value="<?php if(isset($email)) echo $email?>">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="<?php echo $this->langpack['contact']['placeholders']['subject']?>" value="<?php if(isset($subject)) echo $subject?>">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="msg" id="message" required="required" class="form-control" rows="8" placeholder="<?php echo $this->langpack['contact']['placeholders']['msg']?>"><?php if(isset($msg)) echo $msg; ?>
                                </textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="<?php echo $this->langpack['contact']['send']?>">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center"><?php echo $this->langpack['contact']['contact_info']?></h2>
                        <div>
                            <h4><?php echo $this->langpack['contact']['co_name']?></h4>
                            <address>
                                <p><?php echo $contact[$this->lang."_address"];?></p>
                            </address>
                            <p>
                                <strong><?php echo $this->langpack['contact']['mobile']?>:&nbsp;</strong>
                                <?php echo $contact["mob_phone_num"];?>
                            </p>
                            <p>
                                <strong><?php echo $this->langpack['contact']['mail']?>:&nbsp;</strong> 
                                <?php echo $contact["email"];?>
                            </p>
                        </div>
                    </div>
                </div>             
            </div>  
        </div>  
    </div><!--/#contact-page-->
</main>
<?php include (ROOT."/views/layouts/footer.php"); ?>