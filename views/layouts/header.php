<?php if(!isset($_SESSION)) session_start();?>
<?php include ROOT."/components/NavLinkPrefix.php";?>
<!DOCTYPE html>
<html lang="<?php echo $this->lang==='en'?$this->lang:"ka"; ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?php echo $title; ?></title>
        <link href="<?php include_once $path;?>/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">
    </head><!--/head-->
    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +880 1761502669</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> rakib@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://myaccount.google.com/?utm_source=sign_in_no_continue"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-xs-4">
                            <div class="logo pull-left">
                                <a href="<?php echo "/".$this->lang; ?>">
                                    <img src="/template/images/logo.png" alt="logo" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-4">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle locales" data-toggle="dropdown">
                                    <?php if($this->lang==="ge"):?>
                                    <div class="flags">
                                        <img src="/template/images/flags/ge.svg" alt="geo">
                                    </div>
                                    <b>GE</b>
                                    <?php endif; ?>
                                     <?php if($this->lang==="en"):?>
                                    <div class="flags">
                                        <img src="/template/images/flags/gb.svg" alt="en">
                                    </div>
                                    <b>EN</b>
                                    <?php endif; ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo getLangLink("ge", $this->lang)?>">
                                            <div class="flags">
                                                <img src="/template/images/flags/ge.svg" alt="GE">
                                            </div>
                                            <b>GE</b>
                                        </a>
                                    </li>
                                    <li>
                                         <a href="<?php echo getLangLink("en", $this->lang)?>">
                                            <div class="flags">
                                                <img src="/template/images/flags/gb.svg" alt="GB">
                                            </div>
                                            <b>EN</b>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">                       
                                    <li>
                                        <?php $pgnm = $this->langpack["account"]["cart"];?>
                                        <a href="/<?php echo $this->lang.'/cart'?>" <?php echo $title===$pgnm?"class='active'":"";?>>
                                            <i class="fa fa-shopping-cart"></i>
                                            <?php echo $pgnm; ?>
                                            <span id="cart"></span>
                                        </a>
                                    </li>
                                    <?php if (isset($_SESSION["user"])):?>
                                    <li>
                                        <?php $pgnm = $this->langpack["account"]["orders"];?>
                                        <a href="<?php echo'/'.$this->lang.'/user/orders/';?>" 
                                            <?php echo $title===$pgnm?"class='active'":"";?>>
                                            <i class="fa fa-gift"></i>
                                           <?php echo $pgnm;?>
                                        </a>
                                    </li>
                                    <li>
                                        <?php $pgnm = $this->langpack["reg_and_sign"]["profile"];?>
                                        <a href="<?php echo'/'.$this->lang.'/user/profile/';?>" <?php echo $title===$pgnm?"class='active'":"";?>>
                                            <i class="fa fa-user"></i>
                                            <?php echo $_SESSION["user"]["name"];?>
                                            <?php echo $this->langpack["reg_and_sign"]["profile_char"];?>
                                            <?php echo $this->langpack["reg_and_sign"]["profile"];?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo '/'.$this->lang.'/user/logout'; ?>" id="logout">
                                           <i class="fa fa-sign-out"></i>
                                            <?php echo $this->langpack["account"]["logout"]?>
                                        </a>
                                    </li>
                                    <?php else: ?>
                                    <li>
                                        <?php $pgnm = $this->langpack["account"]["enter"];?>
                                        <a href="<?php echo'/'.$this->lang.'/user/login/';?>" <?php echo $title===$pgnm?"class='active'":"";?>>
                                            <i class="fa fa-sign-in"></i>
                                            <?php echo $pgnm;?>
                                        </a>
                                    </li>
                                    <li>
                                        <?php $pgnm = $this->langpack["account"]["register"];?>
                                        <a href="<?php echo'/'.$this->lang.'/user/register/';?>" <?php echo $title===$pgnm?"class='active'":"";?>>
                                            <i class="fa fa-unlock"></i>
                                            <?php echo $pgnm;?>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li>
                                        <?php $pgnm = $this->langpack["nav"]["main"];?>
                                        <a href="/<?php echo $this->lang?>" 
                                            <?php echo $pgnm===$title?"class='active'":""?>>
                                            <?php echo $this->langpack["nav"]["main"]?>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <?php 
                                            $pgnms = array(
                                                $this->langpack["nav"]["catalog"],
                                                $this->langpack["nav"]["cart"]
                                            );
                                        ?>
                                        <a href="#" 
                                        <?php echo in_array($title, $pgnms)?"class='active'":""
                                        ?>>
                                        <?php echo $this->langpack["nav"]["market"]?>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul role="menu" class="sub-menu">
                                            <li>
                                                <a href="/<?php echo $this->lang?>/catalog/"
                                                <?php echo $title===$pgnms[0]?"class='active'":""?>
                                                >
                                                    <?php echo $this->langpack["nav"]["catalog"]?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/<?php echo $this->lang?>/cart"
                                                    <?php echo $title===$pgnms[1]?"class='active'":""?>
                                                >
                                                    <?php echo $this->langpack["nav"]["cart"]?>
                                                </a>
                                            </li> 
                                        </ul>
                                    </li> 
                                    <li>
                                        <?php $pgnm = $this->langpack["nav"]["contact"]?>
                                        <a href="/<?php echo $this->lang?>/contact/"
                                        <?php echo $title===$pgnm?"class='active'":""?>
                                        >
                                            <?php echo $this->langpack["nav"]["contact"]?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->