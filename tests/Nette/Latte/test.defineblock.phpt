<?php

/**
 * Test: Nette\Latte\Engine and blocks definition.
 *
 * @author     David Grudl
 * @package    Nette\Latte
 * @subpackage UnitTests
 * @keepTrailingSpaces
 */

use Nette\Latte,
	Nette\Templating\FileTemplate,
	Nette\Utils\Html;



require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Template.inc';



TestHelpers::purge(TEMP_DIR);



$template = new FileTemplate;
$template->setCacheStorage(new MockCacheStorage(TEMP_DIR));
$template->setFile(__DIR__ . '/templates/defineblock.latte');
$template->registerFilter(new Latte\Engine);

Assert::match(file_get_contents(__DIR__ . '/test.defineblock.expect'), $template->__toString(TRUE));