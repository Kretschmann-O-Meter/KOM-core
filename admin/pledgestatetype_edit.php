<?php
$thispledgestatetypeid = $adminactive['pledgestatetypeid'];

$pledgestatetypes = $dblink->Select("pledgestatetypes", "*", "WHERE `id`=".(int)$thispledgestatetypeid);

if (!isset($pledgestatetypes[0])) {
    redirect(array("page" => "pledgestatetype_list"), null, "notfound");
}

    $thispledgestatetype = $pledgestatetypes[0];
    if (!isset($oldarray)) {
        $oldarray['name'] = $thispledgestatetype->name;
        $oldarray['colour'] = $thispledgestatetype->colour;
        $oldarray['colour2'] = $thispledgestatetype->colour2;
        $oldarray['value'] = $thispledgestatetype->value;
        $oldarray['multipl'] = $thispledgestatetype->multipl;
        $oldarray['type'] = $thispledgestatetype->type;
        $oldarray['order'] = $thispledgestatetype->order;
    }
    ?>

    <h2><?=_("Edit rating");?></h2>
    <h3><?=_("Rating");?> <?=$thispledgestatetype->id;?> – <?=$thispledgestatetype->name;?></h3>
    
    <form method="post">

    <? $hidetype = true;
    include (dirname(__FILE__).'/pledgestatetype_form.php'); ?>

    <input type="hidden" name="do" value="pledgestatetype_edit" />
    <input type="hidden" name="pledgestatetype[id]" value="<?=$thispledgestatetypeid;?>" />
    </form>

<hr /><p><a class="backlink button" href="<?=doadminlink("pledgestatetype_list", null, true);?>"><?=_("Back");?></a></p>