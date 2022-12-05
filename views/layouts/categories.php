<div class="col-sm-3">
    <div class="left-sidebar">
        <h2><?php echo $this->langpack["nav"]["catalog"]?> </h2>
        <div class="panel-group category-products">
            <?php foreach ($ctgs as $ctg):?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="/<?php echo $this->lang?>/category/<?php echo $ctg['id']?>"
                                    <?php if(isset($ctgId)){if($ctgId===$ctg['id']) 
                                    echo "class = active";}?>>
                                    <?php echo $ctg[$this->lang."_name"]?>
                                 </a>
                            </h4>
                        </div>
                    </div>
            <?php endforeach ;?>           
         </div>
    </div>
</div>