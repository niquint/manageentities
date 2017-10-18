<?php
/*
 -------------------------------------------------------------------------
 Manageentities plugin for GLPI
 Copyright (C) 2003-2012 by the Manageentities Development Team.

 https://forge.indepnet.net/projects/manageentities
 -------------------------------------------------------------------------

 LICENSE

 This file is part of Manageentities.

 Manageentities is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Manageentities is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Manageentities. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
// */

include ('../../../inc/includes.php');

Session::checkLoginUser();

if (!isset($_GET["id"])) $_GET["id"] = 0;
if (!isset($_GET["users_id"])) {
   $users_id = Session::getLoginUserID(); 
} else {
   $users_id = $_GET["users_id"];
}

$cri = new TicketTask();

$cri->checkGlobal(READ);

if ($_SESSION['glpiactiveprofile']['interface'] == 'central') {
   Html::header(__('Entities portal', 'manageentities'), '', "management", "pluginmanageentitiesentity");
} else {
   Html::helpHeader(__('Entities portal', 'manageentities'));
}

$cri->display($_GET);

if ($_SESSION['glpiactiveprofile']['interface'] == 'central') {
   Html::footer();
} else {
   Html::helpFooter();
}


?>