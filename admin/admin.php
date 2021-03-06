<?php

session_start();
require_once(dirname(__FILE__).'/init.php');
require_once(dirname(__FILE__).'/functions.php');

/* Adminactvive-Variablen */
if (isset($_REQUEST['page'])) $adminactive['page'] = $_REQUEST['page'];
if (isset($_REQUEST['do']) && $_REQUEST['do'] != "") $adminactive['do'] = $_REQUEST['do'];
if (isset($_REQUEST['issueid']) && $_REQUEST['issueid'] != "") $adminactive['issueid'] = $_REQUEST['issueid'];
if (isset($_REQUEST['pledgeid']) && $_REQUEST['pledgeid'] != "") $adminactive['pledgeid'] = $_REQUEST['pledgeid'];
if (isset($_REQUEST['stateid']) && $_REQUEST['stateid'] != "") $adminactive['stateid'] = $_REQUEST['stateid'];
if (isset($_REQUEST['userid']) && $_REQUEST['userid'] != "") $adminactive['userid'] = $_REQUEST['userid'];
if (isset($_REQUEST['catid']) && $_REQUEST['catid'] != "") $adminactive['catid'] = $_REQUEST['catid'];
if (isset($_REQUEST['custompageid']) && $_REQUEST['custompageid'] != "") $adminactive['custompageid'] = $_REQUEST['custompageid'];
if (isset($_REQUEST['partyid']) && $_REQUEST['partyid'] != "") $adminactive['partyid'] = $_REQUEST['partyid'];
if (isset($_REQUEST['pledgestatetypeid']) && $_REQUEST['pledgestatetypeid'] != "") $adminactive['pledgestatetypeid'] = $_REQUEST['pledgestatetypeid'];
if (isset($_REQUEST['pledgestatetypegroupid']) && $_REQUEST['pledgestatetypegroupid'] != "") $adminactive['pledgestatetypegroupid'] = $_REQUEST['pledgestatetypegroupid'];

/* AUTH */
require_once(dirname(__FILE__).'/auth.php');

/* Datenbank initialisieren */
$database = new Database($dblink);
$database->loadContent();

/* Erlaubte Seiten */
if (!isset($adminactive['page']) || !in_array($adminactive['page'], array("login", "issue_list", "issue_new", "issue_edit", "issue_del", "issue_show", "pledge_new", "pledge_del", "pledge_edit", "state_new", "state_del", "state_edit", "user_list", "user_new", "user_edit", "user_del", "cat_list", "cat_edit", "cat_new", "cat_del", "cat_edit", "custompages_list", "custompages_new", "custompages_edit", "custompages_del", "party_list", "party_new", "party_edit", "party_del", "pledgestatetype_list", "pledgestatetype_new", "pledgestatetype_edit", "pledgestatetype_del", "pledgestatetypegroup_new", "pledgestatetypegroup_edit", "pledgestatetypegroup_del"))) {
    $adminactive['page'] = "issue_list";
}

/* Erlaubte Aktionen */
if (isset($adminactive['do']) && in_array($adminactive['do'], array("issue_new", "issue_edit", "issue_del", "pledge_new", "pledge_del", "pledge_edit", "state_new", "state_del", "state_edit", "user_new", "user_edit", "user_del", "cat_new", "cat_del", "cat_edit", "custompages_new", "custompages_edit", "custompages_del", "party_new", "party_edit", "party_del", "pledgestatetype_new", "pledgestatetype_edit", "pledgestatetype_del", "pledgestatetypegroup_new", "pledgestatetypegroup_edit", "pledgestatetypegroup_del"))) {
    // Aktion ausführen
    include (dirname(__FILE__)."/do_".$adminactive['do'].".php");
}

include(dirname(__FILE__).'/header.php');

if (isset($_GET['success'])) {
    $getsuccess = $_GET['success'];
    if (in_array($getsuccess, array("add", "del", "edit"))) {
        switch ($getsuccess) {
            case "add":
                adminaddsuccess(_("Added successfully."));
                break;
            case "del":
                adminaddsuccess(_("Deletion successful."));
                break;
            case "edit":
                adminaddsuccess(_("Editing successful."));
                break;
            default: adminaddsuccess(_("Success."));
        }
    }
}
if (isset($_GET['error'])) {
    $geterror = $_GET['error'];
    if (in_array($geterror, array("notfound", "last", "ratingassigned", "ratingpreinstalled", "db"))) {
        switch ($geterror) {
            case "notfound":
                adminadderror(_("Entry not found."));
                break;
            case "last":
                adminadderror(_("You must not delete the last entry."));
                break;
            case "ratingassigned":
                adminadderror(_("This rating is assigned to a state and cannot be deleted."));
                break;
            case "ratingpreinstalled":
                adminadderror(_("This rating is pre-installed and cannot be deleted!"));
                break;
            case "db":
                adminadderror(_("There was a database problem."));
                break;
            default: adminadderror(_("Error."));
        }
    }
}

if (isset($adminerrors) && is_array($adminerrors)) {
    echo "<div class=\"adminerror\">".implode("</div><div class=\"adminerror\">", $adminerrors)."</div>";
}
if (isset($adminsuccs) && is_array($adminsuccs)) {
    echo "<div class=\"adminsuccess\">".implode("</div><div>", $adminsuccs)."</div>";
}

include(dirname(__FILE__).'/'.$adminactive['page'].".php");

include(dirname(__FILE__).'/footer.php');

?>