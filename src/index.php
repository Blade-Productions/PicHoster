<?php

include './class/template.class.php';
include './config.inc.php';

$Template = new TemplateParser("./template/template.php");
$Template->Assign("PageTitle", $Config["PageTitle"]);
$Template->Assign("PageName", $Config["PageName"]);
$Template->Assign("PageSlogan", $Config["PageSlogan"]);
$Template->Assign("WebPath", $Config["FullWebPath"]);
$Template->Assign("Footer", $Config["PageFooter"]);
$Template->Assign("Navigation", '
<li>
	<a href="?m=home" class="active">
		<span class="l"></span>
		<span class="r"></span>
		<span class="t">Home</span>
	</a>
</li>
<li>
	<a href="?m=upload" class="active">
		<span class="l"></span>
		<span class="r"></span>
		<span class="t">Upload</span>
	</a>
</li>
<li>
	<a href="?m=galery" class="active">
		<span class="l"></span>
		<span class="r"></span>
		<span class="t">Galerie</span>
	</a>
</li>
<li>
	<a href="?m=imprint" class="active">
		<span class="l"></span>
		<span class="r"></span>
		<span class="t">Impressum</span>
	</a>
</li>
');

$Module = ($_GET["m"] == "" ? "home" : $_GET["m"]);
if(!file_exists("./modules/$Module.php")) { $Module = "404"; }

include("./modules/$Module.php");

$Template->Show();

?>